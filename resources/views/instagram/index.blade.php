@extends('instagram.layout')
@section('content')
<div class="grid w-full grid-cols-3">
    <div class="posts space-y-6 w-full mx-auto inset-x-0 col-span-2">
         @foreach($posts->reverse() as $item)
        <div class="Reversed{{ $item->id }} mr-auto ml-auto  mt-10 w-4/6">
            <div class="card-header flex justify-between items-center">
                <div class="header-info flex items-center">
                    @if($item->user->avatar)
                    <img class="h-9 w-9 rounded-full object-cover" src="{{ $item->user->avatar }}">
                    @else
                    <button class="h-9 w-9 rounded-full bg-yellow-800 text-white text-[10px] font-semibold  inline-flex items-center justify-center">{{ $item->initials }}</button>
                    @endif 

                    @if($item->user->id == Auth::user()->id)
                    <button class="font-bold text-sm text-gray-700 ml-3" data-popover-target="popover-user{{ $item->id }}"><a href="{{ URL('/profile')}}">{{ $item->user->username }}</a>
                    </button> 
                    @else
                    <button class="font-bold text-sm text-gray-700 ml-3" data-popover-target="popover-user{{ $item->id }}"><a href="{{ URL('/profile/'.$item->user->id )}}">{{ $item->user->username }}</a>
                    </button> 
                    @endif
                    
                    <div data-popover id="popover-user{{ $item->id }}" role="tooltip" class="absolute w-[380px] z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                        <div class="pt-6 pb-4 shadow-xl ">
                            <div class="pl-6 flex items-center mb-2">
                                @if($item->user->id == Auth::user()->id)
                                    <a href="{{ url('profile') }}">
                                @else
                                    <a href="{{ url('/profile/'.$item->user->id) }}">
                                @endif
                                @if($item->user->avatar)
                                    @if($item->user->id == Auth::user()->id)
                                        <img class="popover{{ $item->id }} h-[65px] w-[65px] rounded-full object-cover" src="{{ $item->user->avatar }}"><a class="UserPopover{{ $item->id }}" href="{{ url('profile') }}"></a></img>
                                    @else
                                        <img class="popover{{ $item->id }} h-[65px] w-[65px] rounded-full object-cover" src="{{ $item->user->avatar }}"><a class="OtherUserPopover{{ $item->id }}" href="{{ url('/profile/'.$item->user->id) }}"></a></img>
                                    @endif
                                @else
                                    <button class="h-[65px] w-[65px]  rounded-full bg-yellow-800 text-white text-[20px] font-semibold  inline-flex items-center justify-center">{{ $item->initials }}</button>
                                @endif   
                                </a>
                                <div class="ml-5 mt-3">
                                <p class="text-base font-semibold leading-none text-black dark:text-white">
                                    @if($item->user->id == Auth::user()->id)
                                    <a href="{{ url('profile') }}" class="flex">{{ $item->user->username }}
                                    @else
                                    <a href="{{ url('/profile/'.$item->user->id) }}" class="flex">{{ $item->user->username }}
                                    @endif
                                        @if($item->user->username == 'aurieljames11')<img class="ml-1 h-4 w-4" data-tooltip-target="tooltip-verified" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADP0lEQVR4nO2az08TQRTHN+hR/QNM9ODVqAcvBk3ovBZ/HMATEcXon2CigvFUj+AN8aAJmEjnlYSTnk3UgzcjnozExKghUVQOwr63tQqseWyBWrtlpu2sVHnJO3R3uvP5zryZNzuznrdl/7ApTVdB+1e8VjSVD84qpCXQtJzO0UWvlUzlfVCavgNyGDn9SCGd8DaDZe4HexXSW0AaTqOf6XgSbi+/r5APA/LCOnzkCok7cnykvGw2G7ZJeYV8QyG/Oj4R7HEuADDo/R2MPwPyWErz6Yz2DyjNs5Xwa2U1z0oZKSv/UdF/y8oEvc4FKKTbcYCNutI04lwAIL90J4CnnMK3j37dqTQtOuyBxZO5uV3OBEDe73QFDyWXicFJy0fw9MC1AJA68n6n1Fk3cCbPuwG5SyEPAtIzpanoHpz/CCeZWgH5rkK6oPL+fmMBgDydNDBs5JpfGwtQyENJA55/WKjdI8iDxgJSOjiaJPzlR4Xw3bel8M5UMV7ARNBuLEBSPGj+lCT8zELk1URIxu6ZDLd5Niap3jV8/+NC+L4MXlx+91WEk0Ie9WxN5bg7yZafKcGLqCrlu6wFyKLLFfxATMv3V4cPhcWu9WWJW2NVmSQ8lFaxwmT+MoI8v1ngYW0cEIGmUzXh0+j32WTdjeZukwHbbwC/3hNUVNo/VxUekC+tvMMaPmzkedEYoJGWh0rXtAxI1xoSIPCmIE2FxxoCTENI5mhToGbDq1ohZDOIq83hH+aXwutPC+7g0WAQ20yjtUQ0v+XZfBq1SWRxM0u1awP1xjzWkcjESlsfGz68Wk80bcBiqQdy3G0tADTfM60gTkQz4CHyMSv4lR0zy6VEpYgmwofWy+kMBsfqqWhVRDPhoeTykmUTPjfrrUgGayMDFuJ7YailX+qVpjctva2SxsI+77/Z2Ioz2fZzLSCV89OeK+uYDHeApp8uw6bdRcuXm2yBOxOA/MIpfCSARpyFkKZbf+OIaQ6QxwGDHjVOh2puiGn+Ann/YDSWaBiQP5bfT+vgjHMBchAneUISi2RHWXaYHPLJtcolcTYbtskzSnux04kc8pkYaF9t2mNWm1Br2YPuVZPPDFr2U4Mt88zsF/L7hiBlV3/sAAAAAElFTkSuQmCC">
                                            <div id="tooltip-verified" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                <p>Founder</p>
                                            </div>
                                        @endif
                                    </a>
                                    <p class="mb-3 text-sm font-normal">
                                    @if($item->user->id == Auth::user()->id)
                                    <a href="{{ url('/profile') }}" class="hover:underline">{{ $item->user->fullname }}</a>
                                    @else
                                    <a href="{{ url('/profile/'.$item->user->id) }}" class="hover:underline">{{ $item->user->fullname }}</a>
                                    @endif
                                </p>
                                </div>
                            </p>
                            </div>
                            <div class="grid grid-cols-3 w-full justify-center text-center">
                                <div class="col-span-1">
                                    @if($item->user->id == Auth::user()->id)
                                    <a href="{{ url('/profile') }}">
                                    @else
                                    <a href="{{ url('/profile/'.$item->user->id) }}">
                                    @endif
                                        <p class="font-bold text-neutral-900 text-md">{{ $item->user->posts->count() }}</p>
                                        <p>posts</p>
                                    </a>
                                </div>
                                <div class="col-span-1">
                                    @if($item->user->id == Auth::user()->id)
                                    <a href="{{ url('/profile') }}">
                                    @else
                                    <a href="{{ url('/profile/'.$item->user->id) }}">
                                    @endif
                                        <p class="font-bold text-neutral-900 text-md">2.5M</p>
                                        <p>followers</p>
                                    </a>
                                </div>
                                <div class="col-span-1">
                                    @if($item->user->id == Auth::user()->id)
                                    <a href="{{ url('/profile') }}">
                                    @else
                                    <a href="{{ url('/profile/'.$item->user->id) }}">
                                    @endif
                                        <p class="font-bold text-neutral-900 text-md">23</p>
                                        <p>following</p>
                                    </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 w-full justify-center gap-1 mt-2">
                            @if($item->userpost->count() >= 3)
                                <div class="col-span-1">
                                    @if($item->user->id == Auth::user()->id)
                                    <a href="{{ url('/profile') }}">
                                    @else
                                    <a href="{{ url('/profile/'.$item->user->id) }}">
                                    @endif
                                        @if(pathinfo($item->userpost[0]->image, PATHINFO_EXTENSION) == "mp4")
                                            <video class="card0{{$item->userpost[0]->image}} w-full h-[120px] object-cover"><source src="{{ $item->userpost[0]->image }}" type="video/ogg"></video>  
                                        @else 
                                            <img class="w-full h-[120px] object-cover" src="{{ $item->userpost[0]->image }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="col-span-1">
                                    @if($item->user->id == Auth::user()->id)
                                    <a href="{{ url('/profile') }}">
                                    @else
                                    <a href="{{ url('/profile/'.$item->user->id) }}">
                                    @endif
                                        @if(pathinfo($item->userpost[1]->image, PATHINFO_EXTENSION) == "mp4")
                                            <video class="card1{{$item->userpost[1]->image}} w-full h-[120px] object-cover"><source src="{{ $item->userpost[1]->image }}" type="video/ogg"></video>  
                                        @else 
                                            <img class="w-full h-[120px] object-cover" src="{{ $item->userpost[1]->image }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="col-span-1">
                                    @if($item->user->id == Auth::user()->id)
                                    <a href="{{ url('/profile') }}">
                                    @else
                                    <a href="{{ url('/profile/'.$item->user->id) }}">
                                    @endif
                                        @if(pathinfo($item->userpost[2]->image, PATHINFO_EXTENSION) == "mp4")
                                            <video class="card2{{$item->userpost[2]->image}} w-full h-[120px] object-cover"><source src="{{ $item->userpost[2]->image }}" type="video/ogg"></video>  
                                        @else 
                                            <img class="w-full h-[120px] object-cover" src="{{ $item->userpost[2]->image }}">
                                        @endif
                                    </a>
                                </div>
                            
                            @elseif($item->user->posts->count() == 2)
                                <div class="col-span-1">
                                    @if($item->user->id == Auth::user()->id)
                                    <a href="{{ url('/profile') }}">
                                    @else
                                    <a href="{{ url('/profile/'.$item->user->id) }}">
                                    @endif
                                        @if(pathinfo($item->userpost[0]->image, PATHINFO_EXTENSION) == "mp4")
                                            <video class="card0{{$item->userpost[0]->image}}w-full h-[120px] object-cover"><source src="{{ $item->userpost[0]->image }}" type="video/ogg"></video>  
                                        @else 
                                            <img class="w-full h-[120px] object-cover" src="{{ $item->userpost[0]->image }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="col-span-1">
                                    @if($item->user->id == Auth::user()->id)
                                    <a href="{{ url('/profile') }}">
                                    @else
                                    <a href="{{ url('/profile/'.$item->user->id) }}">
                                    @endif
                                        @if(pathinfo($item->userpost[1]->image, PATHINFO_EXTENSION) == "mp4")
                                            <video class="card1{{$item->userpost[1]->image}} w-full h-[120px] object-cover"><source src="{{ $item->userpost[1]->image }}" type="video/ogg"></video>  
                                        @else 
                                        <img class="w-full h-[120px] object-cover" src="{{ $item->userpost[1]->image }}">
                                        @endif
                                    </a>
                                </div>
                            
                            @elseif($item->user->posts->count() == 1)
                                <div class="col-span-1">
                                    @if($item->user->id == Auth::user()->id)
                                    <a href="{{ url('/profile') }}">
                                    @else
                                    <a href="{{ url('/profile/'.$item->user->id) }}">
                                    @endif
                                        @if(pathinfo($item->userpost[0]->image, PATHINFO_EXTENSION) == "mp4")
                                            <video class="card0{{$item->userpost[0]->image}} w-full h-[120px] object-cover"><source src="{{ $item->userpost[0]->image }}" type="video/ogg"></video>  
                                        @else 
                                        <img class="w-full h-[120px] object-cover" src="{{ $item->userpost[0]->image }}">
                                        @endif
                                    </a>
                                </div>
                            @else
                            @endif
                            </div>
                            <div class="flex justify-around items-center mt-5 h-full pb-1">
                                <button  class="bg-yellow-700 text-white font-semibold pt-2 pb-2 w-[170px] rounded-lg hover:bg-yellow-800">Message</button>
                                <button class="bg-slate-200 text-black font-semibold pt-2 pb-2 w-[170px] rounded-lg hover:bg-slate-300">Follow</button>
                            </div>
                        </div>
                        <div data-popper-arrow></div>
                    </div>


                    <span class="ml-1 text-sm text-gray-500 ">•  {{ $item->created_at->diffForHumans() }}</span>
                </div>
                <div class="header-button text-grey-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" id="dropdownHoverButton{{ $item->id}}" data-dropdown-toggle="dropdownHover{{ $item->id}}" data-dropdown-trigger="click" class="bi bi-three-dots text-gray-500 hover:text-gray-900" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/> </svg>
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
                        <div class="p-6 text-center flex h-full relative justify-center">
                            <form method="post" action="{{ url('/updatepost/' .$item->id)}}">
                                {!! csrf_field() !!}
                            <h3 class="mb-5 text-lg font-semibold text-gray-900 dark:text-gray-400">Edit Info</h3>
                            <div class="flex pb-4">        
                            @if(pathinfo($item->image, PATHINFO_EXTENSION) == "mp4")
                            <video class="w-1/2 h-auto max-h-[500px] object-cover"> <source src="{{ $item->image }}" type="video/ogg"></video>  
                            @else   
                                <img src="{{ $item->image }}" class="w-1/2 h-auto max-h-[500px] object-cover">
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

                @if($item->user->id == Auth::user()->id)
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
                @else
                    <div id="dropdownHover{{ $item->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-md shadow w-44 dark:bg-gray-700">
                        <ul class="absolute top-0 dark:bg-gray-700 shadow rounded-sm bg-neutral-800 py-2 text-sm text-white dark:text-gray-200" aria-labelledby="dropdownHoverButton{{ $item->id}}">
                        <li>
                            <a href="#" onclick="hidepost()" class="block px-6 py-1 hover:bg-yellow-600 dark:hover:bg-yellow-700 dark:hover:text-white" >Follow</a>
                        </li>
                        <li>
                            <a href="{{ url('/profile/'.$item->user->id) }}" class="block px-6 py-1 hover:bg-yellow-600 dark:hover:bg-yellow-700 dark:hover:text-white">Go to profile</a>
                        </li>
                        <li>
                            <a href="#" class="block px-6 py-1 hover:bg-yellow-600 dark:hover:bg-yellow-700 dark:hover:text-white">Report</a>
                        </li>
                        </ul>
                    </div>
                @endif
            </div>
            @if(pathinfo($item->image, PATHINFO_EXTENSION) == "mp4")
                <video class="{{ $item-> id}}POST mt-2 mb-2 rounded-md w-full max-h-[600px] bg-black" controls><source src="{{ $item->image }}" type="video/ogg"></video>  
            @else
                <img class="mt-2 mb-2 rounded-md max-h-[600px] w-full object-cover" src="{{ $item->image }}">
            @endif
            <div class="card-footer flex justify-between items-center mt-3">
                <div class="interaction flex text-bold">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16"> <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/> </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-chat ml-5" viewBox="0 0 16 16"> <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/> </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-send ml-5" viewBox="0 0 16 16"> <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/> </svg>
                </div>
                <div class="bookmark">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16"> <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/> </svg>
                </div>
            </div>
            <div class="likes flex items-center mt-2">
            <span class="text-sm text-gray-700 font-semibold">141,150 likes</span>
            </div>
            <div class="post-text">
                <p class="text-sm font-medium text-gray-600"><span class="font-bold text-gray-600">{{ $item->user->username }} </span>{{ $item->text }}</p>
            </div>
            <div class="comment mt-3 h-auto flex justify-between items-center">
                <form class="w-full">
                    <textarea id="comment" rows="4" class="w-full h-8 px-0 text-sm text-gray-900 overflow-hidden bg-white border-none outline-none dark:bg-gray-800 focus:ring-0  dark:placeholder-gray-400 resize-none" placeholder="Add a comment..."></textarea>
                </form>
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-emoji-smile opacity-50 mb-4" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/> </svg>
            </div>
            <hr class="h-px my-0 bg-gray-300 border-0 bottom-0  dark:bg-gray-800">
        </div>
        @endforeach
    </div>

   <div class="sticky h-screen top-0">
    <div class="sidebar-card w-10/12 mt-10">
        <div class="card-header flex items-center justify-between">
            <div class="personal-info flex space-x-4">
                @if(Auth::user()->avatar)
                    <img class="h-[45px] w-[45px] rounded-full object-cover" src="{{ Auth::user()->avatar }}">
                @else
                 <button class="h-[45px] w-[45px] rounded-full bg-yellow-600 text-white text-[15px] font-semibold  inline-flex items-center justify-center">{{ $author }}</button>
                @endif   
                <div>
                  <span class="font-semibold"><a href="{{ url('profile') }}">{{ Auth::user()->username }}</a></span>
                  <p class="text-sm opacity-70"><a href="{{ url('profile') }}">{{ Auth::user()->fullname }}</a></p>
                </div>
            </div>
            <div class="action-button">
                <button class="font-semibold text-blue-600 text-sm">Switch</button>
            </div>
        </div>
        <div class="card-content flex justify-between mt-5 mb-5 items-center">
           <span class="font-semibold text-sm text-gray-600">Suggested for you</span>
           <p class="text-sm font-semibold">See all</p>
        </div>
        @foreach($suggestions->reverse() as $suggested)
        <div class="card-content flex mt-3 items-center justify-between">
            <div class="personal-info flex space-x-4">
                    @if($suggested->avatar)
                    <img class="h-11 w-11 rounded-full object-cover" src="{{ $suggested->avatar }}">
                    @else
                    <div class="h-11 w-11 rounded-full bg-yellow-800 text-white text-[12px] font-semibold  inline-flex items-center justify-center">{{ $suggested->initials }}</div>
                    @endif 
                <div>
                  <button class="font-semibold" data-popover-target="popover-user2{{ $suggested->username }}"><a href="{{ URL('/profile/'.$suggested->id )}}">{{ $suggested->username }}</a></button>
                  <p class="text-xs opacity-70">Suggested for you</p>
                </div>
            </div>
            <div class="action-button">
                <button class="font-semibold text-blue-600 hover:text-black text-sm">Follow</button>
            </div>
        </div>
        <div data-popover id="popover-user2{{ $suggested->username }}" role="tooltip" class="absolute w-[380px] z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                        <div class="pt-6 shadow-xl ">
                            <div class="pl-6 flex items-center mb-2">
                                <div>
                                @if($suggested->avatar)
                                    <img class="h-[65px] w-[65px] rounded-full object-cover" src="{{ $suggested->avatar }}">
                                @else
                                    <button class="h-[65px] w-[65px]  rounded-full bg-yellow-800 text-white text-[20px] font-semibold  inline-flex items-center justify-center">{{ $suggested->initials }}</button>
                                @endif   
                                </div>
                                <div class="ml-5 mt-3">
                                    <div class="text-base font-semibold leading-none text-black dark:text-white">
                                        <a href="{{ URL('/profile/'.$suggested->id )}}" class="flex">{{ $suggested->username }}
                                        @if($suggested->username == 'aurieljames11')<img class="ml-1 h-4 w-4" data-tooltip-target="tooltip-verified1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADP0lEQVR4nO2az08TQRTHN+hR/QNM9ODVqAcvBk3ovBZ/HMATEcXon2CigvFUj+AN8aAJmEjnlYSTnk3UgzcjnozExKghUVQOwr63tQqseWyBWrtlpu2sVHnJO3R3uvP5zryZNzuznrdl/7ApTVdB+1e8VjSVD84qpCXQtJzO0UWvlUzlfVCavgNyGDn9SCGd8DaDZe4HexXSW0AaTqOf6XgSbi+/r5APA/LCOnzkCok7cnykvGw2G7ZJeYV8QyG/Oj4R7HEuADDo/R2MPwPyWErz6Yz2DyjNs5Xwa2U1z0oZKSv/UdF/y8oEvc4FKKTbcYCNutI04lwAIL90J4CnnMK3j37dqTQtOuyBxZO5uV3OBEDe73QFDyWXicFJy0fw9MC1AJA68n6n1Fk3cCbPuwG5SyEPAtIzpanoHpz/CCeZWgH5rkK6oPL+fmMBgDydNDBs5JpfGwtQyENJA55/WKjdI8iDxgJSOjiaJPzlR4Xw3bel8M5UMV7ARNBuLEBSPGj+lCT8zELk1URIxu6ZDLd5Niap3jV8/+NC+L4MXlx+91WEk0Ie9WxN5bg7yZafKcGLqCrlu6wFyKLLFfxATMv3V4cPhcWu9WWJW2NVmSQ8lFaxwmT+MoI8v1ngYW0cEIGmUzXh0+j32WTdjeZukwHbbwC/3hNUVNo/VxUekC+tvMMaPmzkedEYoJGWh0rXtAxI1xoSIPCmIE2FxxoCTENI5mhToGbDq1ohZDOIq83hH+aXwutPC+7g0WAQ20yjtUQ0v+XZfBq1SWRxM0u1awP1xjzWkcjESlsfGz68Wk80bcBiqQdy3G0tADTfM60gTkQz4CHyMSv4lR0zy6VEpYgmwofWy+kMBsfqqWhVRDPhoeTykmUTPjfrrUgGayMDFuJ7YailX+qVpjctva2SxsI+77/Z2Ioz2fZzLSCV89OeK+uYDHeApp8uw6bdRcuXm2yBOxOA/MIpfCSARpyFkKZbf+OIaQ6QxwGDHjVOh2puiGn+Ann/YDSWaBiQP5bfT+vgjHMBchAneUISi2RHWXaYHPLJtcolcTYbtskzSnux04kc8pkYaF9t2mNWm1Br2YPuVZPPDFr2U4Mt88zsF/L7hiBlV3/sAAAAAElFTkSuQmCC">
                                        <div id="tooltip-verified1" role="tooltip" class="absolute z-10 invisible flex inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            <p>Founder</p>
                                        </div>
                                        @endif
                                        </a>
                                        <p class="mb-3 text-sm font-normal">
                                        <a href="{{ URL('/profile/'.$suggested->id )}}" class="hover:underline">{{ $suggested->fullname }}</a>
                                    </div>
                                </div>
                            </p>
                            </div>
                            <div class="grid grid-cols-3 w-full justify-center text-center">
                                <div class="col-span-1">
                                    <a href="{{ URL('/profile/'.$suggested->id )}}">
                                        <p class="font-bold text-neutral-900 text-md">{{ $suggested->posts->count() }}</p>
                                        <p>posts</p>
                                    </a>
                                </div>
                                <div class="col-span-1">
                                    <a href="{{ URL('/profile/'.$suggested->id )}}">
                                        <p class="font-bold text-neutral-900 text-md">2.5M</p>
                                        <p>followers</p>
                                    </a>
                                </div>
                                <div class="col-span-1">
                                    <a href="{{ URL('/profile/'.$suggested->id )}}">
                                        <p class="font-bold text-neutral-900 text-md">23</p>
                                        <p>following</p>
                                    </a>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 w-full justify-center gap-1 mt-2">
                            @if($suggested->posts->count() >= 3)
                                <div class="col-span-1">
                                @if(pathinfo($suggested->userpost[0]->image, PATHINFO_EXTENSION) == "mp4")
                                    <video class="suggested0{{$suggested->userpost[0]->image}} w-full h-[120px] object-cover"><source src="{{ $suggested->userpost[0]->image }}" type="video/ogg"></video>  
                                @else   
                                   <img class="w-full h-[120px] object-cover" src="{{ $suggested->userpost[0]->image }}">
                                @endif
                                </div>
                                <div class="col-span-1">
                                @if(pathinfo($suggested->userpost[1]->image, PATHINFO_EXTENSION) == "mp4")
                                    <video class="suggested1{{$suggested->userpost[1]->image}}  w-full h-[120px] object-cover"><source src="{{ $suggested->userpost[1]->image }}" type="video/ogg"></video>  
                                @else   
                                   <img class="w-full h-[120px] object-cover" src="{{ $suggested->userpost[1]->image }}">
                                @endif
                                </div>
                                <div class="col-span-1">
                                @if(pathinfo($suggested->userpost[2]->image, PATHINFO_EXTENSION) == "mp4")
                                    <video class="suggested2{{$suggested->userpost[2]->image}} w-full h-[120px] object-cover"><source src="{{ $suggested->userpost[2]->image }}" type="video/ogg"></video>  
                                @else   
                                   <img class="w-full h-[120px] object-cover" src="{{ $suggested->userpost[2]->image }}">
                                @endif
                                </div>
                            @elseif($suggested->posts->count() == 2)
                                <div class="col-span-1">
                                @if(pathinfo($suggested->userpost[0]->image, PATHINFO_EXTENSION) == "mp4")
                                    <video class="suggested0{{$suggested->userpost[0]->image}} w-full h-[120px] object-cover"><source src="{{ $suggested->userpost[0]->image }}" type="video/ogg"></video>  
                                @else   
                                   <img class="w-full h-[120px] object-cover" src="{{ $suggested->userpost[0]->image }}">
                                @endif
                                </div>
                                <div class="col-span-1">
                                @if(pathinfo($suggested->userpost[1]->image, PATHINFO_EXTENSION) == "mp4")
                                    <video class="suggested1{{$suggested->userpost[1]->image}}  w-full h-[120px] object-cover"><source src="{{ $suggested->userpost[1]->image }}" type="video/ogg"></video>  
                                @else   
                                   <img class="w-full h-[120px] object-cover" src="{{ $suggested->userpost[1]->image }}">
                                @endif
                                </div>
                            @elseif($suggested->posts->count() == 1)
                                <div class="col-span-1">
                                @if(pathinfo($suggested->userpost[0]->image, PATHINFO_EXTENSION) == "mp4")
                                    <video class="suggested0{{$suggested->userpost[0]->image}} w-full h-[120px] object-cover"><source src="{{ $suggested->userpost[0]->image }}" type="video/ogg"></video>  
                                @else   
                                   <img class="w-full h-[120px] object-cover" src="{{ $suggested->userpost[0]->image }}">
                                @endif
                                </div>
                            @else
                            @endif
                            </div>
                            <div class="flex justify-around items-center mt-5 h-full pb-5">
                                <button class="bg-yellow-700 text-white font-semibold pt-2 pb-2 w-[170px] rounded-lg hover:bg-yellow-800">Message</button>
                                <button class="bg-slate-200 text-black font-semibold pt-2 pb-2 w-[170px] rounded-lg hover:bg-slate-300">Follow</button>
                            </div>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
        @endforeach
        <div class="card-footer mt-10 text-gray-500 text-xs ">
            <p>About . Help . Press . API . Jobs . Privacy . Terms.</p>
            <p>Locations . Language . Meta Verified</p>
        </div>
        <div class="card-footer mt-3 text-gray-500 text-xs ">
            <p>© 2023 FERNANDEZ AURIEL</p>
      
        </div>

    </div>
   </div>
</div>
@endsection