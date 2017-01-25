<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ApartamentoRepository;
use App\Entities\Apartamento;

/**
 * Class ApartamentoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ApartamentoRepositoryEloquent extends BaseRepository implements ApartamentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Apartamento::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
