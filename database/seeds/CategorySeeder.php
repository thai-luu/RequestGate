<?php


use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('category')->insert([
            ['name'=> 'sua chua','status'=> 1 ],
            ['name'=> 'phan nan','status'=> 0 ],
            ['name'=> 'cho muon','status'=> 1 ],
            ]);
    }
}
