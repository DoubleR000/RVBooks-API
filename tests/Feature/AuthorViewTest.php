<?php

use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\actingAs;

test('unauthenticated user cannot view author data', function () {
    $this->getJson(route('authors.show', [1]))->assertStatus(401);
});

test('admin can view author data', function () {

    $admin = User::factory()->admin()->create();

    actingAs($admin)
        ->getJson(route('authors.show', [1]))
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) =>
            $json->has('data', fn(AssertableJson $json) =>
                $json->hasAll(['id', 'name'])));
});

test('librarian can view author data', function () {

    $librarian = User::factory()->librarian()->create();

    actingAs($librarian)
        ->getJson(route('authors.show', [1]))
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) =>
            $json->has('data', fn(AssertableJson $json) =>
                $json->hasAll(['id', 'name'])));
});

test('patron can view author data', function () {

    $patron = User::factory()->patron()->create();

    actingAs($patron)
        ->getJson(route('authors.show', [1]))
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) =>
            $json->has('data', fn(AssertableJson $json) =>
                $json->hasAll(['id', 'name'])));
});

test('returns 404 if resource does not exist', function () {
    $patron = User::factory()->patron()->create();

    actingAs($patron)
        ->getJson(route('authors.show', [999]))
        ->assertStatus(404);
});
