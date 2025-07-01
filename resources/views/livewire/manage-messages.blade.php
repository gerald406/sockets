<div>
    <form wire:submit ="save" method="POST" class="bg-white rounded-lg shadow-lg p-6">
        <x-validation-errors/>
        <div class="mb-4">
            <x-label class="mb-1">
                Mensaje
            </x-label>
            <x-textarea wire:model="content" class="w-full" placeholder="Ingrese tu texto"></x-textarea>
        </div>

        <div class="flex justify-end">
            <x-button>Enviar</x-button>
        </div>
        
    </form>

    @if ($messages->count())
    <div class="bg-white rounded-lg shadow-lg p-6">
        <ul class="space-y-4">
            @foreach ($messages as $message)
                <li class="flex">
                    <div class="mr-4 shrink-0">
                        <img class="h-8 w-8 rounded-full object-cover object-center" src="{{ $message->user->profile_photo_url }}" alt="">
                    </div>

                    <div class="flex-1">
                        <p>
                            <b>{{ $message->user->name }}</b>
                            <span class="text-gray-500 text-sm">{{ $message->created_at->diffForHumans() }}</span>
                        </p>
                        <div>
                            {{ $message->content }}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endif

</div>

