<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(['name' => 'Administrator', 'email' => 'admin@admin', 'password' => bcrypt('admin@admin'), 'no_hp' => '081359528944', 'jenis_kelamin' => 'Laki laki', 'is_admin' => true]);
        User::create(['name' => 'User', 'email' => 'user@user', 'password' => bcrypt('user@user'), 'jenis_kelamin' => 'Laki laki']);
    }
}
