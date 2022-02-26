<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ←これを追加


class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'name' => 'user1',
            'mail' => 'user1@fake.jp',
            'age' => 12,
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'user2',
            'mail' => 'user2@fake.jp',
            'age' => 34,
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'user3',
            'mail' => 'user3@fake.jp',
            'age' => 56,
        ];
        DB::table('people')->insert($param);

        for($i=4; $i<10; $i++){
            $param = [
                'name' => 'user' . $i,
                'mail' => 'user' . $i . '@fake.jp',
                'age' => 30 + $i,
            ];
            DB::table('people')->insert($param);
        }
        
        
    }
}
