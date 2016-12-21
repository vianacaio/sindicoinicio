<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MyModelRepository;
use App\Entities\MyModel;
use App\Validators\MyModelValidator;

/**
 * Class MyModelRepositoryEloquent
 * @package namespace App\Repositories;
 */
class MyModelRepositoryEloquent extends BaseRepository implements MyModelRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MyModel::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
