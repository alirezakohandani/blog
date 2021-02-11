@extends('admin.admin')

@section('content')
<form action="{{ route('admin.notification.send.email') }}" class="flex flex-col space-y-8" method="post" enctype="multipart/form-data">
    @csrf
    <div>
      <h3 class="text-2xl font-semibold">Email</h3>
      <hr>
    </div>
    <label class="text-xl ">Users</label>
    <select name="user">
        @foreach (\App\Models\User::all() as $user)
        <option value="{{ $user->id }}">{{ $user->email }}</option>
        @endforeach
    </select>
    <label class="text-xl ">type of email</label>
    <select name="mailable">
        <option value="WellcomeMail">wellcome email</option>
        <option value="ForgetMail">forget email</option>
    </select>
      @if ($errors)
          @foreach ($errors->all() as $error)
            <p style="color: red">{{ $error }}</p>
          @endforeach
      @endif
      @include('components.alerts') 
    <button name="submit" class="uppercase px-8 py-2 bg-blue-600 text-blue-50 max-w-max shadow-sm hover:shadow-lg">submit</button>
  </form>
@endsection