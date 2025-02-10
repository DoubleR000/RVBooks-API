<?php

use App\Models\User;
use function Pest\Laravel\actingAs;

test('unauthenticated user cannot view author list', function () {
    $this->get(route('authors.index'))->assertStatus(401);
});

test('admin can view author list', function () {

    $admin = User::factory()->admin()->create();

    actingAs($admin)
        ->get(route('authors.index'))
        ->assertStatus(200);
});

test('librarian can view author list', function () {

    $librarian = User::factory()->librarian()->create();

    actingAs($librarian)
        ->get(route('authors.index'))
        ->assertStatus(200);
});

test('patron can view author list', function () {

    $patron = User::factory()->patron()->create();

    actingAs($patron)
        ->get(route('authors.index'))
        ->assertStatus(200);
});


