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

            <p><span class="text-green-500">Product Title: </span>@if(isset($product)){{ $product->title }}@else Loading Product ... @endif</p>
            <p><span class="text-green-500">Product Author: </span>@if(isset($product)){{ $product->author }}@else Loading Product ... @endif</p>
            <hr/>
            <p>Product title letter count : <span class="text-green-500 font-bold">@if(isset($product)){{ $this->productTitleLetterCount }}@else Loading Book ... @endif </span></p>

            <hr/>
        </div>

        <div class="basis-1/2 flex flex-col justify-start items-stretch">
            <livewire:product-list-component/>
        </div>
    </div>

    <br/>

    <div class="flex justify-between">
        <livewire:a-book-child-component :aBook="$aBook"/>
        <livewire:e-book-child-component :eBook="$eBook"/>
        <livewire:product-child-component/>
    </div>

    <div class="flex justify-center items-center space-x-2">
        <label for="email" class="tracking-wide font-bold">Email:</label>
        <div class="flex flex-col justify-center items-center space-y-1">
            {{-- if you are expecting a click after the input use wire.model.lazy --}}
            <input id="email" type="email" wire:model.lazy="email">
            @error('email') <p class="text-sm text-red-600 font-bold">{{ $message }}</p> @enderror
        </div>
        <div wire:loading.inline class="font-bold text-gray-400 justify-center">Sending Email...</div>
        <div wire:loading.remove>
            <button wire:click.prevent="handleSendClick" class="bg-orange-300 text-white font-bold p-2 m-2 shadow-lg">Send Books List</button>
        </div>
    </div>

</div>

