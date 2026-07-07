<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Seeder;
use Modules\User\Models\User;
=======
use Modules\User\Models\User;
use Illuminate\Database\Seeder;
>>>>>>> 6ed19256f (.)

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = new User;
        $admin->name = 'Admin';
        $admin->email = 'admin@test.test';
        $admin->password = bcrypt($admin->email);
        $admin->save();
    }
}
<<<<<<< HEAD


=======
>>>>>>> 6ed19256f (.)
