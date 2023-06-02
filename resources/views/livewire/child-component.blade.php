<div wire:init="initialize" class="border p-4 m-4">

    {{-- initialize will be called on init so the child-component properties will be emitted to the parent --}}

    <h2 class="text-center">Child Component</h2>

    {{-- in the case of wiring attributes both accessing the attributes of arrays or eloquent model objects is the same with a . --}}

    <br/>

    <div>
        <label for="book-title">Book Title:</label>
        <input type="text" id="book-title" wire:model="book.title">
    </div>
    <div>
        <label for="book-author">Book Author:</label>
        <input type="text" id="book-author" wire:model="book.author">
    </div>

    <br/>

    <div>
        <label for="ebook-title">EBook Title:</label>
        <input type="text" id="ebook-title" wire:model="eBook.title">
    </div>
    <div>
        <label for="ebook-author">EBook Author:</label>
        <input type="text" id="ebook-author" wire:model="eBook.author">
    </div>
</div>
