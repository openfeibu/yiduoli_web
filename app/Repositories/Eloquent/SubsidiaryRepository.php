<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\SubsidiaryRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class SubsidiaryRepository extends BaseRepository implements SubsidiaryRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.subsidiary.subsidiary.search');
    }
    public function model()
    {
        return config('model.subsidiary.subsidiary.model');
    }
    public function getAll()
    {
        return $this->model
            ->orderBy('order','desc')
            ->orderBy('id','asc')
            ->get();
    }
}