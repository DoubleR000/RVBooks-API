<?php

use App\Models\Author;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\actingAs;


beforeEach(function () {
    $this->author = Author::factory()->create([
        'name' => 'Test Author'
    ]);
});

test('unauthenticated user cannot delete author data', function () {
    $this->deleteJson(route('authors.destroy', $this->author->id))->assertStatus(401);
});


test('patron cannot delete author data', function () {

    $patron = User::factory()->patron()->create();

    actingAs($patron)
        ->deleteJson(route('authors.destroy', $this->author->id))
        ->assertStatus(403);
});

test('librarian can delete author data', function () {

    $librarian = User::factory()->librarian()->create();

    actingAs($librarian)
        ->deleteJson(route('authors.destroy', $this->author->id))
        ->assertStatus(204)
        ->assertContent('');
});

test('admin can delete author data', function () {

    $admin = User::factory()->admin()->create();

    actingAs($admin)
        ->deleteJson(route('authors.destroy', $this->author->id))
        ->assertStatus(204)
        ->assertContent('');
});

test('user cannot delete non-existent author data', function () {
    $admin = User::factory()->admin()->create();

    actingAs($admin)
        ->deleteJson(route('authors.destroy', 999))
        ->assertStatus(404);
});
