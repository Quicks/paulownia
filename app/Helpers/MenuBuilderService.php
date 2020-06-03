<?php

namespace App\Helpers;

class MenuBuilderService{
  public function execute($menus){
    $res = [];
    foreach($menus->sortBy('position') as $parent){
      $res[] = $this->buildMenu($parent);
    }
    return $res;
  }


  private function buildMenu($menu){
    $tmp = $menu->toArray();
    $tmp['children'] = [];
    foreach($menu->children->sortBy('position') as $child){
      $tmp['children'][] = $this->buildMenu($child);
    }
    return $tmp;
  }
}