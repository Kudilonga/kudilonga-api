<?php

namespace App\Repositories\Eloquent\V1;

use App\Models\Language;
use App\Repositories\{
    Eloquent\AbstractRepository,
    Contracts\V1\LanguageRepositoryInterface
};

class LanguageRepository extends AbstractRepository implements LanguageRepositoryInterface
{
    protected $model = Language::class;
}
