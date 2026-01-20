<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Seeder;
use Modules\User\Models\User;
=======
use Modules\User\Models\User;
use Illuminate\Database\Seeder;
>>>>>>> 4b6b99016 (first commit)

class UserSeeder extends Seeder
{
    public function run()
    {
<<<<<<< HEAD
        $admin = new User();
=======
        $admin = new User;
>>>>>>> 4b6b99016 (first commit)
        $admin->name = 'Admin';
        $admin->email = 'admin@test.test';
        $admin->password = bcrypt($admin->email);
        $admin->save();
    }
}
