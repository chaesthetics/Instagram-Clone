@extends('instagram.layout')
@section('content')
<div class="w-full min-w-[100px] overflow-x-hidden overflow-y-hidden no-scrollbar">
    <div class="w-[900px] ml-auto mr-auto overflow-x-hidden overflow-y-hidden no-scrollbar">
    @if(session('successupdate'))
        <div class="absolute right-5 top-3">   
            <div id="toast-warning" class="flex border-l-3 border-green-700 items-center w-full h-12 max-w-xs p-4 text-gray-500 bg-green-200 rounded-md shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-700 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"> <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/> </svg>
                </div>
                <div class="ml-1 text-xs font-semibold text-green-700"> Updated successfully </div>
                <button type="button" class="ml-2 -mx-1.5 -my-1.5 bg-transparent text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>            
        </div>
    @endif
        <div class="card-header flex items-center justify-center justify-between ml-10 mt-8 mr-auto w-9/12 overflow-x-hidden overflow-y-hidden no-scrollbar">
            <div class="profilepicture">
                @if(Auth::user()->avatar)
                <img class="h-[150px] w-[150px] rounded-full object-cover" src="{{ Auth::user()->avatar }}">
                @else
                 <button class="h-[150px] w-[150px] rounded-full bg-yellow-600 text-white text-5xl font-semibold  inline-flex items-center justify-center">{{ $author }}</button>
                @endif   
            </div>
            <div class="cardinfo">
                <div class="flex items-center">
                    <h1 class="text-xl text-gray-700">{{ Auth::user()->username }}</h1>
                    @if(Auth::user()->username == 'aurieljames11')<img class="ml-2 h-6 w-6 " data-tooltip-target="tooltip-verified" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADP0lEQVR4nO2az08TQRTHN+hR/QNM9ODVqAcvBk3ovBZ/HMATEcXon2CigvFUj+AN8aAJmEjnlYSTnk3UgzcjnozExKghUVQOwr63tQqseWyBWrtlpu2sVHnJO3R3uvP5zryZNzuznrdl/7ApTVdB+1e8VjSVD84qpCXQtJzO0UWvlUzlfVCavgNyGDn9SCGd8DaDZe4HexXSW0AaTqOf6XgSbi+/r5APA/LCOnzkCok7cnykvGw2G7ZJeYV8QyG/Oj4R7HEuADDo/R2MPwPyWErz6Yz2DyjNs5Xwa2U1z0oZKSv/UdF/y8oEvc4FKKTbcYCNutI04lwAIL90J4CnnMK3j37dqTQtOuyBxZO5uV3OBEDe73QFDyWXicFJy0fw9MC1AJA68n6n1Fk3cCbPuwG5SyEPAtIzpanoHpz/CCeZWgH5rkK6oPL+fmMBgDydNDBs5JpfGwtQyENJA55/WKjdI8iDxgJSOjiaJPzlR4Xw3bel8M5UMV7ARNBuLEBSPGj+lCT8zELk1URIxu6ZDLd5Niap3jV8/+NC+L4MXlx+91WEk0Ie9WxN5bg7yZafKcGLqCrlu6wFyKLLFfxATMv3V4cPhcWu9WWJW2NVmSQ8lFaxwmT+MoI8v1ngYW0cEIGmUzXh0+j32WTdjeZukwHbbwC/3hNUVNo/VxUekC+tvMMaPmzkedEYoJGWh0rXtAxI1xoSIPCmIE2FxxoCTENI5mhToGbDq1ohZDOIq83hH+aXwutPC+7g0WAQ20yjtUQ0v+XZfBq1SWRxM0u1awP1xjzWkcjESlsfGz68Wk80bcBiqQdy3G0tADTfM60gTkQz4CHyMSv4lR0zy6VEpYgmwofWy+kMBsfqqWhVRDPhoeTykmUTPjfrrUgGayMDFuJ7YailX+qVpjctva2SxsI+77/Z2Ioz2fZzLSCV89OeK+uYDHeApp8uw6bdRcuXm2yBOxOA/MIpfCSARpyFkKZbf+OIaQ6QxwGDHjVOh2puiGn+Ann/YDSWaBiQP5bfT+vgjHMBchAneUISi2RHWXaYHPLJtcolcTYbtskzSnux04kc8pkYaF9t2mNWm1Br2YPuVZPPDFr2U4Mt88zsF/L7hiBlV3/sAAAAAElFTkSuQmCC">
                    <div id="tooltip-verified" role="tooltip" class="absolute z-30 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Founder
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    @endif
                    <a href="{{ url('edit_profile') }}"class="transition duration-150 bg-gray-200 pt-2 pb-2 pr-4 pl-4 hover:bg-gray-300 text-sm ml-5 font-semibold rounded-md">Edit profile</a>
                    <button class="transition duration-150 bg-gray-200 pt-2 pb-2 pr-4 pl-4 hover:bg-gray-300 text-sm ml-2 font-semibold rounded-md">View Archive</button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather ml-2 feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>       
                </div>
                <div class="interactions flex text-md space-x-5 mt-3">
                    <p><b>{{ $posts->count() }}</b> posts</p>
                    <p><b>2.5M</b> followers</p>
                    <p><b>23</b> following</p>
                </div>
                <div class="flex mt-3 text-sm font-semibold leading-none"> 
                    <p>{{ Auth::user()->fullname }}</p>
                </div>
                <div class="flex mt-3 text-sm leading-none mt-1">
                    <p>{{ Auth::user()->bio }}</p>
                </div>
            </div>
        </div>
        <hr class="mt-10 flex">
        <div class="flex justify-center w-50 text-sm space-x-12">
            <button class="font-semibold text-black-600 flex items-center pt-2 pb-2 border-t-3 border-yellow-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-border-all" viewBox="0 0 16 16"> <path d="M0 0h16v16H0V0zm1 1v6.5h6.5V1H1zm7.5 0v6.5H15V1H8.5zM15 8.5H8.5V15H15V8.5zM7.5 15V8.5H1V15h6.5z"/></svg>
                <p class="ml-1">POSTS</p>
            </button>
            <button class="font-semibold text-gray-600 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16"> <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"/> </svg>
                <p class="ml-1">REELS</p>
            </button>
            <button class="font-semibold text-gray-600 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16"> <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/> </svg>
                <p class="ml-1">SAVED</p>
            </button>
            <button class="font-semibold text-gray-600 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16"> <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/> <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/> </svg>
                <p class="ml-1">TAGGED</p>
            </button>  
        </div>

        <div class="grid grid-cols-3 gap-1">
        @foreach($posts->reverse() as $item)
            <button class="relative group outline-none z-20" data-modal-target="staticModal{{$item->id}}" data-modal-toggle="staticModal{{$item->id}}">
                <div class="">
                    @if(pathinfo($item->image, PATHINFO_EXTENSION) == "mp4")
                        <video class="group-hover:brightness-50 duration-300 object-cover h-[300px] w-[400px]"><source src="{{ $item->image}}" type="video/mp4"></video>  
                    @else       
                        <img class="group-hover:brightness-50 duration-300 object-cover h-[300px] w-[400px]" src="{{ $item->image }}">
                    @endif
            </div>
                <div class="absolute flex w-2/4 justify-between items-center top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white flex opacity-0 group-hover:opacity-100 duration-300 space-x-1">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill text-white" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/> </svg>
                        <p class="ml-1">141,150</p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16"> <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/> </svg>
                        <p class="ml-1">0</p>
                    </div>
                </div>
            </button>

<!-- Main modal -->

<div id="staticModal{{$item->id}}" data-modal-backdrop="dynamic" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 rounded-xl hidden w-full p-4 overflow-x-hidden overflow-y-hidden md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="staticModalPic{{$item->id}} rounded-xl relative flex w-10/12 max-w-10/12 justify-center">
        @if(pathinfo($item->image, PATHINFO_EXTENSION) == "mp4")
            <video class="max-h-[640px] h-sm max-w-[700px] w-auto" controls><source src="{{ $item->image }}" type="video/mp4"></video>  
        @else      
            <img src="{{ $item->image }}" class="max-h-[640px] h-sm max-w-[700px] w-auto">
        @endif
        <div class="max-h-[640px] h-auto w-[470px] bg-white flex flex-col justify-between h-auto z-20 rounded-r-md">
            <div class=" pt-3 pl-5 pr-5 pb-3">
                <div class="flex justify-between">
                <div class="header-info flex items-center h-full max-w-[500px]">
                    @if($item->user->avatar)
                    <img class="h-9 w-9 rounded-full object-cover" src="{{ $item->user->avatar }}">
                    @else
                    <button class="h-9 w-9 rounded-full bg-yellow-800 text-white text-[10px] font-semibold  inline-flex items-center justify-center">{{ $author }}</button>
                    @endif   
                    <button class="font-bold text-sm text-gray-700 ml-3" data-popover-target="popover-user{{ $item->user->username }}"><a href="{{ URL('profile')}}">{{ $item->user->username }}</a>
                    </button> 
                <span class="ml-1 text-sm text-gray-500 "></span>
                </div>
                <div class="header-button text-gray-800 hover:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" id="dropdownHoverButton{{ $item->id}}" data-dropdown-toggle="dropdownHover{{ $item->id}}" data-dropdown-trigger="click" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/> </svg>
                </div>
                </div><hr class="mt-3 h-2">
                <div class="header-info flex items-center">
                    @if($item->user->avatar)
                    <img class="h-9 w-9 rounded-full object-cover" src="{{ $item->user->avatar }}">
                    @else
                    <button class="h-9 w-9 rounded-full bg-yellow-800 text-white text-[10px] font-semibold  inline-flex items-center justify-center">{{ $author }}</button>
                    @endif   
                    <div class="">
                        <button class="text-black text-sm text-gray-700 ml-3" data-popover-target="popover-user{{ $item->user->username }}"><a class="font-bold text-gray-700" href="{{ URL('profile')}}">{{ $item->user->username }} </a>{{ $item->text }}</button> <br>
                        <span class="ml-3 mt-[-2px] text-xs text-gray-500 ">{{ $item->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="h-[200px] mt-10 text-center">
                    <p class="text-2xl font-bold text-neutral-900">No comments yet.</p>
                    <p class="text-md font-semibold text-yellow-700">Start the conversation.</p>
                </div> 

                <div id="popup-modal{{ $item->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="w-full max-w-2xl max-h-full">
                        <div class="bg-white rounded-xl shadow drop-shadow-2xl dark:bg-gray-700">
                            <button type="button "class="absolute top-3 right-2.5 text-gray-400 z-50 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal{{ $item->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" data-modal-hide="popup-modal{{ $item->id }}" type="button">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-6 text-center flex h-full relative">
                                <form method="post" action="{{ url('/updatepost/' .$item->id)}}">
                                    {!! csrf_field() !!}
                                <h3 class="mb-5 text-lg font-semibold text-gray-900 dark:text-gray-400">Edit Info</h3>
                                <div class="flex pb-4">
                                    @if(pathinfo($item->image, PATHINFO_EXTENSION) == "mp4")
                                        <video class="w-1/2 h-auto max-h-[600px]"><source src="{{ $item->image}}" type="video/mp4"></video>  
                                    @else       
                                        <img src="{{ $item->image }}" class="w-1/2 h-auto max-h-[600px]">
                                    @endif
                                    <div class="w-full h-auto border pt-5 pb-5 pl-5 pr-5 border-gray-300">
                                        <div class="flex items-center space-x-3 text-sm font-semibold">
                                        @if($item->user->avatar)
                                            <img class="h-9 w-9 rounded-full object-cover" src="{{ $item->user->avatar }}">
                                            @else
                                            <button class="h-9 w-9 rounded-full bg-yellow-800 text-white text-[10px] font-semibold  inline-flex items-center justify-center">{{ $item->initials }}</button>
                                            @endif 
                                            <p>{{ $item->user->username }}</p>
                                        </div>
                                        <div class="flex flex-col h-full pb-5 justify-between">
                                        <textarea name="text" class="pt-7 w-full h-1/2 border-none text-sm resize-none focus:outline-none focus:ring-0 focus:ring-offset-0 ring-current">{{ $item->text }}</textarea>
                                        <div class="">
                                        <div class="flex justify-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-emoji-smile opacity-50 mb-3 relative" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/> </svg>
                                            <p class="text-xs text-gray-800 opacity-50">2,300 letters</p>
                                        </div>
                                        <div class="flex justify-between border-t-1">
                                            <p class="text-md text-gray-800 opacity-50">Add location</p>
                                            <img class="h-5 w-5" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADuElEQVR4nO2ZWYiOURjHfzRkmbHPZOJCWYZCiNwoW7JEGtkaV24VuZG9xnZBcodsxYWILJESLiQiDLIklEhqLFnGvoxPR/+3TtN8531f3znffCO/euvr/f7vc/bnOec58J9G6QBUAbuAq8BL4Luel3q3E5gLlFCAVAB7gM9AJuHzCdgN9KUAaAdsBn6ocr/U6yuB0Wpgez0VercKuCZtRqO1CWjTVI0wPXlHlakH9gO9U3zfBzhgNegyUE6eGao5byrwABiWg63hwEPZegYMJo8jETXiDNDZg80uwFmrMeX5WBN3rEYUebTdCjhnTbOga2azNZ18jERjI/NIZawhEBXyTvU5rok4RsgBfAS6hyhgj3rKeKfQHFRZ20JE7E/qqSQutgxYB9xUz5rnBrAWKE3oUH7pu2I8UqUeMsEujplAnSOivwdmJLBzXfo5eGSXjJqIHdeIKMAdUySPIvsY4LgVQCtjbK2WdofHdvwZiYwq5ppO0UgsceiWSvMO6ObQjZXuCh55JaP9HJp11kjEcSKBi+0nzQs88k1GXVvvWwlGrWFvGweQjRJpvuKRLzLqirYfpEniZaJKmqno2kVkdDTwRq2MugJUXYqGdLA8WDZ6SPMcj9yX0YEOzU1pjHeKY5y0NQ7NEGnu4pGTMjrboVkrzfEU9qodmnnSHMUjG2R0vUNTqqmSkYvNxnJp3gJdHbqNCRqbmtkyarbZLmYo2GXkYsdqzRRrOkUjYTTTY2xdlDZOl4oyFf5V3sRFpYJdti3K2wSV66Sdtnk64pkbqsiUBNpuCnY1cst12jtVx0yniFkqy4yKd6LIvZfwHEmw1v6a/pbvj5teudBRAdhsPnuFKqRGjTGuMRQLVcb5gGWwwEoOhKAIeKwyzBkoGMWWRzJna9/MtbYlJqsSlC0q7HDAqbuCPFBuLcZBHu1OsA5cJo7kha0BRsUs7qD5rMboaWVVRnmwV6lGvA6U+HNSbZ3yWuZgp7WVxF5AE9AWeKIKzM/BzhLZuOc5l/xX+a5anfrSUmq584k0IS2AS6qISXCnZZ++Ndv7Jmeors9+AiNTfDfJuktMc9MVlOiYez/hvYbJojzVN4soIFoDtxMchyO2W+eNXDxeEIZoitXHZFImKf6Y0+YACpQ16uknWbYZZUqBGs1iCpgi4IKVxjFeLcJModP671SD/wqSnlbSe2UjR+XaUFdqIZimdWDWy2Rgqn4bFz2eZka1RuCNUkDm9zKaIS2AQ1Y+q+GaaVaU6Mbpsu9LTf5VfgNttDSN+ivn8AAAAABJRU5ErkJggg==">
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>   
                                    <button data-modal-hide="popup-modal{{ $item->id }}" type="button" class="text-white bg-neutral-900 hover:bg-neutral-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                    <button data-modal-hide="popup-modal{{ $item->id }}" type="submit" value="save" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Update post
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dropdown menu -->
                
                <div id="dropdownHover{{ $item->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-md shadow w-44 dark:bg-gray-700">
                    <ul class="absolute top-0 dark:bg-gray-700 shadow rounded-sm bg-neutral-800 py-2 text-sm text-white dark:text-gray-200" aria-labelledby="dropdownHoverButton{{ $item->id}}">
                    <li>
                        <a href="{{ url('/deletepost/' .$item->id)}}" class="block px-6 py-1 hover:bg-yellow-600 dark:hover:bg-yellow-700 dark:hover:text-white">Delete</a>
                    </li>
                    <li>
                        <a href="#" onclick="hidepost()" class="block px-6 py-1 hover:bg-yellow-600 dark:hover:bg-yellow-700 dark:hover:text-white" data-modal-target="popup-modal{{ $item->id }}" data-modal-toggle="popup-modal{{ $item->id }}" >Edit</a>
                    </li>
                    <li>
                        <a href="{{ url('profile') }}" class="block px-6 py-1 hover:bg-yellow-600 dark:hover:bg-yellow-700 dark:hover:text-white">Go to profile</a>
                    </li>
                    <li>
                        <a href="#" class="block px-6 py-1 hover:bg-yellow-600 dark:hover:bg-yellow-700 dark:hover:text-white">Report</a>
                    </li>
                    </ul>
                </div>
                </div>
 
                <div class="">
                <div class="pl-3 pr-3 items-end bottom-10 w-[470px] h-full self-end self-stretch">
                    <hr>
                    <div class="card-footer flex justify-between items-max-h-[600px] h-md center z-0 mt-1/4">
                        <div class="interaction flex text-bold pt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16"> <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/> </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-chat ml-5" viewBox="0 0 16 16"> <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/> </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-send ml-5" viewBox="0 0 16 16"> <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/> </svg>
                        </div>
                        <div class="bookmark pt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16"> <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/> </svg>
                        </div>
                    </div>
                    <div class="likes flex justity-end items-center">
                        <span class="text-sm text-gray-700 font-semibold pt-3 pb-2">141,150 likes</span>
                    </div>
                    <hr>
                    <div class="comment flex bottom-0 w-[450px]  inline-block align-bottom items-end self-end content-end self-end justify-end">
                    <form class="w-full flex items-center pl-2 pt-2 pb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-emoji-smile mb-2 mt-2 ml-[-5px] opacity-50 z-20" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/> </svg>
                        <textarea id="comment" rows="4" name="text" class="ml-4 mb-2 w-full h-8 px-0 text-sm text-gray-900 overflow-hidden bg-white border-none outline-none dark:bg-gray-800 focus:ring-0  dark:placeholder-gray-400 resize-none" placeholder="Add a comment..."></textarea>
                    </form>
                </div>
                </div>
                </div>
        
                </div>
                <button type="button" class="text-white bg-transparent hover:text-gray-400 rounded-lg text-sm w-8 h-8 ml-2 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal{{$item->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div> 
        </div>

        @endforeach
        </div>
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

</script>
@endsection