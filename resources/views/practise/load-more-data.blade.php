@if(!$data->isEmpty())
    <ul>
        @php($i = 0)
        @foreach($data as $item)
            <li>{{ $item->id .' => '. $item->name }}</li>
            @php($lastId = $item->id)
            @php($i++)
        @endforeach
    </ul>
    @if($i > 3)
    <div>
        <button id="loadMoreBtn" class="btn btn-info" type="button" data-id="{{ $lastId }}">Load More</button>
    </div>
    @endif
@else
    <h2>Data not found</h2>
@endif
