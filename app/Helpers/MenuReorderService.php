<?php

namespace App\Helpers;
use App\Models\Menu;

class MenuReorderService {
  public function execute($menus){
    foreach($menus as $menu){
      $this->reorder($menu, null);
    }
  }

  private function reorder($menu, $parentId){
    $menuModel = Menu::find($menu['id']);
    $menuModel->parent_id = $parentId;
    $menuModel->position = $menu['position'];
    // dd($menu);
    $menuModel->save();
    if(!empty($menu['children'])){
      foreach($menu['children'] as $childMenuList){
        foreach($childMenuList as $childMenu){
          $this->reorder($childMenu, $menuModel->id);  
        }
      }
    }
  }
}
