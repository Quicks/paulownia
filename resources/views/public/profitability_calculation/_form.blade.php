<div class="profit-counter-form">
	<div class="row">
		<div class="col-12 profit-counter-desc">
			{{__('profitability-calculation.description')}}
		</div>
	</div>
	<form name="profit-counter" action="{{route('profitability.calculation.store')}}" method="post">
	    {{ csrf_field() }}
	    <div class="row my-5">
			<div class="col-12 col-md-4">
				<select class="form-control" id="sort_id" name="sort_id" required>
		            <option value="">{{ __('products.sort') }}</option>
		            @foreach($sorts as $sort)
		                <option value="{{$sort->id}}" >{{$sort->admin_name}}</option>
		            @endforeach
		        </select>
		   </div>
		   <div class="col-12 col-md-4 my-3 my-md-0">
		   		<select class="form-control" id="p_type_id" name="p_type_id" required>
		            <option value="">{{ __('profitability-calculation.p-type-placeholder') }}</option>
		            @foreach($sorts as $sort)
		                <option value="{{$sort->id}}" >{{$sort->admin_name}}</option>
		            @endforeach
		        </select>
		   </div>
		   <div class="col-12 col-md-4">
		   		<input
		   			name="tree_amount"
		   			class="form-control"
		   			placeholder="{{ __('profitability-calculation.tree-amount-placeholder')}} (1-50 000)"
		   			min="1"
		   			max="50000"
		   			required="required"
		   			type="number"
		   		>
		   </div>
	   </div>
	   <div class="row">
		   	<div class="form-group col-12 d-flex justify-content-center">
		        <button value="Submit" name="submit" class="p-0 mx-0 mt-1 custom-page-tab active submit-btn" type="submit">{{ __('comments.submit')}}</button>
		    </div>
	   </div>
   </form>
</div>