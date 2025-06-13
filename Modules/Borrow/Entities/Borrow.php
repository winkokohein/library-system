<?php

namespace Modules\Borrow\Entities;
use Modules\Borrow\Entities\BorrowItem;
use Modules\Customer\Entities\Customer;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use SoftDeletes;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'borrows';

    protected $fillable = [
                            "id",
                            "customer_id",
                            "borrow_date",
                            "due_date",
                            "used_delivery",
                            "delivery_township_id",
                            "delivery_fee",
                            "payment_status",
                            "notes",
                        ];



        public function borrowItem() {
            return $this->hasMany(BorrowItem::class);
        }

        public function customer() {
            return $this->belongsTo(Customer::class);
        }

       /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        if(auth()->user()->can('admin.access.borrow.view')){
            return '<a href="'.route('admin.borrow.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info btn-sm"><i class="fas fa-search"></i>&nbsp;View</a>';
        }
        return '';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        // if(auth()->user()->can('admin.access.borrow.edit')){
        //     return '<a href="'.route('admin.borrow.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>&nbsp;Edit</a>';
        // }
        return '';
    }

     /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (auth()->user()->can('admin.access.borrow.delete')) {
            return '<a href="'.route('admin.borrow.destroy', $this).'" data-method="delete"
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
