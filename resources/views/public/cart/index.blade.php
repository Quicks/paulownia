@extends('layouts.public')
@section('content')
	<section>
		@if(!empty($cart))
			<div class="container">
        <div class="row">
        	<div class="col-12">    
						<div class="table-responsive shop_cart_table">
								<table class="table">
										<thead>
											<tr>
												<th class="product-thumbnail">&nbsp;</th>
												<th class="product-name">Product</th>
												<th class="product-price">Price</th>
												<th class="product-quantity">Quantity</th>
												<th class="product-subtotal">Total</th>
												<th class="product-remove">Remove</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($cart->items as $item)
												<tr>
													<td class="product-thumbnail"><a href="#"><img src="/storage/1.jpg" alt="product1"></a></td>
														<td class="product-name" data-title="Product"><a href="#">{{$item->product_flat->name}}</a></td>
														<td class="product-price" data-title="Price">{{number_format($item->price, 2)}} {{$currency}}</td>
														<td class="product-quantity" data-title="Quantity"><div class="quantity">
														<input type="button" value="-" class="minus">
														<input type="text" name="quantity" value="{{$item->quantity}}" title="Qty" class="qty" size="4">
														<input type="button" value="+" class="plus">
													</div></td>
														<td class="product-subtotal" data-title="Total">{{number_format($item->total, 2)}} {{$currency}}</td>
														<td class="product-remove" data-title="Remove"><a href="#"><i class="ti-close"></i></a></td>
													</tr>
											@endforeach
										</tbody>
										<tfoot>
											<tr>
												<td colspan="6" class="px-0">
													<div class="row no-gutters align-items-center">
														<div class="col-lg-4 col-md-6 mb-3 mb-md-0">
															<div class="coupon field_form input-group">
																<input type="text" value="" class="form-control" placeholder="Enter Coupon Code..">
																<div class="input-group-append">
																	<button class="btn btn-default btn-sm" type="submit">Apply Coupon</button>
																</div>
															</div>
														</div>
															<div class="col-lg-8 col-md-6 text-left text-md-right">
																<button class="btn btn-dark btn-sm" type="submit">Update Cart</button>
																<a href=href="{{route('check-out.index')}}" class="btn btn-default btn-sm">Proceed to Checkout</a>
															</div>
														</div>
													</td>
												</tr>
										</tfoot>
								</table>
							</div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="small_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
            	<div class="heading_s2">
            		<h5>Calculate Shipping</h5>
                </div>
                <form class="field_form shipping_calculator">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="custom_select">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input required="required" placeholder="State / Country" class="form-control" name="name" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <input required="required" placeholder="PostCode / ZIP" class="form-control" name="name" type="text">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button class="btn btn-outline-black" type="submit">Update Totals</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
            	<div class="heading_s2">
            		<h5>Cart Totals</h5>
                </div>
                <div class="table-responsive">
                	<table class="table">
										<tbody>
												<tr>
                            <td class="cart_total_label">Cart Subtotal</td>
                            <td class="cart_total_amount">{{number_format($cart->sub_total, 2)}} {{$currency}}</td>
                        </tr>
                        <tr>
                            <td class="cart_total_label">VAT</td>
                            <td class="cart_total_amount">{{number_format($cart->tax_total, 2)}} {{$currency}}</td>
                        </tr>
                        <tr>
														<td class="cart_total_label">Total</td>
                            <td class="cart_total_amount"><strong>{{number_format($cart->grand_total, 2)}} {{$currency}}</strong></td>
                        </tr>
										</tbody>
									</table>
                </div>
            </div>
        </div>
			</div>
		@endif
		
	</section>
@endsection