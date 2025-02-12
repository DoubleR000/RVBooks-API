<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Sanctum\Sanctum;
use function Pest\Laravel\actingAs;


test('user can register', function () {
    $userData = [
        'name' => 'Test User',
        'email' => 'test123@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ];

    $this->postJson(route('register'), $userData)
        ->assertStatus(201)
        ->assertJsonStructure([
            'user' => [
                'id',
                'name',
                'email'
            ],
            'token'
        ]);

    //  I hate this unreadable piece of junk tbh.
    //  Use this if you need to check the email and name inside the json response.
    //
    // $response->assertStatus(201)
    //     ->assertJson(fn(AssertableJson $json) =>
    //         $json->has('token')
    //             ->has('user', fn(AssertableJson $json) =>
    //                 $json->where('name', $userData['name'])
    //                     ->where('email', $userData['email'])
    //                     ->etc())
    //             ->etc());

    $this->assertDatabaseHas('users', [
        'email' => $userData['email']
    ]);
});

test('user cannot register with existing email', function () {

    User::factory()->create([
        'email' => 'test123@example.com',
    ]);

    $this->postJson(route('register'), [
        'name' => 'Test User',
        'email' => 'test123@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123'
    ])->assertStatus(422);
});

test('user cannot register with password with less than 8 characters', function () {
    $this->postJson(route('register'), [
        'name' => 'Test User',
        'email' => 'test123@example.com',
        'password' => 'pass',
        'password_confirmation' => 'password123'
    ])->assertStatus(422);
});


test('user can log in', function () {
    $userData = [
        'email' => 'test123@example.com',
        'password' => 'password'
    ];

    User::factory()->create([
        'email' => $userData['email'],
        'password' => Hash::make($userData['password'])
    ]);

    $this->postJson(route('login'), $userData)
        ->assertStatus(200)
        ->assertJsonStructure([
            'user' => [
                'id',
                'name',
                'email'
            ],
            'token'
        ]);
});

test('user cannot log in with non-existent email', function () {
    $userData = [
        'email' => 'nonexistentemail987@example.com',
        'password' => 'password'
    ];

    // Ensure that email is nonexistent
    User::withTrashed()
        ->where('email', $userData['email'])
        ->forceDelete();

    $this->postJson(route('login'), $userData)
        ->assertStatus(401);
});

test('user cannot login with incorrect password', function () {
    $userData = [
        'email' => 'test123@example.com',
        'password' => 'password'
    ];

    User::factory()->create([
        'email' => $userData['email'],
        'password' => Hash::make($userData['password'])
    ]);

    $this->postJson(route('login'), [
        'email' => $userData['email'],
        'password' => 'wrongPassword'
    ])->assertStatus(401);
});

test('user can access protected route with API token', function () {
    $user = User::factory()->create();

    $token = $user->createToken('test-token')->plainTextToken;

    $this->getJson(route('user'), [
        'Authorization' => 'Bearer ' . $token
    ])->assertStatus(200)
        ->assertJsonStructure([
            'id',
            'name',
            'email'
        ]);
});

test('user cannot access protected route without API token', function () {
    $this->getJson(route('user'))
        ->assertStatus(401);
});

test('user can log out and delete tokens', function () {

    $user = User::factory()->create();

    $user->createToken('test-token')->plainTextToken;

    actingAs($user)
        ->postJson(route('logout'), [])
        ->assertStatus(200);

    $this->assertCount(0, $user->tokens);
});
