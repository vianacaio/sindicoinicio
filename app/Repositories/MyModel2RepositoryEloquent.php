<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MyModel2Repository;
use App\Entities\MyModel2;
use App\Validators\MyModel2Validator;

/**
 * Class MyModel2RepositoryEloquent
 * @package namespace App\Repositories;
 */
class MyModel2RepositoryEloquent extends BaseRepository implements MyModel2Repository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MyModel2::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
