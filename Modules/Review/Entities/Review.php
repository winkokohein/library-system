<?php

namespace Modules\Review\Entities;

use Modules\Customer\Entities\Customer;
use Modules\Book\Entities\Book;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use SoftDeletes;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reviews';

    protected $fillable = ["id", "customer_id", "book_id", "rating", "review"];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }

       /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        // if(auth()->user()->can('admin.access.review.view')){
        //     return '<a href="'.route('admin.review.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info btn-sm"><i class="fas fa-search"></i>&nbsp;View</a>';
        // }
        return '';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        // if(auth()->user()->can('admin.access.review.edit')){
        //     return '<a href="'.route('admin.review.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>&nbsp;Edit</a>';
        // }
        return '';
    }

     /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (auth()->user()->can('admin.access.review.delete')) {
            return '<a href="'.route('admin.review.destroy', $this).'" data-method="delete"
                 data-trans-button-cancel="'.__('buttons.general.cancel').'"
                 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                 data-trans-title="'.__('strings.backend.general.are_you_sure').'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'" class="btn btn-danger btn-sm"><i class="fas fa-trash" style="color: #fff;"></i>&nbsp;<span style="color: #fff;">Delete</span></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
            return $this->getShowButtonAttribute().' '.$this->getEditButtonAttribute().' '.$this->getDeleteButtonAttribute();
    }
}
