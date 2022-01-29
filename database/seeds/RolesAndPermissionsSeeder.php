<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /*
     * php artisan db:seed --class=RolesAndPermissionsSeeder
     */

    public function run()
    {
        Role::create(['name' => 'admin']);
        $user = \App\User::find(1);
        $user->assignRole('admin');
    }
}
