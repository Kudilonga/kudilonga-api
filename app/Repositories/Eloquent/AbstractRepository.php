<?php

namespace App\Repositories\Eloquent;

use Exception;
use Illuminate\Support\Facades\DB;

abstract class AbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    public function resolveModel()
    {
        return app($this->model);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $fields)
    {
        DB::beginTransaction();
        try{
            $new_record = $this->model->create($fields);

            DB::commit();
            return $new_record;
        } catch(Exception $exception) {
            DB::rollback();
            throw new Exception($exception->getMessage());
        }
    }

    public function update(array $fields, int $id)
    {
        DB::beginTransaction();
        try{
            $record         = $this->find($id);
            $updated_record = $record->update($fields);

            DB::commit();
            return $updated_record;
        } catch(Exception $exception) {
            DB::rollback();
            throw new Exception($exception->getMessage());
        }
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }
}
