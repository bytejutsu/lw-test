<div class="border-2 border-green-500 p-4 m-4"> {{-- wire:init="initialize" --}}

    {{-- initialize will be called on init so the child-component properties will be emitted to the parent --}}

    <h2 class="text-center font-bold text-green-500">Book Child Component</h2>
    <h2 class="text-center font-bold text-green-500">(DTO Model)</h2>

    {{-- in the case of wiring attributes both accessing the attributes of arrays or eloquent model objects is the same with a . --}}

    <br/>

    <div class="flex justify-between">
        <label for="book-title" class="text-green-500">Book Title:</label>
        <input type="text" id="book-title" wire:model="book.title">
    </div>
    <div class="flex justify-between">
        <label for="book-author" class="text-green-500">Book Author:</label>
        <input type="text" id="book-author" wire:model="book.author">
    </div>
</div>
