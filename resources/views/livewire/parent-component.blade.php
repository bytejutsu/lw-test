<div class="border-4 border-black p-4 m-4">
    <h2 class="text-center font-bold">Parent Component</h2>

    <br/>

    <div class="flex flex-row justify-between">
        <div class="flex flex-col">
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
        </div>

        <div class="flex flex-col justify-start items-center">
            <div wire:loading.flex>
                Fetching Books...
            </div>
            <livewire:books-list wire:key="{{ Str::random() }}" :books="$books"/>
        </div>
    </div>

    <br/>

    <div class="flex justify-between">
        <livewire:a-book-child-component :aBook="$aBook"/>
        <livewire:e-book-child-component :eBook="$eBook"/>
        <livewire:book-child-component :book="$book"/>
    </div>

</div>
