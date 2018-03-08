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
        $this->call(UserTableSeeder::class);
    }
}


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('userinfos')->insert([
            'name' => '陳廷宇',
            'type' => 'student',
            'identity_code' => '104502040',
            'department' => "bang",
            'privilege' => 1,
        ]);
        DB::table('userinfos')->insert([
            'name' => 'Guest',
            'type' => 'student',
            'identity_code' => '104508888',
            'department' => "bang",
            'privilege' => 0,
        ]);

    }

}
