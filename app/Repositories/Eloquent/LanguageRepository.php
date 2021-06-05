<?php

namespace App\Repositories\Eloquent;

use App\Models\Language;
use App\Repositories\Contracts\LanguageRepositoryInterface;

class LanguageRepository extends AbstractRepository implements LanguageRepositoryInterface
{
    protected $model = Language::class;
}
