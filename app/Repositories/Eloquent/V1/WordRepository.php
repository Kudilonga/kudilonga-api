<?php

namespace App\Repositories\Eloquent\V1;

use App\Http\Requests\V1\Word\WordCreateRequest;
use Exception;
use App\Models\Word;
use App\Models\Example;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Eloquent\AbstractRepository;
use App\Repositories\Contracts\V1\WordRepositoryInterface;

class WordRepository extends AbstractRepository implements WordRepositoryInterface
{
    protected $model = Word::class;

    public function all()
    {
        return $this->model::with(['language'])->get();
    }

    public function find(int $id)
    {
        return $this->model::with(['language'])->whereId($id)->first();
    }

    public function store(WordCreateRequest $data)
    {
        DB::beginTransaction();
        try{
            $word1 = $this->model::create([
                'description'  => $data->word1['description'],
                'abbreviation' => $data->word1['abbreviation'],
                'spelling'     => $data->word1['spelling'],
                'language_id'  => $data->word1['language_id'],
            ]);

            Example::create([
                'description' => $data->word1['example'],
                'word_id'     => $word1->id
            ]);

            $word2 = $this->model::create([
                'description'  => $data->word2['description'],
                'abbreviation' => $data->word2['abbreviation'],
                'spelling'     => $data->word2['spelling'],
                'language_id'  => $data->word2['language_id'],
            ]);

            Example::create([
                'description' => $data->word2['example'],
                'word_id'     => $word2->id
            ]);

            Translation::create([
                'word1_id' => $word1->id,
                'word2_id' => $word2->id,
            ]);

            DB::commit();
            return true;
        } catch(Exception $exception) {
            DB::rollback();
            throw new Exception($exception->getMessage());
        }
    }

    public function getWordsByLanguageId(int $id)
    {
        return $this->model::with(['language'])->whereLanguageId($id)->get();
    }
}
