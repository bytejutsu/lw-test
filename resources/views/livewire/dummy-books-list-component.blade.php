<div>
    @if(isset($books))
        <div wire:loading.block>fetching books...</div>
        <div wire:loading.remove>
            <ul>
                @foreach($books as $book)
                    <li>{{$book['title']}}</li>
                @endforeach
            </ul>
        </div>
    @else
        <p>initializing...</p>
    @endif
</div>
