<x-layouts.layout>
    <x-form>
        <x-slot:title>
            Login
        </x-slot:title>

        <x-slot:subtitle>
            Glad to have you back
        </x-slot:subtitle>

        <form
            action="/login"
            method="POST"
            class="space-y-4 mt-10"
        >
            @csrf

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

            <button
                type="submit"
                class="btn mt-2 h-10 w-full"
                data-test="login-button"
            >
                Sign in
            </button>
        </form>
    </x-form>
</x-layouts.layout>
