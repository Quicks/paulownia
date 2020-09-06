@if($status == 'processing')
    <span class="bs-label badge-primary">Processing</span>
@elseif ($status == 'completed')
    <span class="bs-label badge-success">Completed</span>
@elseif ($status == "canceled")
    <span class="bs-label badge-danger">Canceled</span>
@elseif ($status == "closed")
    <span class="bs-label badge-info">Closed</span>
@elseif ($status == "pending")
    <span class="bs-label badge-warning">Pending</span>
@elseif ($status == "pending_payment")
    <span class="bs-label badge-warning">Pending Payment</span>
@elseif ($status == "in_deliver")
    <span class="bs-label badge-info">In Delivery</span>
@elseif ($status == "fraud")
    <span class="bs-label badge-danger">Fraud</span>
@endif