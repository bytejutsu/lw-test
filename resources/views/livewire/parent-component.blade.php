<div class="border-4 border-black p-4 m-4">
    <div class="flex flex-row justify-between">
        <div class="w-20"></div>
        <h2 class="text-center font-bold">Parent Component</h2>
        <livewire:time-indicator-component/>
    </div>

    <br/>

    <div class="flex flex-row justify-between">
        <div class="basis-1/2 flex flex-col">
            <div class="w-fit bg-blue-500 text-white text-sm font-bold p-2 ">Encryption Service</div>
            <p><span class="text-blue-500">ABook Title:</span> {{ $this->aBookTitle }}</p>
            <p><span class="text-blue-500">ABook Author:</span> {{ $aBook['author'] }}</p>

            <hr/>

            <p>ABook title letter count : <span class="text-blue-500">{{ $this->aBookTitleLetterCount }}</span></p>

            <hr/>

            <br/>

            <div class="w-fit bg-red-500 text-white text-sm font-bold p-2 ">Database Service</div>
            <p><span class="text-red-500">EBook Title: </span>{{ $eBook['title'] }}</p>
            <p><span class="text-red-500">EBook Author: </span>{{ $eBook['author'] }}</p>

            <hr/>

            <p>EBook title letter count : <span class="text-red-500">{{ $this->eBookTitleLetterCount }}</span></p>

            <hr/>

            <br/>

            <div class="w-fit bg-green-500 text-white text-sm font-bold p-2 ">API Service</div>

            <p><span class="text-green-500">Book Title: </span>@if(isset($book)){{ $book->title }}@else Loading Book ... @endif</p>
            <p><span class="text-green-500">Book Author: </span>@if(isset($book)){{ $book->author }}@else Loading Book ... @endif</p>
            <hr/>
            <p>Book title letter count : <span class="text-green-500 font-bold">@if(isset($book)){{ $this->bookTitleLetterCount }}@else Loading Book ... @endif </span></p>

            <hr/>
        </div>

        <div class="basis-1/2 flex flex-col justify-start items-stretch">
            <livewire:book-list-component/>
        </div>
    </div>

    <br/>

    <div class="flex justify-between">
        <livewire:a-book-child-component :aBook="$aBook"/>
        <livewire:e-book-child-component :eBook="$eBook"/>
        <livewire:book-child-component/>
    </div>

    <div class="flex justify-center items-center space-x-2">
        <label for="email" class="tracking-wide font-bold">Email:</label>
        <input id="email" type="email" wire:model="email">
        <button wire:click.prevent="sendBookListEmail" class="bg-orange-300 text-white font-bold p-2 m-2 shadow-lg">Send Books List</button>
    </div>

</div>
