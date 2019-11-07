<?php

use Illuminate\Database\Seeder;

use App\User;

use App\Models\Role;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Hash;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_super_admin = Role::where('name', 'super_admin')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();
        
        $super_admin = new User();
        $super_admin->name = "Super Admin User";
        $super_admin->email = "superadmin@project.com";
        $super_admin->password = Hash::make('123456');
        $super_admin->save();
        $SA_U_D = new UserDetails();
        $SA_U_D->user_id = $super_admin->id;
        $SA_U_D->save();
        $super_admin->roles()->attach($role_super_admin);

        $admin = new User();
        $admin->name = "Admin User";
        $admin->email = "admin@project.com";
        $admin->password = Hash::make('123456');
        $admin->save();
        $A_U_D = new UserDetails();
        $A_U_D->user_id = $admin->id;
        $A_U_D->save();
        $admin->roles()->attach($role_admin);

        $role_user = new User();
        $role_user->name = "User";
        $role_user->email = "user@project.com";
        $role_user->password = Hash::make('123456');
        $role_user->save();        
        $B_U_D = new UserDetails();
        $B_U_D->user_id = $role_user->id;
        $B_U_D->save();
        $role_user->roles()->attach($role_user);
    }
}
