<?php



use Illuminate\Database\Seeder;
use App\Department;
class DepartmentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([
            ['name'=>'hb1'],
            ['name'=>'hb2'],
            ['name'=>'hb3'],
            ['name'=>'hb3'],
        ]);
    }
}
