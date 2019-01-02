<?php

use Illuminate\Database\Seeder;
use App\Role;
class CreateRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->name = 'employee';
        $role->description = 'role description';
        $role->save();

        $role = new Role;
        $role->name = 'employer';
        $role->description = 'role description';
        $role->save();

        $role = new Role;
        $role->name = 'admin';
        $role->description = 'role description';
        $role->save();

    }
}
