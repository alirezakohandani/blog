@include('layouts.header')
@include('components.navbar')

<div class="flex flex-col bg-white m-auto p-auto">
    <h1
            class="flex py-5 lg:px-20 md:px-10 px-5 lg:mx-40 md:mx-20 mx-5 font-bold text-4xl text-gray-800"
          >
            Plans
          </h1>
          <div
            class="flex overflow-x-scroll pb-10 hide-scroll-bar"
          >
            <div
              class="flex flex-nowrap lg:ml-40 md:ml-20 ml-10 "
            >
            @foreach ($plans as $plan)
              <div class="inline-block px-3">
                <div
                  class="w-64 h-64 max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                <div class="p-4">
                    <p class="mb-1 text-gray-900 font-semibold">{{ $plan->title }}</p>
            
                    <span class="text-gray-700">{{ $plan->description }}</span>
                      <br>
                      <b class="text-gray-700">price: {{ $plan->price }}</b>
                      <br>
                      <b class="text-gray-700">duration: {{ $plan->duration }}</b> months
            
            
                    <div class="mt-8 mb-3">
                      <a href="#"
                        class="px-4 py-2 bg-teal-500 shadow-lg border rounded-lg text-black uppercase font-semibold tracking-wider focus:outline-none focus:shadow-outline hover:bg-teal-400 active:bg-teal-400">Card
                        Button</a>
                    </div>
                  </div>
                 
            </div>
           
              </div>
              @endforeach
            </div>
          </div>
    </div>
    <style>
    .hide-scroll-bar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }
    .hide-scroll-bar::-webkit-scrollbar {
      display: none;
    }
    </style>