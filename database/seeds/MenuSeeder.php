<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::getQuery()->delete();
        Menu::create(['position' => 1, 'link' => '/', 'en' => ['title' => 'Main'], 'ru' => ['title' => 'Главная'], 'es' => ['title' => 'Inicio']]);
        
        $firstParent = Menu::create(['position' => 2, 'link' => '', 'en' => ['title' => 'Paulownia'], 'ru' => ['title' => 'Павловния'], 'es' => ['title' => 'Paulownia']]);
        Menu::create(['parent_id' => $firstParent->id,'position' => 1, 'link' => '', 'en' => ['title' => 'About paulownia'], 'ru' => ['title' => 'О Павловнии'], 'es' => ['title' => 'Sobre la Paulownia']]);
        $subParent = Menu::create(['parent_id' => $firstParent->id,'position' => 2, 'link' => '', 'en' => ['title' => 'Varieties'], 'ru' => ['title' => 'Виды и описания'], 'es' => ['title' => 'Variedades']]);
        Menu::create(['parent_id' => $subParent->id,'position' => 1, 'link' => '', 'en' => ['title' => 'Paulownia Pao Tong Z07'], 'ru' => ['title' => 'Paulownia Pao Tong Z07'], 'es' => ['title' => 'Paulownia Pao Tong Z07']]);
        Menu::create(['parent_id' => $subParent->id,'position' => 2, 'link' => '', 'en' => ['title' => 'Paulownia Shan Tong'], 'ru' => ['title' => 'Paulownia Shan Tong'], 'es' => ['title' => 'Paulownia Shan Tong']]);
        Menu::create(['parent_id' => $subParent->id,'position' => 3, 'link' => '', 'en' => ['title' => 'Paulownia Elongata'], 'ru' => ['title' => 'Paulownia Elongata'], 'es' => ['title' => 'Paulownia Elongata']]);
        Menu::create(['parent_id' => $subParent->id,'position' => 4, 'link' => '', 'en' => ['title' => 'Paulownia Tomentosa'], 'ru' => ['title' => 'Paulownia Tomentosa'], 'es' => ['title' => 'Paulownia Tomentosa']]);
        Menu::create(['parent_id' => $subParent->id,'position' => 5, 'link' => '', 'en' => ['title' => 'Paulownia Kawakamii'], 'ru' => ['title' => 'Paulownia Kawakamii'], 'es' => ['title' => 'Paulownia Kawakamii']]);

        Menu::create(['parent_id' => $firstParent->id,'position' => 3, 'link' => '', 'en' => ['title' => 'Create new plantations'], 'ru' => ['title' => 'Создание новых плантаций'], 'es' => ['title' => 'Crear nuevas plantaciones']]);
        Menu::create(['parent_id' => $firstParent->id,'position' => 4, 'link' => '', 'en' => ['title' => 'Presentation brochure'], 'ru' => ['title' => 'Брошюра'], 'es' => ['title' => 'Folleto de presentación']]);
        
        Menu::create(['position' => 3, 'link' => '/', 'en' => ['title' => 'Shop'], 'ru' => ['title' => 'Все товары'], 'es' => ['title' => 'Tienda']]);
        Menu::create(['position' => 4, 'link' => '/', 'en' => ['title' => 'Gallery'], 'ru' => ['title' => 'Галерея'], 'es' => ['title' => 'GALERÍA']]);
        Menu::create(['position' => 5, 'link' => '/', 'en' => ['title' => 'BLOG'], 'ru' => ['title' => 'Блог'], 'es' => ['title' => 'BLOG']]);

   }
}
