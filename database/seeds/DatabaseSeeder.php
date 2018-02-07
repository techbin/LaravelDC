<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
       Model::unguard();
       $this->call('CategoryTableSeeder');
        // $this->call(UsersTableSeeder::class);
    }
}

class CategoryTableSeeder extends Seeder
{
  public function run()
  {
    App\Category::truncate();

    factory(App\Category::class, 20)->create();
  }
}
