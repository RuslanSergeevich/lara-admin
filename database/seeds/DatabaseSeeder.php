<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('modules')->insert([
            'title' => 'Меню сайта',
            'icon' => 'fa fa-files-o',
            'url' => '/admin/menu',
            'position' => '1',
            'published' => '1'
        ]);
        DB::table('modules')->insert([
            'title' => 'Страницы',
            'icon' => 'fa fa-files-o',
            'url' => '/admin/pages',
            'position' => '2',
            'published' => '1'
        ]);
        DB::table('modules')->insert([
            'title' => 'Статьи',
            'icon' => 'fa fa-fw fa-newspaper-o',
            'url' => '/admin/articles',
            'position' => '3',
            'published' => '1'
        ]);
        DB::table('modules')->insert([
            'title' => 'Новости',
            'icon' => 'fa fa-fw fa-newspaper-o',
            'url' => '/admin/news',
            'position' => '3',
            'published' => '1'
        ]);
        DB::table('modules')->insert([
            'title' => 'Галерея',
            'icon' => 'fa fa-fw fa-picture-o',
            'url' => '/admin/gallery',
            'position' => '4',
            'published' => '1'
        ]);
        DB::table('modules')->insert([
            'title' => 'Отзывы',
            'icon' => 'fa fa-fw fa-commenting-o',
            'url' => '/admin/comments',
            'position' => '5',
            'published' => '1'
        ]);
        DB::table('modules')->insert([
            'title' => 'Блоки сайта',
            'icon' => 'fa fa-fw fa-dropbox',
            'url' => '/admin/boxes',
            'position' => '6',
            'published' => '1'
        ]);
        DB::table('modules')->insert([
            'title' => 'Настройки сайта',
            'icon' => 'fa fa-fw fa-wrench',
            'url' => '/admin/settings',
            'position' => '7',
            'published' => '1'
        ]);
        DB::table('settings')->insert([
            'phone1' => 'null',
            'phone2' => 'null',
            'phone3' => 'null',
            'email' => 'null',
            'email2' => 'null',
            'copyright' => 'null',
            'address' => 'null',
            'metrika' => 'null'

        ]);

    }
}
