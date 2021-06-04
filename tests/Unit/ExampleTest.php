<?php

use App\Models\Example;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

test('example', function () {
    $this->assertTrue(true);
});
