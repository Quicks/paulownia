<div>
  <form method="POST" action="{{ route('admin.shipments.store', $order->id) }}">
    @csrf()
    <div class="form-group">
      <label for="publish_date" class="control-label col-sm-3">
        @lang('admin.orders.show.shipments.carrier_title')
      </label>
      <input class="form-control col-sm-6" name="shipment[carrier_title]" type="text" required>
    </div>
    <div class="form-group">
      <label for="publish_date" class="control-label col-sm-3">
        @lang('admin.orders.show.shipments.track_number')
      </label>
      <input class="form-control col-sm-6" name="shipment[track_number]" type="text" required>
    </div>
    @foreach ($order->items as $item)
      <input type="text" class="control hidden" name='{{ "shipment[items][$item->id][1]" }}' value="{{$item->qty_invoiced}}" />
    @endforeach
    <input type="text" class="control hidden" name='{{ "shipment[source]" }}' value="1" />
    <button type="submit" class="btn btn-alt btn-hover btn-warning invoice-btn pull-right">
      <span>@lang('admin.orders.show.btns.send_shipment')</span>
    </button>
  </form>
</div>   
