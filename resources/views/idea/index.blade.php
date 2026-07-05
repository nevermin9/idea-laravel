<x-layouts.layout>
    <div>
        <header class="py-8 md:py-12">
            <h1 class="text-3xl font-bold">
                Ideas
            </h1>

            <p class="text-muted-foreground text-sm mt-2">
                Caputure your thoughts. Make a plan
            </p>

            <x-card
                x-data
                class="mt-10 cursor-pointer h-32 w-full text-left"
                is="button"
                @click="$dispatch('open-modal', { id: 'create-idea' })"
                type="button"
            >
                <p>
                    What's the idea
                </p>
            </x-card>
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

    {{--  modals  --}}
    <x-modal name="create-idea" title="Create Idea">
        <form
            x-data="{ status: @js(App\IdeaStatus::PENDING) }"
            action="{{ route('ideas.store') }}"
            method="POST"
        >
            @csrf

            <div class="space-y-6">
                <x-form.field
                    label="Title"
                    name="title"
                    id="idea-title"
                    placeholder="Enter an idea title"
                    required
                    autofocus
                />

                <div class="space-y-2">
                    <label for="status" class="label">
                        Status
                    </label>

                    <div class="flex gap-x-3">
                        @foreach(App\IdeaStatus::cases() as $status)
                            <button
                                type="button"
                                class="btn flex-1 h-10"
                                :class="{ 'btn-outlined': status !== @js($status->value) }"
                                @click="status = @js($status->value)"
                            >
                                {{ $status->label() }}
                            </button>
                        @endforeach

                        <input
                            type="hidden"
                            name="status"
                            :value="status"
                        />
                    </div>

                    <x-form.error name="status" />
                </div>

                <x-form.field
                    type="textarea"
                    id="idea-description"
                    label="Description"
                    name="description"
                    placeholder="Enter an idea's description"
                />

                <div class="flex justify-end gap-x-5">
                    <button
                        type="button"
                        @click="$dispatch('close-modal', { id: 'create-idea' })"
                    >
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Create Idea
                    </button>
                </div>
            </div>
        </form>
    </x-modal>
</x-layouts.layout>
