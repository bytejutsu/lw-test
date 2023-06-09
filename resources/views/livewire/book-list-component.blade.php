<div class="border-2 border-green-300 p-4 m-4">

    <h2 class="text-center font-bold text-green-300">Books Search List Child Component</h2>
    <h2 class="text-center font-bold text-green-300">(API Service Data)</h2>

    <br/>

    <div class="">
        @if(isset($arrayBooks))
            <div wire:loading.flex class="font-bold text-gray-400 justify-center">Fetching Books...</div>
            <div wire:loading.remove>
                <ul>
                    @foreach($arrayBooks as $book)
                        <li class="divide-y-2">
                            <div class="flex flex-row justify-start items-center space-x-2">
                                @if($showBookImage)
                                <img class="object-contain h-24 w-12" src="{{$book['image']}}" alt="book-image">
                                @endif
                                {{-- todo: $book->title doesn't work
                                {{-- todo: same error occurs when book wireable BookListComponent have other listeners fired --}}
                                {{-- todo: report that bug the livewire repo: --}}
                                <span class="w-96 font-bold p-2 overflow-auto whitespace-normal">{{$book['title']}}</span>
                            </div>
                            <div class="divider"></div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="font-bold p-2 text-center">Loading ...</p>
        @endif
    </div>

</div>


