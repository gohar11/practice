<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::first()->where(['name' => 'admin'])->get();
        $user = new User;
        $user->name = 'Zoo Doe';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($admin_role);


        $employee_role = Role::first()->where(['name' => 'employee'])->get();
        $user = new User;
        $user->name = 'Fan Doe';
        $user->email = 'employee@example.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($employee_role);

        $employer_role = Role::first()->where(['name' => 'employer'])->get();
        $user = new User;
        $user->name = 'Frank Doe';
        $user->email = 'employer@example.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($employer_role);

    }
}
