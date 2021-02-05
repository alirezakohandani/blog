@extends('admin.admin')

@section('content')
<form action="{{ route('admin.store.form') }}" class="flex flex-col space-y-8" method="post" enctype="multipart/form-data">
    @csrf
    <div>
      <h3 class="text-2xl font-semibold">Post</h3>
      <hr>
    </div>
    <label class="text-xl ">categories</label>
    <select name="category">
        @foreach (\App\Models\Category::all() as $category)
        <option value="{{ $category->id }}">{{ $category->category }}</option>
        @endforeach
    </select>
    <div class="form-item">
      <label class="text-xl ">title</label>
      <input type="text" name="title" value="title" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200">
    </div>
    <div class="form-item w-full">
        <label class="text-xl ">body</label>
        <textarea name="body" cols="30" rows="10" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem natus nobis odio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, eveniet fugiat? Explicabo assumenda dignissimos quisquam perspiciatis corporis sint commodi cumque rem tempora!</textarea>
      </div>

    <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">
      <div class="form-item w-full">
        <label class="text-xl ">slug</label>
        <input type="text" name="slug" value="slug" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 ">
      </div>

      <div class="form-item w-full">

      </div>
    </div>
    <label class="text-xl ">vip plan</label>
    <select name="vip">
        <option value="1">is vip post</option>
        <option value="0">not vip post</option>
      </select>
    <label class="text-xl">post type</label>
      <select name="post_type" onchange='CheckPostType(this.value);'>
        <option value="article">article</option>
        <option value="podcast">podcast</option>
        <option value="video">video</option>
      </select>

      <label class="text-xl ">upload podcast or video</label>
      <label id="upload" class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"></path>
        </svg>
        <span class="mt-2 text-base leading-normal">Select a file</span>
        <input name="file" type="file" class="hidden">
    </label>
    <div class="form-item">
      <label class="text-xl ">Tags</label>
      <input name="tag" type="text" placeholder="php, programming, ..." class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 ">
      @if ($errors->any())
         @foreach ($errors->all() as $error)
            <div style="color: red">{{$error}}</div>
         @endforeach
      @endif
    </div>
    <label class="text-xl ">upload image for post</label>
      <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"></path>
        </svg>
        <span class="mt-2 text-base leading-normal">Select a file</span>
        <input name="image" type="file" class="hidden">
    </label>
    <button name="submit" class="uppercase px-8 py-2 bg-blue-600 text-blue-50 max-w-max shadow-sm hover:shadow-lg">submit</button>
  </form>
@endsection