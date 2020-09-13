<div class="account-content">
    <div class="account-layout">
        <div class="row">
            <div class="col-12">
                <div id="accordion" class="accordion">
                    @forelse($orders->sortByDesc('created_at') as $order)

                        <div class="card">
                        <div class="card-header" id="heading-{{$order->id}}">
                            <h6 class="mb-0">
                                <a data-toggle="collapse" href="#collapse-{{$order->id}}" aria-expanded="true" aria-controls="collapse-{{$order->id}}">
                                    {{ $order->created_at }}
                                    <span>
                                        @include('admin.status_label', ['status' => $order->status])
                                    </span>
                                </a>
                            </h6>
                        </div>
                        
                        <div id="collapse-{{$order->id}}" class="collapse {{$loop->index == 0 ? 'show' : ''}}" aria-labelledby="heading-{{$order->id}}" data-parent="#accordion">
                            
                            <div class="card-body">
                                @include('public.customers.account.orders.view', ['order' => $order])
                            </div>
                        </div>
                        </div>
                    @empty
                        <p>No orders</p>
                    @endforelse                
                </div>
            </div>
        </div>
    </div>
</div>
