<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\RoleEnums;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    public function run():void 
    {
       //ajouter le superAdmin

       $this->call(SuperAdminSeeder::class);
       $this->call(RoleSeeder::class);
    }
}