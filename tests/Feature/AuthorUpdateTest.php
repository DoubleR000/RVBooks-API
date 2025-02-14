<?php

use App\Models\Author;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\actingAs;

test('unauthenticated user cannot update author data', function () {
    $this->putJson(route('authors.update', [1]))->assertStatus(401);
});

test('patron cannot update author data', function () {

    $patron = User::factory()->patron()->create();

    actingAs($patron)
        ->putJson(route('authors.update', [1]), ['name' => 'Patron Updated Author'])
        ->assertStatus(403);
});

test('librarian can update author data', function () {

    $librarian = User::factory()->librarian()->create();
    $name = 'Librarian Updated Author';

    actingAs($librarian)
        ->putJson(route('authors.update', [1]), ['name' => $name])
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) =>
            $json->has('data', fn(AssertableJson $json) =>
                $json->hasAll(['id', 'name'])
                    ->where('name', $name)));
});

test('admin can update author data', function () {

    $admin = User::factory()->admin()->create();
    $name = 'Admin Updated Author';

    actingAs($admin)
        ->putJson(route('authors.update', [1]), ['name' => $name])
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) =>
            $json->has('data', fn(AssertableJson $json) =>
                $json->hasAll(['id', 'name'])
                    ->where('name', $name)));
});


test('returns 422 if name is already taken', function () {

    $admin = User::factory()->admin()->create();

    $author = Author::factory()->create([
        'name' => 'Test Author'
    ]);

    actingAs($admin)
        ->putJson(route('authors.update', $author->id), ['name' => $author->name])
        ->assertStatus(422);
});
