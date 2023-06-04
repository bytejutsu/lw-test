<div class="border-4 border-black p-4 m-4">
    <div class="flex flex-row justify-between">
        <div class="w-20"></div>
        <h2 class="text-center font-bold">Parent Component</h2>
        <livewire:time-indicator-component/>
    </div>

    <br/>

    <div class="flex flex-row justify-between">
        <div class="basis-1/2 flex flex-col">
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

        <div class="basis-1/2 flex flex-col justify-start items-stretch">
            <div wire:loading.flex class="font-bold text-gray-400 justify-center">
                Fetching Books...
            </div>
            <livewire:books-list-component :books="$books"/>
        </div>
    </div>

    <br/>

    <div class="flex justify-between">
        <livewire:a-book-child-component :aBook="$aBook"/>
        <livewire:e-book-child-component :eBook="$eBook"/>
        <livewire:book-child-component :book="$book"/>
    </div>

</div>
