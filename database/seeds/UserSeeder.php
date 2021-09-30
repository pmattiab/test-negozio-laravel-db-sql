<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $new_user = new User();
        $new_user->name = "Mario";
        $new_user->email = "mario@mail.it";
        $new_user->password = Hash::make("mario1234");
        $new_user->save();

        $new_user = new User();
        $new_user->name = "Carmine";
        $new_user->email = "carmine@mail.it";
        $new_user->password = Hash::make("carmine1234");
        $new_user->save();
    }
}
