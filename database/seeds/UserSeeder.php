<?php



use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['role' => 1, 'name' => 'Thai', 'email' => 'thai@gmail.com', 'password' => bcrypt('123456')],
            ['role' => 2, 'name' => 'Trung', 'email' => 'trung@gmail.com', 'password' => bcrypt('123456')],
            ['role' => 2, 'name' => 'Quang', 'email' => 'Quang@gmail.com', 'password' => bcrypt('123456')],
            ['role' => 2, 'name' => 'Linh', 'email' => 'Linh@gmail.com', 'password' => bcrypt('123456')],
            ['role' => 1, 'name' => 'Tan', 'email' => 'Tan@gmail.com', 'password' => bcrypt('123456')],
            ['role' => 0, 'name' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('123456')],
        ]);
    }
}
