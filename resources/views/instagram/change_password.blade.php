@extends('instagram.layout')
@section('content')
<div class="w-full min-w-[100px]">
    <div class="w-[900px] ml-auto mr-auto grid grid-cols-7 border-solid border-[1px] border-gray-300 mt-7 space-y-6">
        <aside class="grid col-span-2 border-solid border-r-[1px] border-gray-300">
            <a href="{{ url('edit_profile') }}"class="border-solid border-l-[2px] pt-1 pb-1 border-black border-opacity-0 hover:bg-slate-50 hover:border-opacity-30">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2">Edit profile</p>
            </button>
            <a href="{{ url('change_password') }}" class="border-yellow-500 border-l-[2px] border-black pt-1 pb-1">
                <p class="text-start text-sm text-neutral-900 ml-10 pt-2 pb-2 font-semibold">Change password</p>
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
        <div class="grid col-span-5 w-full">
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
                @if(session('passUpdateSuccess'))
                <div class="absolute right-5 top-3">   
                    <div id="toast-warning" class="flex border-l-3 border-green-700 items-center w-full h-12 max-w-xs p-4 text-gray-500 bg-green-200 rounded-md shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-700 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"> <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/> </svg>
                        </div>
                        <div class="ml-1 text-xs font-semibold text-green-700"> Password updated </div>
                        <button type="button" class="ml-2 -mx-1.5 -my-1.5 bg-transparent text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>            
                </div>
                @endif
            <div class="w-11/12 ml-auto mr-auto grid grid-cols-4 mt-3 h-3/5">
                    <div class="col-span-1 flex justify-end">
                    <form method="post" action="{{ url('passwordpost') }}">
                        {!! csrf_field() !!}
                        @if(Auth::user()->avatar)
                            <img id="default" class="h-[50px] w-[50px] rounded-full object-cover" src="{{ Auth::user()->avatar }}">
                        @else
                            <button id="default" class="h-[50px] w-[50px] mt-3 rounded-full bg-yellow-600 text-white text-[15px] font-semibold  inline-flex items-center justify-center">{{ $author }}</button>
                        @endif   
                    </div>
                    <div class="col-span-3 ml-10 flex ml-10 mt-3">
                        <p>{{ Auth::user()->username }}</p>
                    </div>
                    <div class="col-span-1 text-md font-semibold flex justify-end">
                        <p>Old password</p>
                    </div>
                    <div class="col-span-3 ml-10">
                        <input type="password" name="oldpassword" class="text-sm h-10 border-gray-300 w-10/12 focus:ring-0 focus:ring-offset-0 rounded-md bg-slate-50">
                        @error('oldpassword')       
                        <div class="alert alert-danger text-red-700 font-semibold text-xs">{{ $message }}</div>    
                        @enderror
                    </div>
                    <div class="col-span-1 text-md font-semibold flex justify-end">
                        <p>New password</p>
                    </div>
                    <div class="col-span-3 ml-10">
                        <input type="password" name="newpassword" class="text-sm h-10 border-gray-300 w-10/12 focus:ring-0 focus:ring-offset-0 rounded-md bg-slate-50">
                        @error('newpassword')       
                        <div class="alert alert-danger text-red-700 font-semibold text-xs">{{ $message }}</div>    
                        @enderror
                    </div>
                    <div class="col-span-1 text-md font-semibold flex justify-end">
                        <p class="">Confirm new <br>password</p>
                    </div>
                    <div class="col-span-3 ml-10">
                        <input type="password" name="confirmpassword" class="text-sm h-10 border-gray-300 w-10/12 focus:ring-0 focus:ring-offset-0 rounded-md bg-slate-50">
                        @error('confirmpassword')       
                        <div class="alert alert-danger text-red-700 font-semibold text-xs">{{ $message }}</div>    
                        @enderror
                    </div>
                    <div class="col-span-1 text-md font-semibold flex justify-end">
                    </div>
                    <div class="col-span-3 flex ml-10">
                        <button class="hover:bg-yellow-700 bg-yellow-600 text-sm pl-5 pr-5 pt-0 pb-0 font-semibold text-white rounded-md">Change password</button>
                    </div>
                    <div class="col-span-1 text-md font-semibold flex justify-end">
                    </div>
                    <div class="col-span-3 flex ml-10 mt-2">
                        <button type="submit" value="save" class="text-sm font-semibold text-yellow-500">Forgot password?</button>
                    </form>
                    </div>           
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
@endsection