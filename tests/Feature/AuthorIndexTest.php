<?php

use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\actingAs;

test('unauthenticated user cannot view author list', function () {
    $this->getJson(route('authors.index'))->assertStatus(401);
});


test('admin can view author list', function () {

    $admin = User::factory()->admin()->create();

    actingAs($admin)
        ->getJson(route('authors.index'))
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) =>
            $json->hasAll(['data', 'links', 'meta'])
                ->has('data.0', fn(AssertableJson $json) =>
                    $json->hasAll(['id', 'name'])));
});

test('librarian can view author list', function () {

    $librarian = User::factory()->librarian()->create();

    actingAs($librarian)
        ->getJson(route('authors.index'))
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) =>
            $json->hasAll(['data', 'links', 'meta'])
                ->has('data.0', fn(AssertableJson $json) =>
                    $json->hasAll(['id', 'name'])));
});

test('patron can view author list', function () {

    $patron = User::factory()->patron()->create();

    actingAs($patron)
        ->getJson(route('authors.index'))
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) =>
            $json->hasAll(['data', 'links', 'meta'])
                ->has('data.0', fn(AssertableJson $json) =>
                    $json->hasAll(['id', 'name'])));
});
