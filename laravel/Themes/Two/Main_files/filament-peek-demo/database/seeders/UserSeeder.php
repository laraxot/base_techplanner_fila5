<?php

namespace Database\Seeders;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Seeder;
use Modules\User\Models\User;
=======
use Modules\User\Models\User;
use Illuminate\Database\Seeder;
>>>>>>> 4b6b99016 (first commit)
=======
use Illuminate\Database\Seeder;
use Modules\User\Models\User;
>>>>>>> dev

class UserSeeder extends Seeder
{
    public function run()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $admin = new User();
=======
        $admin = new User;
>>>>>>> 4b6b99016 (first commit)
=======
        $admin = new User;
>>>>>>> dev
        $admin->name = 'Admin';
        $admin->email = 'admin@test.test';
        $admin->password = bcrypt($admin->email);
        $admin->save();
    }
}
