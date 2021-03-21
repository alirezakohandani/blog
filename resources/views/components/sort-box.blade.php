<select name="sort_by" id="sort-box">
    @foreach ($columns as $column)
    <option value="{{ $column }}" @if(request()->has('sort_by') && request()->get('sort_by') === $column) selected @endif>{{ $column }}</option>
    @endforeach
    
</select>

<select name="direction" id="direction-box">
    <option value="desc" @if(request()->has('direction') && request()->get('direction') === 'desc') selected @endif>desc</option>
    <option value="asc" @if(request()->has('direction') && request()->get('direction') === 'asc') selected @endif>asc</option>
</select>