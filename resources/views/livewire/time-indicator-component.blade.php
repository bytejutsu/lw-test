<div wire:poll.1s class="w-28 h-28 border-4 border-black rounded-full flex flex-col items-center justify-center bg-white text-gray-700 text-xl font-bold">
    <span>{{ now()->format('h:i:s') }}</span>
    <span>{{ now()->format('A') }}</span>
</div>

