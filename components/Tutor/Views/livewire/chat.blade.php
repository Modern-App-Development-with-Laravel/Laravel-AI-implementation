<div class="space-y-4">
    @forelse ($messages as $message)
        <div class="p-2 rounded {{ $message['role'] === 'user' ? 'bg-blue-100' : 'bg-green-100' }}">
            <strong>{{ ucfirst($message['role']) }}:</strong> 
            
            <div class="prose prose-sm max-w-none">
            {!! Illuminate\Support\Str::markdown($message['content']) !!}
            </div>
        </div>
    @empty
        <div class="p-2 rounded bg-gray-100 text-xs">
            No messages yet.
        </div>
    @endforelse

    <form class="space-x-2">
        <textarea
            wire:model="message"
            class="rounded p-2 w-full resize-none border border-gray-300"
            rows="2"
            placeholder="Type your message..."
        ></textarea>

        @error('message')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror

        <button        
            type="button" 
            wire:click="sendMessage"
            wire:loading.attr="disabled"
            wire:loading.class="opacity-50"
            class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer"
        >
            Send question
        </button>

        <span 
            wire:loading
            class="text-gray-500 text-xs"
        >Generating response...</span>
    </form>
</div>
