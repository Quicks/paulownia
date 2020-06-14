<div class="form-group {{ $errors->has('categories') ? 'has-error' : ''}}">
  <label for="categories[]" class="control-label col-sm-3">@lang('admin.products.form.tabs.categories')</label>
  {{Form::select('categories[]', $categories->pluck('name', 'id'), $product->categories, ['class' => 'select2 col-sm-6', 'multiple' => true])}}
</div>