<?php

test('registers a user', function (): void {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john@doe.com')
        ->fill('password', 'password123')
        ->click('@register-button')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    $this->assertDatabaseHas('users', [
        'name' => 'John Doe',
        'email' => 'john@doe.com',
    ]);
});
