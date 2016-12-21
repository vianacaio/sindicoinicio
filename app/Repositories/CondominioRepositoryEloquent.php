<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CondominioRepository;
use App\Entities\Condominio;
use App\Validators\CondominioValidator;

/**
 * Class CondominioRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CondominioRepositoryEloquent extends BaseRepository implements CondominioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Condominio::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
