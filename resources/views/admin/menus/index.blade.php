@extends('layouts.admin')
@section('pageTitle')
    @lang('admin.menu.index.title')
@endsection
                    
@section('content')
    <div class="dd" id="domenu">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                        <div class="table-title row">
                                <div class='col-md-1 col-md-offset-11'>
                                    <a href="#" class="btn btn-success dd-new-item btn-sm pull-right" title="Add New news">
                                        <i class="fa fa-plus" aria-hidden="true"></i>@lang('admin.btns.new')
                                    </a>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <li class="dd-item-blueprint">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content"> 
                                    <span>[item_name]</span>
                                    <button class="item-edit btn btn-warning">edit</button>
                                    <button class="item-remove btn btn-danger">x</button>
                                    <div class="dd-edit-box row form-horizontal" style="display: none;">
                                        <div class="form-group">
                                            <label for="en" class="control-label col-sm-3">@lang('admin.form.lang.en')</label>
                                            <input class='form-control col-sm-6' type="text" name="en" placeholder="en">
                                        </div>
                                        <div class="form-group">
                                            <label for="en" class="control-label col-sm-3">@lang('admin.form.lang.ru')</label>
                                            <input class='form-control col-sm-6' type="text" name="ru" placeholder="ru">
                                        </div>
                                        <div class="form-group">
                                            <label for="en" class="control-label col-sm-3">@lang('admin.form.lang.es')</label>
                                            <input class='form-control col-sm-6' type="text" name="es" placeholder="es">
                                        </div>
                                        <div class="form-group">
                                            <label for="en" class="control-label col-sm-3">@lang('admin.form.lang.ar')</label>
                                            <input class='form-control col-sm-6' type="text" name="ar" placeholder="ar">
                                        </div>

                                        <div class="form-group">
                                            <label for="en" class="control-label col-sm-3">@lang('admin.form.lang.fr')</label>
                                            <input class='form-control col-sm-6' type="text" name="fr" placeholder="fr">
                                        </div>
                                        <div class="form-group">
                                            <label for="en" class="control-label col-sm-3">@lang('admin.form.lang.pl')</label>
                                            <input class='form-control col-sm-6' type="text" name="pl" placeholder="pl">
                                        </div>

                                        <div class="form-group">
                                            <label for="en" class="control-label col-sm-3">@lang('admin.menu.index.link')</label>
                                            <input class='form-control col-sm-6' type="text" name="link" placeholder="https://">
                                        </div>
                                        <div>
                                            <button class="btn btn-success col-md-1 col-md-offset-11 mb-15 save-btn" type="submit">@lang('admin.btns.save')</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <ol class="dd-list"></ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- <button class="dd-new-item">+</button> -->
    <!-- .dd-item-blueprint is a template for all .dd-item's -->
    
    </div>
@endsection

@push('scripts')
<script>
      var menu;

  $(document).ready(function() {
    $.ajax({
        url: '',
        success: function(response){
            menu = $('#domenu').domenu({
                onEndEdit: function(el){
                    let data = {}
                    el.find('input[type="text"]').each(function(index, input){
                        data[$(input).attr('name')] = {
                            title: $(input).val()
                        }
                    })
                    let elemData = el.parents('.dd-item').data()
                    data["link"] = el.find('input[type="url"]').val()
                    data["position"] = elemData['position']
                    let id = $(el).parents('.dd-item').data('id')
                    data["_token"] = "{{ csrf_token() }}"
                    if(id){
                        $.ajax({
                            url: '/admin/menus/' + id,
                            method: 'PUT',
                            data: data,
                            success: function(response){
                                
                            }
                        })
                    }else{
                        $.ajax({
                            url: '/admin/menus/',
                            method: 'POST',
                            data: data,
                            success: function(response){
                               
                            }
                        })
                    }
                    
                },
                onRemove: function(id){
                    if(id){
                        $.ajax({
                            url: '/admin/menus/' + id,
                            method: 'DELETE',
                            data: {
                                '_token': "{{ csrf_token() }}"
                            },
                            success: function(response){
                                
                            }
                        })
                    }
                    
                },
                onDragEnd: function(el){
                    let firstList = $('.dd-list').first()
                    let data = []
                    firstList.children('.dd-item').each(function(index, child){
                        data.push(recalcPosition(child, index))
                    })
                    $.ajax({
                        url: '/admin/menus/reorder',
                        method: 'POST',
                        data: {
                            '_token': "{{ csrf_token() }}",
                            menus: data
                        },
                        success: function(response){

                        }
                            
                    })
                }
            })
            menu.parseJson(JSON.stringify(response))
        }
    })
  });
  function recalcPosition(child, index){
    let childInfo = $(child).data()
    childInfo.position = index
    let childrenLists = $(child).children('.dd-list').get();
    if(childrenLists.length){
        childInfo.children = []
        childrenLists.forEach(function(childrenList, listIndex){
            let listData = []
            $(childrenList).children('.dd-item').each(function(subindex, subchild){
                listData.push(recalcPosition(subchild, subindex))
            })
            childInfo.children.push(listData)
        })   
    }
    return childInfo
  }
</script>
@endpush