<div class="border-2 border-red-500 p-4 m-4">
    <h2 class="text-center font-bold text-red-500">EBook Child Component</h2>
    <h2 class="text-center font-bold text-red-500">(Eloquent Model)</h2>

    <br/>

    <div class="flex justify-between">
        <label for="e-book-title" class="text-red-500">EBook Title:</label>
        <input type="text" id="e-book-title" wire:model="eBook.title">
    </div>
    <br/>
    <div class="flex justify-between">
        <label for="e-book-author" class="text-red-500">EBook Author:</label>
        <input type="text" id="e-book-author" wire:model="eBook.author">
    </div>
</div>
