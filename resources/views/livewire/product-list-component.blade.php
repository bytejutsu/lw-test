<div class="border-2 border-green-300 p-4 m-4">

    <h2 class="text-center font-bold text-green-300">Products Search List Child Component</h2>
    <h2 class="text-center font-bold text-green-300">(API Service Data)</h2>

    <br/>

    <div class="">
        @if(isset($arrayProducts))
            <div wire:loading.flex class="font-bold text-gray-400 justify-center">Fetching Products...</div>
            <div wire:loading.remove>

                @if(empty($arrayProducts))
                    <div class="font-bold p-2 overflow-auto whitespace-normal text-center">No Matching Results</div>
                @endif

                <ul>
                    @foreach($arrayProducts as $product)
                        <li class="divide-y-2">
                            <div class="flex flex-row justify-start items-center space-x-2">
                                @if($showProductImage)
                                <img class="object-contain h-24 w-12" src="{{$product['image']}}" alt="product-image">
                                @endif
                                {{-- todo: $book->title doesn't work
                                {{-- todo: same error occurs when book wireable BookListComponent have other listeners fired --}}
                                {{-- todo: report that bug the livewire repo: --}}
                                <span class="w-96 font-bold p-2 overflow-auto whitespace-normal">{{$product['title']}}</span>
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


