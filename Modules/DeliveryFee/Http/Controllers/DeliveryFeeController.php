<?php

namespace Modules\DeliveryFee\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\DeliveryFee\Entities\DeliveryFee;
use Modules\DeliveryFee\Http\Requests\ManageDeliveryFeeRequest;
use Modules\DeliveryFee\Http\Requests\CreateDeliveryFeeRequest;
use Modules\DeliveryFee\Http\Requests\UpdateDeliveryFeeRequest;
use Modules\DeliveryFee\Http\Requests\ShowDeliveryFeeRequest;
use Modules\DeliveryFee\Repositories\DeliveryFeeRepository;
use Modules\Township\Entities\Township;

class DeliveryFeeController extends Controller
{
 /**
     * @var DeliveryFeeRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageDeliveryFeeRequest $request)
    {
        return view('deliveryfee::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageDeliveryFeeRequest $request)
    {
        $townships = Township::all();
        return view('deliveryfee::create')->with('townships', $townships);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateDeliveryFeeRequest $request)
    {
        $data = $request->except('_token','_method');
        $data['city_id'] = 1;
        $this->deliveryfee->create($data);
        return redirect()->route('admin.deliveryfee.index')->withFlashSuccess(trans('deliveryfee::alerts.backend.deliveryfee.created'));
    }

    /**
     * @param DeliveryFee              $deliveryfee
     * @param ManageDeliveryFeeRequest $request
     *
     * @return mixed
     */
    public function edit(DeliveryFee $deliveryfee, ManageDeliveryFeeRequest $request)
    {
        $townships = Township::all();
        return view('deliveryfee::edit')
            ->with([
                'deliveryFee' => $deliveryfee,
                'townships' => $townships,
            ]);
    }

    /**
     * @param DeliveryFee              $deliveryfee
     * @param UpdateDeliveryFeeRequest $request
     *
     * @return mixed
     */
    public function update(DeliveryFee $deliveryfee, UpdateDeliveryFeeRequest $request)
    {
        $this->deliveryfee->updateById($deliveryfee->id,$request->except('_token','_method'));

        return redirect()->route('admin.deliveryfee.index')->withFlashSuccess(trans('deliveryfee::alerts.backend.deliveryfee.updated'));
    }

    /**
     * @param DeliveryFee              $deliveryfee
     * @param ManageDeliveryFeeRequest $request
     *
     * @return mixed
     */
    public function show(DeliveryFee $deliveryfee, ShowDeliveryFeeRequest $request)
    {
        return view('deliveryfee::show')->withDeliveryFee($deliveryfee);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(DeliveryFee $deliveryfee)
    {
        $this->deliveryfee->deleteById($deliveryfee->id);

        return redirect()->route('admin.deliveryfee.index')->withFlashSuccess(trans('deliveryfee::alerts.backend.deliveryfee.deleted'));
    }
}
