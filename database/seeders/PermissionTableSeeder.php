<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'videos-list',
           'videos-show',
           'videos-create',
           'videos-edit',
           'videos-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'estudiantes-list',
           'estudiantes-create',
           'estudiantes-edit',
           'estudiantes-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}