<div class="col-9 profit-counter-main-form pt-4">
	<form name="profit-counter" action="{{route('profitability.calculation.store')}}" method="post">
	    {{ csrf_field() }}
	    <div class="row justify-content-center align-items-center">
	    	<div class="col-12 col-md-2 form-legend">
	    		<h3>{{__('profitability-calculation.count-verb')}}</h3>
		    	{{__('profitability-calculation.count-tag')}}
		    </div>
			<div class="col-12 col-md-3">
				<label class="mb-0 ml-3" for="sort_id">{{__('profitability-calculation.sort-label')}}</label>
				<select class="form-control" id="sort_id" name="sort_id" required>
		            <option value="">{{ __('products.sort') }}</option>
		            @foreach($sorts as $sort)
		                <option value="{{$sort->id}}" >{{$sort->admin_name}}</option>
		            @endforeach
		        </select>
		   </div>
		   <div class="col-12 col-md-2 my-3 my-md-0">
		   		<label class="mb-0 ml-3" for="p_type_id">{{__('profitability-calculation.p-type-label')}}</label>
		   		<select class="form-control" id="p_type_id" name="p_type_id" required>
		            <option value="">{{ __('profitability-calculation.p-type-placeholder') }}</option>
		            @foreach($sorts as $sort)
		                <option value="{{$sort->id}}" >{{$sort->admin_name}}</option>
		            @endforeach
		        </select>
		   </div>
		   <div class="col-12 col-md-2">
		   		<label class="mb-0 ml-3" for="tree_amount">{{__('profitability-calculation.tree-amount-label')}}</label>
		   		<input
		   			name="tree_amount"
		   			id="tree_amount"
		   			class="form-control"
		   			placeholder="{{ __('profitability-calculation.tree-amount-placeholder')}} (1-50 000)"
		   			min="1"
		   			max="50000"
		   			required="required"
		   			type="number"
		   		>
		   </div>
		   <div class="col-12 col-md-2 d-flex justify-content-center">
		        <button
		        	value="Submit" 
		        	name="submit"
		        	class="p-0 mx-0 mt-1 custom-page-tab active submit-btn"
		        	type="submit"
		        >{{ __('profitability-calculation.count-verb')}}</button>
		    </div>
	   </div>
   </form>
</div>