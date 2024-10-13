@extends('instagram.layout')
@section('content')
<div class="w-full min-w-[100px]">
    <div class="w-[900px] ml-auto mr-auto grid grid-cols-7 border-solid border-[1px] border-gray-300 mt-7">
        <aside class="grid col-span-2 border-solid border-r-[1px] border-gray-300">
            <a href="{{ url('edit_profile') }}" class="border-yellow-500 border-l-[2px] border-black pt-1 pb-1">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2 font-semibold">Edit profile</p>
            </a>
            <a href="{{ url('change_password') }}" class="border-solid border-l-[2px] pt-1 pb-1 border-black border-opacity-0 hover:bg-slate-50 hover:border-opacity-30">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2 ">Change password</p>
            </a>
            <button class="border-solid border-l-[2px] pt-1 pb-1 border-black border-opacity-0 hover:bg-slate-50 hover:border-opacity-30">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2 ">Apps and websites</p>
            </button>
            <button class="border-solid border-l-[2px] pt-1 pb-1 border-black border-opacity-0 hover:bg-slate-50 hover:border-opacity-30">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2 ">Email notifications</p>
            </button>
            <button class="border-solid border-l-[2px] pt-1 pb-1 border-black border-opacity-0 hover:bg-slate-50 hover:border-opacity-30">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2 ">Push notifications</p>
            </button>
            <button class="border-solid border-l-[2px] pt-1 pb-1 border-black border-opacity-0 hover:bg-slate-50 hover:border-opacity-30">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2 ">Manage contacts</p>
            </button>
            <button class="border-solid border-l-[2px] pt-1 pb-1 border-black border-opacity-0 hover:bg-slate-50 hover:border-opacity-30">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2 ">Privacy and security</p>
            </button>
            <button class="border-solid border-l-[2px] pt-1 pb-1 border-black border-opacity-0 hover:bg-slate-50 hover:border-opacity-30">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2 ">Ads</p>
            </button>
            <button class="border-solid border-l-[2px] pt-1 pb-1 border-black border-opacity-0 hover:bg-slate-50 hover:border-opacity-30">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2 ">Supervision</p>
            </button>
            <button class="border-solid border-l-[2px] pt-1 pb-1 border-black border-opacity-0 hover:bg-slate-50 hover:border-opacity-30">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2 ">Login activity</p>
            </button>
            <button class="border-solid border-l-[2px] pt-1 pb-1 border-black border-opacity-0 hover:bg-slate-50 hover:border-opacity-30">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2 ">Emails from instagram</p>
            </button>
            <button class="border-solid border-l-[2px] pt-1 pb-1 border-black border-opacity-0 hover:bg-slate-50 hover:border-opacity-30">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2 ">Help</p>
            </button>
            <button class="border-solid border-l-[2px] pt-1 pb-1 border-black border-opacity-0 hover:bg-slate-50 hover:border-opacity-30">
                <p class="text-start text-sm text-yellow-500 font-semibold ml-10 pt-2 pb-2 ">Switch to professional <br>account</p>
            </button>
        </aside>
        <div class="col-span-5 w-full">
            <div class="grid grid-cols-4 mt-8 space-y-4 mb-7">
                @if($errors->all())
                <div class="absolute right-5 top-3">   
                    <div id="toast-warning" class="flex border-l-3 border-red-700 items-center w-full h-12 max-w-xs p-4 text-gray-500 bg-red-200 rounded-md shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-700 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                        <svg  xmlns="http://www.w3.org/2000/svg" font-weight="bold" width="20" height="20" fill="currentColor" class="bi bi-info-circle font-bold" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>
                            <span class="sr-only">Warning icon</span>
                        </div>
                        <div class="ml-1 text-xs font-semibold text-red-700">Update failed</div>
                        <button type="button" class="ml-2 -mx-1.5 -my-1.5 bg-transparent text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                </div>
                @endif
                <div class="col-span-1 labels flex justify-end items-center">
                <form method="POST" action="{{ url('update_user')}}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @if(Auth::user()->avatar)
                    <img id="default" class="h-[50px] w-[50px] rounded-full object-cover" src="{{ Auth::user()->avatar }}">
                    <img id="output" class="rounded-full mt-3 flex h-[0px] w-[0px] static opacity-0 object-cover">
                @else
                <button id="default" class="h-[50px] w-[50px] mt-3 rounded-full bg-yellow-600 text-white text-[15px] font-semibold  inline-flex items-center justify-center">{{ $author }}</button>
                <img id="output" class="rounded-full mt-3 flex h-[0px] w-[0px] static opacity-0 object-cover">
                @endif   
                </div>               

                <div class="col-span-3 ml-10 justify-start">
                    <p class="leading-none">{{ Auth::user()->username }}</p>
                    <button class="text-sm leading-none flex hover:text-black font-semibold text-yellow-500">
                        <input class="absolute z-50 h-[12px] w-[140px] opacity-0" name="avatar" type="file" id="avatar" onchange="loadFile(event)">
                        <p class="absolute items-center">Change profile photo</p>
                    </button>
                </div>
            
                <div class="col-span-1 labels flex justify-end items-center">
                    <label class="text-black-600 font-semibold">Username</label>
                </div>
                <div class="col-span-3 ml-10 items-center justify-start">
                    <input name="username" placeholder="Enter your username" value="{{ Auth::user()->username }}" class="text-sm h-8 w-[320px] border-gray-300 focus:ring-0 focus:ring-offset-0" type="text">
                    @error('username')       
                        <div class="alert alert-danger text-red-700 font-semibold text-xs">{{ $message }}</div>    
                    @enderror
                </div>

                <div class="col-span-1 labels flex justify-end items-center">
                </div>
                <div class="col-span-3 ml-10 items-center justify-start">
                    <p class="w-[320px] text-xs text-gray-500">Help people discover your account by using the name you're known by: either your full name, nickname, or business name.
                    </p>
                    <p class="w-[320px] text-xs text-gray-500 mt-3">You can only change your name twice within 14 days.
                    </p>
                </div>

                <div class="col-span-1 labels flex justify-end items-center">
                    <label class="text-black-600 font-semibold">Fullname</label>
                </div>
                <div class="col-span-3 ml-10 items-center justify-start">
                    <input name="fullname" placeholder="Enter your fullname" value="{{ Auth::user()->fullname }}" class="text-sm h-8 w-[320px] border-gray-300 focus:ring-0 focus:ring-offset-0" type="text">
                    @error('fullname')       
                        <div class="alert alert-danger text-red-700 font-semibold text-xs">{{ $message }}</div>    
                    @enderror
                </div>

                <div class="col-span-1 labels flex justify-end items-center ml-10">
                </div>
                <div class="col-span-3 ml-10 items-center justify-start">
                    <p class="w-[320px] text-xs text-gray-500">In most cases, you'll be able to change your username back to aurieljames11 for another 14 days. <a href="#" class="text-yellow-400">Learn more</a>
                    </p>
                </div>

                <div class="col-span-1 labels flex justify-end items-center">
                    <label class="text-black-600 font-semibold">Bio</label>
                </div>
                <div class="col-span-3 ml-10 items-center justify-start">
                    <textarea name="bio" class="text-sm w-[320px] border-gray-300 focus:ring-0 focus:ring-offset-0" placeholder="Describe your self">{{ Auth::user()->bio }}</textarea>
                    @error('bio')       
                        <div class="alert alert-danger text-red-700 font-semibold text-xs">{{ $message }}</div>    
                    @enderror
                </div>

                <div class="col-span-1 labels flex justify-end items-center">
                    <label class="text-black-600 font-semibold">Email</label>
                </div>
                <div class="col-span-3 ml-10 items-center justify-start">
                    <input name="email" placeholder="Enter your email" value="{{ Auth::user()->email }}" class="text-sm h-8 w-[320px] border-gray-300 focus:ring-0 focus:ring-offset-0" type="text">
                    @error('email')       
                        <div class="alert alert-danger text-red-700 font-semibold text-xs">{{ $message }}</div>    
                    @enderror
                </div>

                <div class="col-span-1 labels flex justify-end items-center">
                    <label class="text-black-600 font-semibold"></label>
                </div>
                <div class="col-span-3 ml-10 items-center justify-start">
                    <p class="w-[320px] text-sm text-gray-600 font-semibold">Personal information
                    </p>
                    <p class="w-[320px] text-xs text-gray-500">Provide your personal information, even if the account is used for a business, a pet or something else. This won't be a part of your public profile.
                    </p>
                </div>

                <div class="col-span-1 labels flex justify-end items-center">
                    <label class="text-black-600 font-semibold"></label>
                </div>
                <div class="col-span-3 ml-10 items-center flex justify-between items-center">
                    <button type="submit" value="save" class="hover:bg-yellow-700 bg-yellow-600 rounded-md text-sm  text-white pt-2 pb-2 pr-4 font-semibold pl-4 mt-5 ">Submit<button>
                    <span class="font-semibold text-sm text-yellow-600 mr-20">Temporarily deactivate account</span>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="w-[900px] ml-auto mr-auto">
    <div class="flex mt-5 text-gray-500 text-xs justify-around w-full">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Blog</a>
            <a href="#">Jobs</a>
            <a href="#">Help</a>
            <a href="#">API</a>
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
            <a href="#">Top Accounts</a>
            <a href="#">Home</a>
            <a href="#">Locations</a>
            <a href="#">Instagram Lite</a>
            <a href="#">Threads</a>
            <a href="#">Contact Uploading & Non-Users</a>
            <a href="#">Meta Verified</a>
        </div>
        <div class="text-gray-500 text-xs flex mt-5 justify-center h-20">
            <a href="#">© 2023 FERNANDEZ AURIEL</a>
        </div>
    </div>
</div>
<script>
    var loadFile = function(event){
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.opacity = "1";
        output.style.height = "50px";
        output.style.width = "50px";
        document.getElementById("default").remove();
    }
</script>
@endsection