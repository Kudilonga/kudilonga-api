<?php

namespace App\Http\Controllers;

use Exception;
use App\{
    Http\Requests\Language\LanguageRequest,
    Repositories\Contracts\LanguageRepositoryInterface
};
class LanguageController extends Controller
{
    public function index(LanguageRepositoryInterface $language)
    {
        return response()->json([
            'message'   => 'Todas as línguas',
            'languages' => $language->all()
        ], self::OK());
    }

    public function store(
        LanguageRepositoryInterface $language,
        LanguageRequest $language_request
    )
    {
        try{
            $new_language = $language->create(['language_name' => $language_request->language_name]);

            return response()->json([
                'message'  => 'Língua adicionada!',
                'language' => $new_language
            ], self::CREATED());
        } catch(Exception $exception) {
            return response()->json([
                'message' => "Alguma coisa correu mal: {$exception->getMessage()}"
            ], self::INTERNAL_SERVER_ERROR());
        }
    }

    public function update(
        LanguageRepositoryInterface $language,
        LanguageRequest $language_request,
        int $id
    )
    {
        try{
            $language->update(['language_name' => $language_request->language_name], $id);

            return response()->json([
                'message'  => 'Língua actualizada!'
            ], self::OK());
        } catch(Exception $exception) {
            return response()->json([
                'message' => "Alguma coisa correu mal: {$exception->getMessage()}"
            ], self::INTERNAL_SERVER_ERROR());
        }
    }

    public function show(LanguageRepositoryInterface $language, int $id)
    {
        $founded_language = $language->find($id);

        return response()->json([
            'message'  => $founded_language ? 'Língua encontrada!' : 'Língua não encontrada!',
            'language' => $founded_language
        ], $founded_language ? self::OK() : self::NOT_FOUND());
    }
}
