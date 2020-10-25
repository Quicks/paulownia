@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.orders.show.title')
@endsection

@section('content')
  <div class="invoice-wrapper">
    <div class="row">
        <div class="col-sm-3">
            <div class="dummy-logo">
                Your Company Logo
            </div>
            <address class="invoice-address">
                Loyola University Medical Center
                <br>
                2160 South 1st Avenue
                <br>
                Maywood, IL 60153
            </address>
        </div>
        <div class="col-sm-9 float-right text-right">
            <h4 class="invoice-title">@lang('admin.orders.show.title')</h4>
            No. <b>#{{$order->id}}</b>
            <div class="divider"></div>
            <div class="invoice-date mrg20B">{{$order->created_at}}</div>
            <div class="tab-content nav-responsive nav nav-tabs" id="nav-tabContent">
                <ul class="nav-responsive nav nav-tabs pull-right">
                    @if ($order->canInvoice() && $order->status == 'pending')
                        <li class=''>
                            <a href="#invoice"
                            data-href="{{ route('admin.sales.shipments.store', $order->id) }}"
                            data-toggle="pill" 
                            class="btn btn-alt btn-hover btn-info" 
                            id='create-invoice'
                            role="tab"
                            aria-controls="invoice"
                            aria-selected="true"
                            >
                                <span>@lang('admin.orders.show.btns.send_invoice')</span>
                            </a>
                            
                        </li>
                    @endif
                    @if($order->status == 'processing')
                        <li class=''>
                            <a href="#shipping"
                            data-href="{{ route('admin.sales.shipments.store', $order->id) }}"
                            data-toggle="pill" 
                            class="btn btn-alt btn-hover btn-info" 
                            id='create-shipment'
                            role="tab"
                            aria-controls="shipping"
                            aria-selected="true"
                            >
                                <span>@lang('admin.orders.show.btns.shipment')</span>
                            </a>
                            
                        </li>
                    @endif
                    @if($order->status == 'pending_payment')
                        <li>
                            <form method="POST" action="{{ route('orders.update', $order->id) }}" >
                                @csrf()
                                {{ method_field('PUT') }}
                                <input class="form-control col-sm-6 hidden" name="status" value="processing" hidden='true'>
                                <button type="submit" class="btn btn-alt btn-hover btn-success invoice-btn pull-right">
                                    <span>@lang('admin.orders.show.btns.payed')</span>
                                </button>
                            </form>
                        </li>
                    @endif
                    @if($order->status != 'canceled' && $order->status != 'completed')
                        <li>
                            <form method="POST" action="{{ route('orders.update', $order->id) }}" >
                                @csrf()
                                {{ method_field('PUT') }}
                                <input class="form-control col-sm-6 hidden" name="status" value="completed" hidden='true'>
                                <button type="submit" class="btn btn-alt btn-hover btn-success invoice-btn pull-right">
                                    <span>@lang('admin.orders.show.btns.completed')</span>
                                </button>
                            </form>
                        </li>
                    @endif
                    <li class=''>
                        @if ($order->canCancel())
                            <a href="{{ route('admin.sales.orders.cancel', $order->id) }}" class="btn btn-alt btn-hover btn-danger">
                                <span>@lang('admin.btns.cancel')</span>
                            </a>
                        @endif
                    </li>
                    <!-- <li class=''>
                        <a class="btn btn-alt btn-hover btn-info">
                            <span>@lang('admin.btns.print')</span>
                        </a>
                    </li> -->
                </ul>
            </div>            
        </div>
    </div>

    <div class="divider"></div>

    <div class="row form-horizontal">
        <div class="tab-content nav-responsive nav nav-tabs" id="nav-tabContent">
            <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping">
                <div class='row'>
                    @include('admin.orders.shipments.create', ['order' => $order])
                </div>
            </div>
            <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping">
                <div class='row'>
                    @include('admin.orders.shipments.create', ['order' => $order])
                </div>
            </div>
            <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice">
                <div class='row'>
                    @include('admin.orders.invoice.create', ['order' => $order])
                </div>
            </div>
            
        </div>
        <div class="col-md-3">
            <h2 class="invoice-client mrg10T">@lang('admin.orders.show.customer.title'):</h2>

            <ul class='reset-ul'>
                <li>@lang('admin.orders.show.customer.full_name'): {{$order->customer_first_name. ' ' .$order->customer_last_name}}</li>
                <li>@lang('admin.orders.show.customer.email'): {{$order->customer_email}}</li>
                <li>@lang('admin.orders.show.customer.id_number'): {{$address->id_number}}</li>
                <li>
                    <address class="invoice-address">
                        @lang('admin.orders.show.customer.address'): {{$address->address1}}
                        <br>
                        @lang('admin.orders.show.customer.city'): {{$address->city. ', '.$address->country. ' '. $address->postcode }}
                        <br>
                        @lang('admin.orders.show.customer.phone'): {{$address->phone}}
                    </address>
                </li>
            </ul>
    
        </div>
        <div class="col-md-3">
            <h2 class="invoice-client mrg10T">@lang('admin.orders.show.order_info.title'):</h2>
            <ul class="reset-ul">
                <li>@lang('admin.orders.index.table.order_date'): {{$order->created_at->format('F d Y')}}</li>
                <li>
                    @lang('admin.orders.index.table.status'): 
                    <span>
                        @include('admin.status_label', ['status' => $order->status])
                        
                    </span>
                </li>
                <li>Id: #{{$order->id}}</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h2 class="invoice-client mrg10T">@lang('admin.orders.show.payment_and_shipment.title'):</h2>
            <ul class="reset-ul">
                <li>@lang('admin.orders.show.payment_and_shipment.payment_type'): {{core()->getConfigData('sales.paymentmethods.' . $order->payment->method . '.title')}}</li>
                <li>@lang('admin.orders.show.payment_and_shipment.payment_currency'): {{$order->order_currency_code}}</li>
                <li>@lang('admin.orders.show.payment_and_shipment.shiping_method'): {{$order->shipping_title}}</li>
                <li>@lang('admin.orders.show.payment_and_shipment.shiping_price'): {{core()->formatBasePrice($order->base_shipping_amount)}}</li>
                @if(!empty($order->shipments->first()))
                    <?php $shipment = $order->shipments->first() ?>
                    <li>@lang('admin.orders.show.shipments.carrier_title'): {{$shipment->carrier_title}}</li>
                    <li>@lang('admin.orders.show.shipments.track_number'): {{$shipment->track_number}}</li>
                @endif
            </ul>
        </div>
    </div>

    <table class="table mrg20T table-hover">
        <thead>
            <tr>
                <th>SKU</th>
                <th>@lang('admin.orders.show.table.headers.name')</th>
                <th>@lang('admin.orders.show.table.headers.price')</th>
                <th>@lang('admin.orders.show.table.headers.status')</th>
                <th>@lang('admin.orders.show.table.headers.sub_total')</th>
                <th>@lang('admin.orders.show.table.headers.tax_percent')</th>
                <th>@lang('admin.orders.show.table.headers.tax_amount')</th>
                <th>@lang('admin.orders.show.table.headers.grand_total')</th>
                </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>
                        {{ $item->sku }}
                    </td>

                    <td>
                        {{ $item->name }}

                        @if ($html = $item->getOptionDetailHtml())
                            <p>{{ $html }}</p>
                        @endif
                    </td>

                    <td>{{ core()->formatBasePrice($item->base_price) }}</td>
                    
                    <td>
                        <span class="qty-row">
                            {{ $item->qty_ordered ? __('admin::app.sales.orders.item-ordered', ['qty_ordered' => $item->qty_ordered]) : '' }}
                        </span>

                        <span class="qty-row">
                            {{ $item->qty_invoiced ? __('admin::app.sales.orders.item-invoice', ['qty_invoiced' => $item->qty_invoiced]) : '' }}
                        </span>

                        <span class="qty-row">
                            {{ $item->qty_shipped ? __('admin::app.sales.orders.item-shipped', ['qty_shipped' => $item->qty_shipped]) : '' }}
                        </span>

                        <span class="qty-row">
                            {{ $item->qty_canceled ? __('admin::app.sales.orders.item-canceled', ['qty_canceled' => $item->qty_canceled]) : '' }}
                        </span>
                    </td>

                    <td>{{ core()->formatBasePrice($item->base_total) }}</td>

                    <td>{{ $item->tax_percent }}%</td>

                    <td>{{ core()->formatBasePrice($item->base_tax_amount) }}</td>

                    @if ($order->base_discount_amount > 0)
                        <td>{{ core()->formatBasePrice($item->base_discount_amount) }}</td>
                    @endif

                    <td>{{ core()->formatBasePrice($item->base_total + $item->base_tax_amount - $item->base_discount_amount) }}</td>
                </tr>
            @endforeach

            <tr class="font-bold font-black">
                <td colspan="7" class="text-right">@lang('admin.orders.show.table.total.sub_total')</td>
                <td colspan="7" >{{ core()->formatBasePrice($order->base_sub_total) }}</td>
            </tr class="font-bold font-black">

            <tr class="font-bold font-black">
                <td colspan="7" class="text-right">@lang('admin.orders.show.table.total.shipping_amount')</td>
                <td colspan="7">{{ core()->formatBasePrice($order->base_shipping_amount) }}</td>
            </tr>

            @if ($order->base_discount_amount > 0)
                <tr class="font-bold font-black">
                    <td colspan="7" class="text-right">@lang('admin.orders.show.table.total.discount_amount')</td>
                    <td colspan="7" class="font-red">-{{ core()->formatBasePrice($order->base_discount_amount) }}</td>
                </tr>
            @endif
            <tr class="font-bold font-black">
                <td colspan="7" class="text-right">@lang('admin.orders.show.table.total.tax')</td>
                <td colspan="7">{{ core()->formatBasePrice($order->base_tax_amount) }}</td>
            </tr>

            <tr class="font-bold font-black">
                <td colspan="7" class="text-right">@lang('admin.orders.show.table.total.grand_total')</td>
                <td colspan="7">{{ core()->formatBasePrice($order->base_grand_total) }}</td>
            </tr>

            <tr class="font-bold font-black">
                <td colspan="7" class="text-right">@lang('admin.orders.show.table.total.total_invoiced')</td>
                <td colspan="7">
                    {{ core()->formatBasePrice($order->grand_total_invoiced) }}
                </td>
            </tr>
            @if($order->status != 'pending_payment' && $order->status != 'pending')
                <tr class="font-bold font-black">
                    <td colspan="7" class="text-right">@lang('admin.orders.show.table.total.total_payed')</td>
                    <td colspan="7">
                        {{ core()->formatBasePrice($order->grand_total_invoiced) }}
                    </td>
                </tr>
            @endif
<!--    
            <tr class="font-bold font-black">
                <td colspan="7" class="text-right">@lang('admin.orders.show.table.total.total_paid')</td>
                <td colspan="7">{{ core()->formatBasePrice($order->grand_total_invoiced) }}</td>
            </tr> -->

            <!-- <tr class="font-bold font-black">
                <td colspan="7" class="text-right">@lang('admin.orders.show.table.total.total_refunded')</td>
                <td colspan="7">{{ core()->formatBasePrice($order->base_grand_total_refunded) }}</td>
            </tr> -->

            <tr class="font-bold font-black">
                <td colspan="7" class="text-right">@lang('admin.orders.show.table.total.total_due')</td>
                <td colspan="7" class="font-blue font-size-23">
                    @if($order->status == 'pending_payment')
                        {{ core()->formatBasePrice($order->grand_total_invoiced) }}
                    @elseif($order->status == 'pending')
                        {{ core()->formatBasePrice($order->grand_total) }}
                    @else
                        {{ core()->formatBasePrice(0.00) }}
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('#create-shipment').click(function(){
            
        })
    })
</script>
@endpush