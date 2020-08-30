<form method="POST" action="{{ route('admin.invoices.store', $order->id) }}" >
  @csrf()
  @foreach ($order->items as $item)
    <div class="form-group">

      <label for="publish_date" class="control-label col-sm-3">
        {{$item->name}}
      </label>
      <input class="form-control col-sm-6" name="invoice[items][{{$item->id}}]" value="{{ $item->qty_to_invoice }}">
    </div>
  @endforeach
  <button type="submit" class="btn btn-alt btn-hover btn-warning invoice-btn pull-right">
    <span>@lang('admin.orders.show.btns.send_invoice')</span>
  </button>
</form>