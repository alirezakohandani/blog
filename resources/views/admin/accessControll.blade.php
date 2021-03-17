@extends('admin.admin')

@section('content')
    @if(\Gate::allows('access-controll'))
    <div class="text-gray-900 bg-gray-200">
        <div class="p-4 flex">
            <h1 class="text-3xl">
                Posts
            </h1>
        </div>
        <x-search action="{{ route('admin.access.controller.list') }}">
            <x-single-search-input name="search" value="search" placeholder="Search ..."></x-single-search-input>
        </x-search>
        @include('components.alerts')
        <div class="px-3 py-4 flex justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                <tbody>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">title</th>
                        <th class="text-left p-3 px-5">status</th>
                        <th class="text-left p-3 px-5">craeted_at</th>
                        <th class="text-left p-3 px-5">author</th>
                        <th></th>
                    </tr>
                    @foreach ($posts as $post)
                    <tr class="border-b hover:bg-orange-100 {{ $post->status == 'published' ? '' : 'bg-red-100' }}">
                        <td class="p-3 px-5">{{ $post->title }}</td>
                        <td class="p-3 px-5">{{ $post->status }}</td>
                        <td class="p-3 px-5">{{ $post->created_at }}</td>
                        <td class="p-3 px-5">{{ App\Models\User::where('id', $post->user_id)->first()->name }}</td>
                        <td class="p-3 px-5 flex justify-end">
                            <form action="{{ route('admin.access.controller.sign') }}" method="POST">
                                @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <button type="submit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" {{ $post->status_is_published }}>sign</button>
                            </form>
                            <form action="{{ route('admin.access.controller.reject') }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" {{ $post->status_is_published }} {{ $post->status_is_draft }}>reject</button>
                            </form>
                        </td>
                    </tr> 
                    @endforeach                
                </tbody>
            </table>
        </div>
    </div>
    @else
        dont permison    
    @endif
@endsection