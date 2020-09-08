<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Webkul\Admin\Http\Controllers\Sales\ShipmentController as WebkulShipmentController;

class ShipmentController extends WebkulShipmentController{
  
  public function store(Request $request, $orderId)
    {
      $order = $this->order->findOrFail($orderId);

      if (! $order->canShip()) {
        session()->flash('error', trans('admin::app.sales.shipments.order-error'));

        return redirect()->back();
      }

      $this->validate(request(), [
        'shipment.carrier_title' => 'required',
        'shipment.track_number' => 'required',
        'shipment.source' => 'required',
        'shipment.items.*.*' => 'required|numeric|min:0',
      ]);

      $data = request()->all();
      if (! $this->isInventoryValidate($data)) {
        session()->flash('error', trans('admin::app.sales.shipments.quantity-invalid'));

        return redirect()->back();
      }

      $this->shipment->create(array_merge($data, ['order_id' => $orderId]));
      $order->update(['status' => 'in_deliver']);
      session()->flash('success', trans('admin::app.response.create-success', ['name' => 'Shipment']));
      return redirect()->back();
      // return redirect()->route($this->_config['redirect'], $orderId);
    }
    
    /**
     * Checks if requested quantity available or not
     *
     * @param array $data
     * @return boolean
     */
    public function isInventoryValidate(&$data)
    {
      $valid = false;

      if (! isset($data['shipment']['items']))
        return ;

      foreach ($data['shipment']['items'] as $itemId => $inventorySource) {
        if ($qty = $inventorySource[$data['shipment']['source']]) {
          $orderItem = $this->orderItem->find($itemId);

          $product = ($orderItem->type == 'configurable')
            ? $orderItem->child->product
            : $orderItem->product;

          $availableQty = $product->inventories()
            ->where('inventory_source_id', $data['shipment']['source'])
            ->sum('qty');
          if ($availableQty < $qty) {
            return false;
          }

          $valid = true;
        } else {
          unset($data['shipment']['items'][$itemId]);
        }
      }

      return $valid;
    }
}

