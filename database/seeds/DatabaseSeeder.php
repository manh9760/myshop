<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // $this->call(UsersTableSeeder::class);
        \DB::table('users')->insert([
        	'full_name' => 'Nguyễn Văn Mạnh',
        	'email' => 'parabol123654@gmail.com',
        	'phone' => '0977160823',
        	'password' => md5('manh1290'),
            'role' => '1',
        ]);
    }
}
