<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    public function index()
    {


        $allPost = Post::with('user')->get();

        $suggested = User::all()->except(Auth::user()->id)->random(5);

        $suggested->map(function ($suggested) {
            $initials = $this->getInitial($suggested->fullname);
            $suggested['initials'] = $initials;

            $post = user::find($suggested->id)->posts->reverse()->values()->take(3);
            $suggested['userpost'] = $post;

        });

        $full_name = Auth::user()->fullname;

        $initial = $this->getInitial($full_name);


        $allPost->map(function ($allPost) {

            $fullnames = $allPost->user->fullname;
            $initials = $this->getInitial($fullnames);
            $allPost['initials'] = $initials;

            $post = User::find($allPost->user_id)->posts->reverse()->values()->take(3);
            $allPost['userpost'] = $post;
        });

        return view('instagram.index')->with('posts', $allPost)->withAuthor($initial)->with('suggestions', $suggested);

    }

    public function profile()
    {
        $posts = User::find(Auth::user()->id)->posts;

        $full_name = Auth::user()->fullname;
        $initial = $this->getInitial($full_name);
        return view('instagram.profile')->with('posts', $posts)->withAuthor($initial);
    }

    public function profileview($userid)
    {
        $posts = User::find($userid)->posts;
        $user = User::find($userid);
        $full_name = $user->fullname;
        $initial = $this->getInitial($full_name);

        return view('instagram.profileview')->with('posts', $posts)->withAuthor($initial)->with('userinfo', $user);
    }


    public function edit_profile()
    {
        $user = User::all();

        $full_name = Auth::user()->fullname;
        $initial = $this->getInitial($full_name);

        return view('instagram.edit_profile')->with('user', $user)->withAuthor($initial);
    }

    public function change_password()
    {
        $user = User::all();
        $full_name = Auth::user()->fullname;
        $initial = $this->getInitial($full_name);

        return view('instagram.change_password')->with('user', $user)->withAuthor($initial);
    }

    public function signup()
    {

        if (Auth::user() != "") {
            $users = User::all();
            return redirect()->back()->with('users', $users);
        } else {
            return view('instagram.signup')->with('username_message');
        }

    }

    public function signin()
    {
        return view('instagram.signin');
    }

    public function signInPost(Request $request)
    {
        $customMessages = [
            'username.required' => 'Username field is required',
            'username.exists' => 'Username does not exist in our record',
            'password.required' => 'Password field is required',
        ];

        $validatedData = $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ], $customMessages);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')->with('successmessage','Logged in successfully');;
        } else {
            return redirect('login')->withErrors(['password' => 'Incorrect password'])->withInput($request->all());
        }
    }

    public function signUpPost(Request $request)
    {

        $customMessages = [        
            'username.required' => 'The name field is required.',  
            'username.string' => 'Username must be string.',
            'username.max' => 'Username must be no longer than 25 characters.',
            'username.unique' => 'Username already exist.',
            'fullname.required' => 'Fullname field is required',
            'fullname.string' => 'Fullname should atleast 5 characters.',
            'fullname.max' => 'Fullname must be no longer than 25 characters.',
            'password.required' => 'Password field is required',
            'password.min' => 'Password should have atleast 7 character',
            'password.regex' => 'Password should have atleast 1 lowercase, 1 uppercase, and number',
        ];

        $validatedData = $request->validate([        
            'username' => 'required|string|max:25|unique:users',        
            'fullname' => 'required|string|min:5|max:30',        
            'password' => 'required|min:7|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',    
        ], $customMessages);
        
        $user = new User;
        $passwordHash = Hash::make($request->password);

        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->password = $passwordHash;

        $user->save();

        return redirect('login')->with('successmessage','data saved successfully');
    }

    public function logout()
    {
        return redirect('login')->with(Auth::logout());
    }

    public function userPost(Request $request, User $user)
    {

        $data = $request->all();
        $filename = '';

        if ($request->image) {
            if ($request->hasFile('image')) {
                $filename = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->image->extension();
                $request->image->move(public_path('/assets/img/'), $filename);
            }

            $data['user_id'] = Auth::user()->id;
            $data['text'] = $request->input('text');
            $data['image'] = $filename;

            $status = Post::create($data);

            $users = User::all();

            return redirect()->back()->with('users', $users);
        }

        return redirect()->back();
    }

    public function update_user(Request $request)
    {
        
        $user = User::find(Auth::user()->id);

        $filename = '';

        if ($request->hasFile('avatar')) {
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('/assets/img/'), $filename);
        } else {
            $filename = Auth::user()->avatar;
        }

        if($request->username != Auth::user()->username){
            $customMessage = [
                'username.required' => 'Username field is required',
                'username.string' => 'Username must be a string',
                'username.max' => 'Username shoud be no longer than 25 characters',
                'username.unique' => 'Username is already taken',
                'fullname.required' => 'Fullname field is required', 
                'fullname.string' => 'Fullname should be a string',
                'fullname.max' => 'Fullname should be no longer than 25 characters',
                'bio.max' => 'Bio should be no longer than 200 characters',
                'email.regex' => 'Must be a valid email',
                'email.email' => 'Must be a valid email',
            ];

            $validatedData = $request->validate([
                'username' => 'required|string|max:25|unique:users',
                'fullname' => 'required|string|max:25',
                'bio' => 'max:200',
                'email' => 'email|nullable',
            ], $customMessage);
        }

        else{
            $customMessage = [
                'fullname.required' => 'Fullname field is required', 
                'fullname.string' => 'Fullname should be a string',
                'fullname.max' => 'Fullname should be no longer than 25 characters',
                'bio.max' => 'Bio should be no longer than 200 characters',
                'email.email' => 'Must be a valid email',
            ];

            $validatedData = $request->validate([
                'fullname' => 'required|string|max:25',
                'bio' => 'max:200',
                'email' => 'email|nullable',
            ], $customMessage);
        }
        
        $user->update([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'bio' => $request->bio,
            'email' => $request->email,
            'avatar' => $filename,
        ]);

        $posts = User::find(Auth::user()->id)->posts;
        $full_name = Auth::user()->fullname;
        $initial = $this->getInitial($full_name);

        return redirect('profile')->with('posts', $posts)->withAuthor($initial)->with('successupdate','User updated successfully');

    }

    public function getInitial($full_name)
    {
        $initial = explode(' ', $full_name);
        $first = mb_substr($initial[0], 0, 1);
        $last = mb_substr(end($initial), 0, 1);
        $initial = $first . $last;
        
        return $initial; 
    }

    public function passwordpost(Request $request)
    {
        $user = User::find(Auth::user()->id);


        if (Hash::check($request->oldpassword, Auth::user()->password)){
            $customMessage = [
                'newpassword.required' => 'Password field is required',
                'newpassword.min' => 'Password should have atleast 7 character',
                'newpassword.regex' => 'Password should have atleast 1 lowercase, 1 uppercase, and number',
                'confirmpassword.required' => 'Confirm password is required', 
                'confirmpassword.same' => 'New password and confirm password did not match',
            ];

            $validatedData = $request->validate([
                'newpassword' => 'required|min:7|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
                'confirmpassword' => 'required|same:newpassword',
            ], $customMessage);

            $passwordHash = Hash::make($request->newpassword);
            $user->update([
                'password' => $passwordHash,
            ]);
            return redirect()->back()->with('users', $user)->with('passUpdateSuccess', 'Password Update Successfully');
        }
        else{
            return redirect()->back()->withErrors(['oldpassword' => 'Incorrect old password'])->with('passUpdateFailed', 'Update failed');
        }
    }

    public function deletepost($postid)
    {
        $post = Post::find($postid);
        $post->delete();
        return redirect()->back();
    }

    public function updatepost($postid, Request $request)
    {
        $post = Post::find($postid);
        $post->update([
            'text' => $request->text,
        ]);

        return redirect()->back();
    }

}