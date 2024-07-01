<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guard_name = 'web';
        
        Permission::create(["name"=> "Role Read", "guard_name" => $guard_name]);
        Permission::create(["name"=> "Role Create", "guard_name" => $guard_name]);
        Permission::create(["name"=> "Role Update", "guard_name" => $guard_name]);
        Permission::create(["name"=> "Role Delete", "guard_name" => $guard_name]);
        Permission::create(["name"=> "User Read", "guard_name" => $guard_name]);
        Permission::create(["name"=> "User Create", "guard_name" => $guard_name]);
        Permission::create(["name"=> "User Update", "guard_name" => $guard_name]);
        Permission::create(["name"=> "User Delete", "guard_name" => $guard_name]);
        Permission::create(["name"=> "ShiftPresence Read", "guard_name" => $guard_name]);
        Permission::create(["name"=> "ShiftPresence Create", "guard_name" => $guard_name]);
        Permission::create(["name"=> "ShiftPresence Update", "guard_name" => $guard_name]);
        Permission::create(["name"=> "ShiftPresence Delete", "guard_name" => $guard_name]);
        Permission::create(["name"=> "ShiftGrup Read", "guard_name" => $guard_name]);
        Permission::create(["name"=> "ShiftGrup Create", "guard_name" => $guard_name]);
        Permission::create(["name"=> "ShiftGrup Update", "guard_name" => $guard_name]);
        Permission::create(["name"=> "ShiftGrup Delete", "guard_name" => $guard_name]);
        
    }
}
