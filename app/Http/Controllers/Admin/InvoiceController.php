<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Webkul\Admin\Http\Controllers\Sales\InvoiceController as WebkulInvoiceController;

class InvoiceController extends WebkulInvoiceController{

  public function store(Request $request, $orderId)
    {
        $order = $this->order->findOrFail($orderId);

        if (! $order->canInvoice()) {
            session()->flash('error', trans('admin::app.sales.invoices.creation-error'));

            return redirect()->back();
        }

        $this->validate(request(), [
            'invoice.items.*' => 'required|numeric|min:0',
        ]);

        $data = request()->all();

        $haveProductToInvoice = false;
        foreach ($data['invoice']['items'] as $itemId => $qty) {
            if ($qty) {
                $haveProductToInvoice = true;
                break;
            }
        }

        if (! $haveProductToInvoice) {
            session()->flash('error', trans('admin::app.sales.invoices.product-error'));

            return redirect()->back();
        }

        $this->invoice->create(array_merge($data, ['order_id' => $orderId]));
        $order->status = 'pending_payment';
        $order->save();
        session()->flash('success', trans('admin::app.response.create-success', ['name' => 'Invoice']));

        return redirect()->route($this->_config['redirect'], $orderId);
    }
}