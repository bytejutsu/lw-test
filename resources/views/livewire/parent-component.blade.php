<div class="border-4 border-black p-4 m-4">
    <h2 class="text-center font-bold">Parent Component</h2>

    <br/>

    <p><span class="text-blue-500">ABook Title:</span> {{ $aBook['title'] }}</p>
    <p><span class="text-blue-500">ABook Author:</span> {{ $aBook['author'] }}</p>

    <hr/>

    <p>ABook title letter count : <span class="text-blue-500">{{ $this->aBookTitleLetterCount }}</span></p>

    <hr/>

    <br/>

    <p><span class="text-red-500">EBook Title: </span>{{ $eBook['title'] }}</p>
    <p><span class="text-red-500">EBook Author: </span>{{ $eBook['author'] }}</p>

    <hr/>

    <p>EBook title letter count : <span class="text-red-500">{{ $this->eBookTitleLetterCount }}</span></p>

    <hr/>

    <br/>

    <p><span class="text-green-500">Book Title: </span>{{ $book->title }}</p>
    <p><span class="text-green-500">Book Author: </span>{{ $book->author }}</p>

    <hr/>

    <p>Book title letter count : <span class="text-green-500">{{ $this->bookTitleLetterCount }}</span></p>

    <hr/>

    <br/>

    {{-- renamed parameter eBook to initEBook to avoid typehinting inside the child component class because $eBook is passed as array --}}
    <div class="flex justify-between">
        <livewire:a-book-child-component :aBook="$aBook"/>
        <livewire:e-book-child-component :eBook="$eBook"/>
        <livewire:book-child-component :book="$book"/>
    </div>



</div>
