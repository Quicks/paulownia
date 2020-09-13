<div class="account-content">
	<div class="row">
		<div class="col-12">
		<div class="row form-horizontal">
        <div class="col-md-4">
            <h5 class="invoice-client mrg10T">@lang('admin.orders.show.customer.title'):</h5>

            <ul class='reset-ul'>
                <li>@lang('admin.orders.show.customer.full_name'): {{$order->customer_first_name. ' ' .$order->customer_last_name}}</li>
                <li>@lang('admin.orders.show.customer.email'): {{$order->customer_email}}</li>
                <li>
									<address class="invoice-address">
											@lang('admin.orders.show.customer.address'): {{$order->getBillingAddressAttribute()->address1}}
											<br>
											@lang('admin.orders.show.customer.city'): {{$order->getBillingAddressAttribute()->city. ', '.$order->getBillingAddressAttribute()->country. ' '. $order->getBillingAddressAttribute()->postcode }}
											<br>
											@lang('admin.orders.show.customer.phone'): {{$order->getBillingAddressAttribute()->phone}}
									</address>
                </li>
            </ul>
    
        </div>
        <div class="col-md-4 disc_list">
            <h5 class="invoice-client mrg10T">@lang('admin.orders.show.order_info.title'):</h5>
            <ul class="reset-ul">
                <li>@lang('admin.orders.index.table.order_date'): {{$order->created_at->format('F d Y')}}</li>
                <li>
                    @lang('admin.orders.index.table.status'): 
                    <span>
											@include('admin.status_label', ['status' => $order->status])
                    </span>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <h5 class="invoice-client mrg10T">@lang('admin.orders.show.payment_and_shipment.title'):</h5>
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
		<div class="heading_s2">
			<h5>@lang('checkout.label.your_orders')</h5>
		</div>
		<div class="table-responsive order_table">

			<table class="table table-bordered">
			<thead>
				<tr>
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
				@foreach($order->items as $item)
				<tr>

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
			</tbody>
			<tfoot>
				<tr class="font-bold font-black">
					<td colspan="6" class="text-right">@lang('admin.orders.show.table.total.sub_total')</td>
					<td colspan="6" >{{ core()->formatBasePrice($order->base_sub_total) }}</td>
				</tr class="font-bold font-black">

				<tr class="font-bold font-black">
					<td colspan="6" class="text-right">@lang('admin.orders.show.table.total.shipping_amount')</td>
					<td colspan="6">{{ core()->formatBasePrice($order->base_shipping_amount) }}</td>
				</tr>

				@if ($order->base_discount_amount > 0)
					<tr class="font-bold font-black">
						<td colspan="6" class="text-right">@lang('admin.orders.show.table.total.discount_amount')</td>
						<td colspan="6" class="font-red">-{{ core()->formatBasePrice($order->base_discount_amount) }}</td>
					</tr>
				@endif
				<tr class="font-bold font-black">
					<td colspan="6" class="text-right">@lang('admin.orders.show.table.total.tax')</td>
					<td colspan="6">{{ core()->formatBasePrice($order->base_tax_amount) }}</td>
				</tr>

				<tr class="font-bold font-black">
					<td colspan="6" class="text-right">@lang('admin.orders.show.table.total.grand_total')</td>
					<td colspan="6">{{ core()->formatBasePrice($order->base_grand_total) }}</td>
				</tr>

				<tr class="font-bold font-black">
					<td colspan="6" class="text-right">@lang('admin.orders.show.table.total.total_invoiced')</td>
					<td colspan="6">
							{{ core()->formatBasePrice($order->grand_total_invoiced) }}
					</td>
				</tr>
				@if($order->status != 'pending_payment' && $order->status != 'pending')
					<tr class="font-bold font-black">
						<td colspan="6" class="text-right">@lang('admin.orders.show.table.total.total_payed')</td>
						<td colspan="6">
								{{ core()->formatBasePrice($order->grand_total_invoiced) }}
						</td>
					</tr>
				@endif
	
				<tr class="font-bold font-black">
					<td colspan="6" class="text-right">@lang('admin.orders.show.table.total.total_due')</td>
					<td colspan="6" class="font-blue font-size-23">
							@if($order->status == 'pending_payment')
									{{ core()->formatBasePrice($order->grand_total_invoiced) }}
							@elseif($order->status == 'pending')
									{{ core()->formatBasePrice($order->grand_total) }}
							@else
									{{ core()->formatBasePrice(0.00) }}
							@endif
					</td>
				</tr>
			</tfoot>
			</table>
		</div>
		</div>
	</div>
</div>
