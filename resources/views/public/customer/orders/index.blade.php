@extends('layouts.public')
@section('content')

    <div class="account-content pb-5">
        @include('public.customer.profile-header', ['activeItem' => 'orders'])
        <div class="pos-profile mr-5">
            @if(!empty($orders))
                @foreach($orders as $order)
                    <table class="col-12 mb-3 profile-order-background table" width="100%" cellspacing="0"
                           cellpadding="20">
                        <tbody>
                        <tr>
                            <td width="20%" align="center">{{core()->formatDate($order->created_at, 'd.m.Y')}}</td>
                            <td width="20%" align="center" class="order-status">{{$order->status}}</td>
                            <td width="20%"
                                align="center">{{core()->formatPrice($order->grand_total, $order->order_currency_code) }}</td>
                            <td width="20%" align="center">
                                <a href="{{route('orders.view', $order->id)}}" class="order-view">
                                    <span><i class="fa fa-eye fa-2x" aria-hidden="true"></i></span>
                                </a>
                            </td>
                            @if($order->invoices->count())
                                <td width="20%">
                                    @foreach($order->invoices as $invoice)
                                        <div class="mt-1">
                                            <a href="{{ route('customer.orders.print', $invoice->id) }}" class="product-button">
                                                @lang('profile.print')
                                            </a>
                                        </div>
                                    @endforeach
                                </td>

                            @else
                                <td width="20%"></td>
                            @endif
                        </tr>
                        </tbody>
                    </table>
                @endforeach
            @endif
        </div>
    </div>

@endsection