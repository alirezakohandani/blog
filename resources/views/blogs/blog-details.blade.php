@extends('layouts.app')

@section('content')
    <div class="max-w-screen-xl mx-auto">
    <main class="mt-10">
      <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
        <div class="absolute left-0 bottom-0 w-full h-full z-10"
          style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
        <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
        <div class="p-4 absolute bottom-0 left-0 z-20">
          <a href="#"
            class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">{{ $post->Categories()->first()->category }}</a>
          <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
            {{ $post->title }}
          </h2>
          <div class="flex mt-3">
            <img src="{{ $address . 'storage/app/file/' .$post->image->url }}"
              class="h-10 w-10 rounded-full mr-2 object-cover" />
            <div>
              <p class="font-semibold text-gray-200 text-sm"> {{ $post->user->name }} </p>
              <p class="font-semibold text-gray-400 text-xs"> 
                {{ DateTime::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('Y-M-d - H:i') }}
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
        <p class="pb-6">{{ $post->body }}</p>
        <div class="bg-gray-800 text-white py-3 px-4 text-center fixed left-0 bottom-0 right-0 z-40">
            This a Comment form by JermineJunior. 
            <a class="underline text-gray-200" href="https://tailwindcomponents.com/component/comment-form">Component details</a>
        </div>
        <!-- comment form -->
    <div class="flex mx-auto items-center justify-center shadow-lg mt-56 mx-8 mb-4 max-w-lg">
       <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
          <div class="flex flex-wrap -mx-3 mb-6">
             <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
             <div class="w-full md:w-full px-3 mb-2 mt-2">
                <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
             </div>
             <div class="w-full md:w-full flex items-start md:w-full px-3">
                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                   <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                   </svg>
                   <p class="text-xs md:text-sm pt-px">Some HTML is okay.</p>
                </div>
                <div class="-mr-1">
                   <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Comment'>
                </div>
             </div>
          </form>
       </div>
    </div>
      </div>

  
    @stop