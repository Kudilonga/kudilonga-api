<?php

namespace App\Http\Controllers\V1;

use Exception;
use App\{
    Http\Controllers\Controller,
    Http\Requests\V1\Word\WordCreateRequest,
    Repositories\Contracts\V1\WordRepositoryInterface
};

class WordController extends Controller
{
    public function index(WordRepositoryInterface $word)
    {
        $words = $word->all();

        return response()->json([
            'message' => 'Todas as palavras!',
            'words'   => $words ? $this->wordListSerializer($words) : []
        ], self::OK());
    }

    public function getWordsByLanguageId(WordRepositoryInterface $word, int $id)
    {
        $words = $this->wordListSerializer($word->getWordsByLanguageId($id));

        return response()->json([
            'message' => 'Todas as palavras' . ($words ? ' em ' . $words[0]['language'] : ' nesta língua') . '!',
            'words'   => $words ? $words : []
        ], self::OK());
    }

    public function store(WordRepositoryInterface $word, WordCreateRequest $request)
    {
        try{
            $word->store($request);

            return response()->json([
                'message'  => 'Palavras adicionadas!'
            ], self::CREATED());
        } catch(Exception $exception) {
            return response()->json([
                'message' => "Alguma coisa correu mal: {$exception->getMessage()}"
            ], self::INTERNAL_SERVER_ERROR());
        }
    }

    public function show(WordRepositoryInterface $word, int $id)
    {
        $founded_word = $word->find($id);

        return response()->json([
            'message'  => $founded_word ? 'Palavra encontrada!' : 'Palavra não encontrada!',
            'word'     => $founded_word ? $this->wordSerializer($founded_word) : null
        ], $founded_word ? self::OK() : self::NOT_FOUND());
    }

    private function wordListSerializer($data)
    {
        $words = [];

        foreach($data as $index => $word)
        {
            $words[$index] = array(
                "id"           => $word->id,
                "description"  => $word->description,
                "abbreviation" => $word->abbreviation,
                "spelling"     => $word->spelling,
                "language"     => $word->language->language_name
            );
        }

        return $words;
    }

    private function wordSerializer($data)
    {
        $word = array(
            "id"           => $data->id,
            "description"  => $data->description,
            "abbreviation" => $data->abbreviation,
            "spelling"     => $data->spelling,
            "language"     => $data->language->language_name,
        );

        return $word;
    }
}
