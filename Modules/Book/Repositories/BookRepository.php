<?php

namespace Modules\Book\Repositories;

use Modules\Book\Entities\Book;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BookRepository.
 */
class BookRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function __construct(Book $model)
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
            ->with('author')
            ->orderBy($orderBy, $sort)
            ->select('id','author_id','book_name','published_year','publisher', 'available_quantity')
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
