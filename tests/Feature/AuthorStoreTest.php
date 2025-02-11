<?php

use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\actingAs;


test('unauthenticated user cannot store new author', function () {
    $this->postJson(route('authors.store'))->assertStatus(401);
});

test('patron cannot store new author', function () {

    $patron = User::factory()->patron()->create();

    actingAs($patron)
        ->postJson(route('authors.store'), ['name' => 'Patron Stored Author'])
        ->assertStatus(403);
});

test('librarian can store new author', function () {

    $librarian = User::factory()->librarian()->create();
    $name = "Librarian Stored Author";

    actingAs($librarian)
        ->postJson(route('authors.store'), ['name' => $name])
        ->assertStatus(201)
        ->assertJson(fn(AssertableJson $json) =>
            $json->has('data', fn(AssertableJson $json) =>
                $json->hasAll(['id', 'name'])
                    ->where('name', $name)));
});

test('admin can store new author', function () {

    $admin = User::factory()->admin()->create();
    $name = "Admin Stored Author";

    actingAs($admin)
        ->postJson(route('authors.store'), ['name' => $name])
        ->assertStatus(201)
        ->assertJson(fn(AssertableJson $json) =>
            $json->has('data', fn(AssertableJson $json) =>
                $json->hasAll(['id', 'name'])
                    ->where('name', $name)));
});
