<?php

use App\Models\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('does not create a language without a language_name field', function () {
    $response = $this->postJson('/api/languages', []);
    $response->assertStatus(422);
});

it('can create a language', function () {
    $attributes = Language::factory()->raw();
    $response   = $this->postJson('/api/languages', $attributes);
    // $response->dump();
    $response->assertStatus(201)->assertJson([
        'message'  => 'Língua adicionada!',
        'language' => $attributes
    ]);
    $this->assertDatabaseHas('languages', $attributes);
});

it('can update a language', function () {
    $language        = Language::factory()->create();
    $updatedLanguage = ['language_name' => 'Francês'];

    $response = $this->putJson("/api/languages/{$language->id}", $updatedLanguage);
    // $response->dump();

    $response->assertStatus(200)->assertJson(['message'  => 'Língua actualizada!']);
    $this->assertDatabaseHas('languages', $updatedLanguage);
});

it('can fetch a language', function () {
    $language = Language::factory()->create();

    $response = $this->getJson("/api/languages/{$language->id}");

    $data = [
        'message'  => 'Língua encontrada!',
        'language' => [
            'id'            => $language->id,
            'language_name' => $language->language_name
        ]
    ];

    $response->assertStatus(200)->assertJson($data);
});
