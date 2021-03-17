<form action="{{ $action }}" class="flex flex-col space-y-8" method="GET" enctype="multipart/form-data">
    {{$slot}}
    <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
        Search
      </button>
</form>