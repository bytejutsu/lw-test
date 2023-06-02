<div wire:init="initialize" class="border-2 border-blue-500 p-4 m-4">

    {{-- initialize will be called on init so the child-component properties will be emitted to the parent --}}

    <h2 class="text-center font-bold text-blue-500">Child Component</h2>

    {{-- in the case of wiring attributes both accessing the attributes of arrays or eloquent model objects is the same with a . --}}

    <br/>

    <div class="flex justify-between">
        <label for="book-title">Book Title:</label>
        <input type="text" id="book-title" wire:model="book.title">
    </div>
    <div class="flex justify-between">
        <label for="book-author">Book Author:</label>
        <input type="text" id="book-author" wire:model="book.author">
    </div>

    <br/>

    <div class="flex justify-between">
        <label for="ebook-title">EBook Title:</label>
        <input type="text" id="ebook-title" wire:model="eBook.title">
    </div>
    <div class="flex justify-between">
        <label for="ebook-author">EBook Author:</label>
        <input type="text" id="ebook-author" wire:model="eBook.author">
    </div>
</div>
