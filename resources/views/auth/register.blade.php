<x-layouts.layout>
    <x-form>
        <x-slot:title>
            Register an account
        </x-slot:title>

        <x-slot:subtitle>
            Subtitle goes here
        </x-slot:subtitle>

        <form
            action="/register"
            method="POST"
            class="space-y-4 mt-10"
        >
            @csrf

            <x-form.field
                id="name"
                name="name"
                label="Name"
            />

            <x-form.field
                id="email"
                name="email"
                label="Email"
                type="email"
            />

            <x-form.field
                id="password"
                name="password"
                label="Password"
                type="password"
            />

            <button type="submit" class="btn mt-2 h-10 w-full">
                Create account
            </button>
        </form>
    </x-form>
</x-layouts.layout>
