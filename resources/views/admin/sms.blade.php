@extends('admin.admin')

@section('content')
<form action="" class="flex flex-col space-y-8" method="post" enctype="multipart/form-data">
    @csrf
    <div>
      <h3 class="text-2xl font-semibold">Post</h3>
      <hr>
    </div>
    <label class="text-xl ">Users</label>
    <select name="category">
        @foreach (\App\Models\User::all() as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <div class="form-item w-full">
        <label class="text-xl ">text</label>
        <textarea name="text" cols="30" rows="10" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem natus nobis odio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, eveniet fugiat? Explicabo assumenda dignissimos quisquam perspiciatis corporis sint commodi cumque rem tempora!</textarea>
      </div>

    <button name="submit" class="uppercase px-8 py-2 bg-blue-600 text-blue-50 max-w-max shadow-sm hover:shadow-lg">submit</button>
  </form>
@endsection