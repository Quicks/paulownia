<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\MenuBuilderService;
use App\Helpers\MenuReorderService;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
{

  public function index(Request $request){
    
    $menus = (new MenuBuilderService)->execute(Menu::parents()->get());
    if($request->ajax()){
      return $menus;
    }else {
      return view('admin.menus.index', compact('menus'));
    }
    
  }

  public function store(Request $request) {
    Menu::create($request->all());
    return response(['message' => 'ok'], 200);
  }

  public function update(Request $request, $id) {
    $menu = Menu::findOrFail($id);
    $menu->update($request->all());
    return response(['message' => 'ok'], 200);
  }

  public function destroy($id)
  {
      $menu = Menu::findOrFail($id);
      $menu->delete();
      return response(['message' => 'ok'], 200);
  }

  public function reorder(Request $request) {
    // dd($request->menus);
    (new MenuReorderService)->execute($request->menus);
    return response(['message' => 'ok'], 200);
  }
  
}