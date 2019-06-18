<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\OutOfQuantityException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Medicine;
use App\Order;
use App\Prescription;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request)
    {
        $prescription_id = $request->prescription_id;
        $orderDetails = $request->orderDetails;
        $prescription = Prescription::find($prescription_id);

        DB::beginTransaction();
        try {
            $this->isMedicineOutOfQuantity($orderDetails);
            $order = $prescription->order()->create();

            foreach ($orderDetails as $orderDetail) {
                $order->orderDetails()->create([
                    'medicine_id' => $orderDetail['id'],
                    'quantity' => $orderDetail['quantity'],
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with([
                'type' => 'error',
                'msg' => $e->getMessage(),
            ]);
        }

        return back();
    }

    public function isMedicineOutOfQuantity($orderDetails)
    {
        foreach ($orderDetails as $orderDetail) {
            $medicine = Medicine::find($orderDetail['id'])->first();

            if ($medicine->quantity < $orderDetail['quantity']) {
                throw new OutOfQuantityException(trans('errors.out_of_quantity', [
                    'name' => $medicine->name,
                    'quantity' => $medicine->quantity,
                ]));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
