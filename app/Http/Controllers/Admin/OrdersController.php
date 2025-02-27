<?php

namespace App\Http\Controllers\Admin;

use Webkul\Admin\Http\Controllers\Sales\OrderController;
use Webkul\Admin\DataGrids\OrderDataGrid;
use Illuminate\Http\Request;

class OrdersController extends OrderController{

  public function index(){
    $perPage = 25;
    $dg = new OrderDataGrid;
    $dg->prepareQueryBuilder();
    $orders = $dg->getCollection();
    return view('admin.orders.index', compact('orders'));
  }

  public function show($order){
    $address = $order->addresses->sortBy('address_type')->first();
    return view('admin.orders.show', compact('order', 'address'));
  }

  public function update($order, Request $request){
    $order->update($request->all());
    return redirect()->back();
  }
}