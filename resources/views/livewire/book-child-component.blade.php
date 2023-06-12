<div wire:init="notify" class="border-2 border-green-500 p-4 m-4">

    {{-- notify will be called on init so the child-component properties will be emitted to the parent --}}

    <div x-data="{
        bookTile: $persist(@entangle('book.title')),
        bookAuthor: $persist(@entangle('book.author')),
    }">
    </div>

    <h2 class="text-center font-bold text-green-500">Book Child Component</h2>
    <h2 class="text-center font-bold text-green-500">(DTO Model)</h2>

    {{-- in the case of wiring attributes both accessing the attributes of arrays or eloquent model objects is the same with a . --}}

    <br/>

    <div class="flex justify-between">
        <label for="book-title" class="text-green-500">Book Title:</label>
        <div class="flex flex-col justify-center items-center space-y-1">
            <input type="text" id="book-title" wire:model.defer="book.title">
            @error('book.title') <p class="w-52 text-sm text-red-600 font-bold overflow-auto whitespace-normal">{{ $message }}</p> @enderror
        </div>
    </div>
    <br/>
    <div class="flex justify-between">
        <label for="book-author" class="text-green-500">Book Author:</label>
        <div class="flex flex-col justify-center items-center space-y-1">
            <input type="text" id="book-author" wire:model.debounce.200ms="book.author">
            @error('book.author') <p class="w-52 text-sm text-red-600 font-bold overflow-auto whitespace-normal">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <livewire:book-search-list-settings-component/>
    </div>
</div>
