<div class="container-fluid d-flex flex-column">
    @if($customer->notes)
        <div class="form-group">
            <span class="control-label col-sm-3">@lang('admin.customers.edit.comment')</span>
            <span class="form-control col-sm-6 h-auto">{{ strip_tags($customer->notes) }}</span>
        </div>
    @endif
</div>