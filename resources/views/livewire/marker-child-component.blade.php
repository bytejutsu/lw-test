<div class="border-2 border-red-500 p-4 m-4">
    <h2 class="text-center font-bold text-red-500">Marker Child Component</h2>
    <h2 class="text-center font-bold text-red-500">(Eloquent Model)</h2>

    <br/>

    <div class="flex flex-col justify-center items-center space-y-1">
        <div class="flex justify-between">
            <label for="marker-lat" class="text-red-500">Lat:</label>
            <input type="text" id="marker-lat" wire:model="marker.lat">
        </div>
        @error('marker.lat') <p class="w-52 text-sm text-red-600 font-bold overflow-auto whitespace-normal">{{ $message }}</p> @enderror
    </div>
    <br/>
    <div class="flex flex-col justify-center items-center space-y-">
        <div class="flex justify-between">
            <label for="marker-long" class="text-red-500">Long:</label>
            <input type="text" id="marker-long" wire:model="marker.long">
        </div>
        @error('marker.long') <p class="w-52 text-sm text-red-600 font-bold overflow-auto whitespace-normal">{{ $message }}</p> @enderror
    </div>
</div>
