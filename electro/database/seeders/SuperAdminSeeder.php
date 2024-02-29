<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creation du superadmin

        $superAdmin=User::create([
            'name'=>'nlelectro',
            'email'=>'nlelectro01@gmail.com',
            'password'=>bcrypt('E lectro@1705'),
            'number'=>650781558
        ]);

        //attribuer le role super admin

        $role=Role::where('name','super-Admin')->first();
        $superAdmin->roles()->attach($role->id);

    }
}
