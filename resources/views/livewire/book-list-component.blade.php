<div class="border-2 border-green-300 p-4 m-4">

    <h2 class="text-center font-bold text-green-300">Books Search List Child Component</h2>
    <h2 class="text-center font-bold text-green-300">(API Service Data)</h2>

    <br/>

    <div class="">
        @if(isset($books))
            <div wire:loading.flex class="font-bold text-gray-400 justify-center">Fetching Books...</div>
            <div wire:loading.remove>
                <ul>
                    @foreach($books as $book)
                        <li class="font-bold p-2">{{$book->title}}</li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="font-bold p-2 text-center">Loading ...</p>
        @endif
    </div>

</div>


