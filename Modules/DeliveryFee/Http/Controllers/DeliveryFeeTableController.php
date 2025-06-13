<?php

namespace Modules\DeliveryFee\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\DeliveryFee\Repositories\DeliveryFeeRepository;
use Modules\DeliveryFee\Http\Requests\ManageDeliveryFeeRequest;

class DeliveryFeeTableController extends Controller
{
    /**
     * @var DeliveryFeeRepository
     */
    protected $deliveryfee;

    /**
     * @param DeliveryFeeRepository $deliveryfee
     */
    public function __construct(DeliveryFeeRepository $deliveryfee)
    {
        $this->deliveryfee = $deliveryfee;
    }

    /**
     * @param ManageDeliveryFeeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageDeliveryFeeRequest $request)
    {
        return DataTables::of($this->deliveryfee->getForDataTable())
            ->editColumn('township_id', function ($deliveryfee) {
                return $deliveryfee->township->name;
            })
            ->editColumn('updated_at', function ($deliveryfee) {
                return $deliveryfee->updated_at;
            })
            ->addColumn('actions', function ($deliveryfee) {
                return $deliveryfee->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
