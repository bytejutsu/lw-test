<div wire:init="notify" class="border-4 border-green-700 p-4 m-4">

    <div x-data="{
        showProductImage: $persist(@entangle('showProductImage')),
        limit: $persist(@entangle('limit')),
    }">
    </div>

    <h2 class="text-center font-bold text-green-700">Product Search List Settings Component</h2>
    <br/>
    <div class="flex flex-col space-y-2">
        <div class="flex justify-between items-center">
            <label for="show-product-image" class="text-green-700">Show Product Image:</label>
            <input type="checkbox" id="show-product-image" wire:model="showProductImage">
        </div>

        <select name="limit" id="limit" wire:model="limit">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        @error('limit') <p class="w-52 text-sm text-red-600 font-bold overflow-auto whitespace-normal">{{ $message }}</p> @enderror

        @error('showProductImage') <p class="w-52 text-sm text-red-600 font-bold overflow-auto whitespace-normal">{{ $message }}</p> @enderror

    </div>
</div>
