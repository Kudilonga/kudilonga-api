<?php

namespace App\Repositories\Contracts\V1;

interface LanguageRepositoryInterface
{
    public function all();
    public function find(int $id);
    public function create(array $fields);
    public function update(array $fields, int $id);
}
