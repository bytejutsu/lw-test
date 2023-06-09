<div wire:init="notify" class="border-4 border-green-700 p-4 m-4">

    <div x-data="{
        showBookImage: $persist(@entangle('showBookImage')),
        maxBooks: $persist(@entangle('maxBooks')),
    }">
    </div>

    <h2 class="text-center font-bold text-green-700">Books Search List Settings Component</h2>
    <br/>
    <div class="flex flex-col space-y-2">
        <div class="flex justify-between items-center">
            <label for="show-book-image" class="text-green-700">Show Book Image:</label>
            <input type="checkbox" id="show-book-image" wire:model="showBookImage">
        </div>

        <select name="max-books" id="max-books" wire:model="maxBooks">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        @error('maxBooks') <p class="w-52 text-sm text-red-600 font-bold overflow-auto whitespace-normal">{{ $message }}</p> @enderror

        @error('showBookImage') <p class="w-52 text-sm text-red-600 font-bold overflow-auto whitespace-normal">{{ $message }}</p> @enderror

    </div>
</div>
