<?php



use Illuminate\Database\Seeder;
use App\Request;
class RequestSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requests')->insert([
            ['title'=>'sua dieu hoa','mo_ta'=>'dieu hoa nong','due_date'=>'2021-06-08','comment'=>'nong qua khong chiu dc','id_the_loai' => 1 ,'toID' => 1 ,'fromID'=> 2,'status' => 0,'do_uu_tien'=> 1],
            ['title'=>'sua dieu mang','mo_ta'=>'mang cham','due_date'=>'2021-06-08','comment'=>'mang cham khong chiu dc','id_the_loai' => 1 ,'toID' => 5 ,'fromID'=> 3,'status' => 1,'do_uu_tien'=> 2],
            ['title'=>'muon sach','mo_ta'=>'muon 1 ty thoi','due_date'=>'2021-06-08','comment'=>'muon xong nho tra','id_the_loai' => 2 ,'toID' => 1 ,'fromID'=> 4,'status' => 1,'do_uu_tien'=> 3],
            ]);
    }
}
