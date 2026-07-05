<x-layouts.layout>
    <div class="py-8 max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <a
                class="inline-flex items-center gap-x-2 text-sm font-medium"
                href="{{ route('ideas.index') }}"
            >
                <x-icons.arrow-back />
                Back to ideas
            </a>

            <div class="flex items-center gap-x-2">
                <button class="btn btn-outlined">
                    <x-icons.external />
                    Edit idea
                </button>

                <form action="{{ route('ideas.destroy', $idea) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outlined text-red-500">
                        Delete idea
                    </button>
                </form>
            </div>
        </div>

        <div class="space-y-6">
            <h1 class="font-bold text-4xl">
                {{ $idea->title }}
            </h1>

            <div class="flex items-center gap-x-2">
                <x-idea.status :status="$idea->status">
                    {{ $idea->status->label() }}
                </x-idea.status>

                <span class="text-sm text-muted">
                    {{ $idea->created_at->diffForHumans() }}
                </span>
            </div>

            <x-idea-card class="mt-6">
                <x-slot:description>
                    {{ $idea->description }}
                </x-slot:description>
            </x-idea-card>

            @if($idea->links->count())
            <div>
                <h3 class="font-bold text-xl">
                    Links
                </h3>

                <ul>
                    @foreach($idea->links as $link)
                        <li>
                            <a
                                class="text-primary hover:underline"
                                href="{{ $link }}"
                                target="_blank"
                            >
                                {{ $link }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</x-layouts.layout>
