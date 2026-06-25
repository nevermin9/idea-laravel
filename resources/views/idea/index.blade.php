<x-layouts.layout>
    <div>
        <header class="py-8 md:py-12">
            <h1 class="text-3xl font-bold">
                Ideas
            </h1>

            <p class="text-muted-foreground text-sm mt-2">
                Caputure your thoughts. Make a plan
            </p>
        </header>

        <div>
            <a href="{{ route('ideas.index') }}" class="btn {{ request('status') === null ? '' : 'btn-outlined' }}">
                All
            </a>
            @foreach(App\IdeaStatus::cases() as $status)
                <a
                    href="{{ route('ideas.index', ['status' => $status->value]) }}"
                    class="btn {{ request('status') === $status->value ? '' : 'btn-outlined' }}"
                >
                    {{ $status->label() }}
                    <span class="text-xs pl-2">
                        {{ $statusCounts->get($status->value) }}
                    </span>
                </a>
            @endforeach
        </div>

        <div class="mt-10 text-muted-foreground">
            <div class="grid md:grid-cols-2 gap-6">
                @forelse($ideas as $idea)
                    <x-idea-card href="{{ route('ideas.show', $idea) }}">
                        <x-slot:status>
                            <x-idea.status status="{{ $idea->status->value }}">
                                {{ $idea->status->label() }}
                            </x-idea.status>
                        </x-slot:status>

                        <x-slot:title>
                            {{ $idea->title }}
                        </x-slot:title>

                        <x-slot:description>
                            {{ $idea->description }}
                        </x-slot:description>

                        <x-slot:timestamp>
                            {{ $idea->created_at->diffForHumans() }}
                        </x-slot:timestamp>
                    </x-idea-card>
                @empty
                    <p>
                        No ideas at this time.
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.layout>
