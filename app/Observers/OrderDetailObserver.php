<?php

namespace App\Observers;

use App\Exceptions\OutOfQuantityException;
use App\OrderDetail;

class OrderDetailObserver
{
    /**
     * Handle the order detail "creating" event.
     *
     * @param  \App\OrderDetail  $orderDetail
     * @return void
     */
    public function creating(OrderDetail $orderDetail)
    {
        if ($orderDetail->medicine->quantity < $orderDetail->quantity) {
            throw new OutOfQuantityException(trans('errors.out_of_quantity', [
                'name' => $orderDetail->medicine->name,
                'quantity' => $orderDetail->medicine->quantity,
            ]));
        }

        $medicine = $orderDetail->medicine;
        $order = $orderDetail->order;

        //decrease medicine's quantity
        $medicine->update([
            'quantity' => $medicine->quantity - $orderDetail->quantity,
        ]);

        //update total
        $orderDetailTotal = $medicine->price * $orderDetail->quantity;
        $orderDetail->total = $orderDetailTotal;

        //update order's total
        $order->update([
            'total' => $order->total + $orderDetailTotal,
        ]);
    }

    /**
     * Handle the order detail "updated" event.
     *
     * @param  \App\OrderDetail  $orderDetail
     * @return void
     */
    public function updated(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Handle the order detail "deleted" event.
     *
     * @param  \App\OrderDetail  $orderDetail
     * @return void
     */
    public function deleted(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Handle the order detail "restored" event.
     *
     * @param  \App\OrderDetail  $orderDetail
     * @return void
     */
    public function restored(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Handle the order detail "force deleted" event.
     *
     * @param  \App\OrderDetail  $orderDetail
     * @return void
     */
    public function forceDeleted(OrderDetail $orderDetail)
    {
        //
    }
}
