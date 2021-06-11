<?php

namespace App\Repositories\Contracts\V1;

use App\Http\Requests\V1\Word\WordCreateRequest;

interface WordRepositoryInterface
{
    public function all();
    public function find(int $id);
    public function store(WordCreateRequest $data);
    public function getWordsByLanguageId(int $id);
}
