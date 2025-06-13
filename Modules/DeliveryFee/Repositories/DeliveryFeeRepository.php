<?php

namespace Modules\DeliveryFee\Repositories;

use Modules\DeliveryFee\Entities\DeliveryFee;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DeliveryFeeRepository.
 */
class DeliveryFeeRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function __construct(DeliveryFee $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($orderBy = 'created_at', $sort = 'desc')
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->get();
    }

    public function getAllForApi($orderBy = 'created_at', $sort = 'desc')
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->select('city_id','township_id','amount')
            ->get();
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->model
            ->select('*');
    }
}
