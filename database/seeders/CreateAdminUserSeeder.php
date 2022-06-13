<?php

namespace Database\Seeders;

use App\Models\Session;
use App\Models\User;
use Carbon\Carbon;
use Database\Factories\UserFactory;
use Date;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'        => 'Alvaro Hernandez', 
            'email'       => 'super@super.com',
            'roll_master' => 1,
            'password'    => bcrypt('12345678')
        ]);
    
        $role = Role::create(['id'=>1,'name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
        
        $role = Role::create(['id'=>2,'name'=>'Estudiantes']);
        for ($i=0; $i < 850; $i++) { 
            $faker     = Factory::create();
            $dateTime=new Carbon();
            
            $estudiantes = User::create([
                'name'       => $faker->name,
                'email'      => $faker->email,
                'created_at' => $faker->dateTimeBetween($startDate = '-11 month', $endDate = 'now'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-11 month', $endDate = 'now'),
                'roll_master'=> 2,
                'password'   => bcrypt('12345678')
            ]);
            $permissions = Permission::whereName(['videos-list','videos-show'])->get();
            $role->syncPermissions($permissions);
            $estudiantes->assignRole([$role->id]);

            $session = new Session();
            $session->id           = $faker->uuid;
            $session->payload      = $faker->uuid;
            $session->user_id      = $estudiantes->id;
            $session->last_activity= $faker->dateTimeBetween($startDate = '-11 month', $endDate = 'now')->getTimestamp();
            $session->user_agent   = $faker->userAgent;
            $session->ip_address   = $faker->ipv4;
            $session->save();
            
        }

        $role = Role::create(['id'=>3,'name'=>'Profesor']);
        for ($i=0; $i < 155; $i++) {
            $faker = Factory::create();
            $profesores = User::create([
                'name'        => $faker->name, 
                'email'       => $faker->email,
                'roll_master' => 3,
                'created_at'  => $faker->dateTimeBetween($startDate = '-11 month', $endDate = 'now'),
                'updated_at'  => $faker->dateTimeBetween($startDate = '-11 month', $endDate = 'now'),
                'password'    => bcrypt('12345678')
            ]);
            $permissions = Permission::whereName(['videos-list',
               'videos-show',
               'videos-create',
               'videos-edit',
               'videos-delete','estudiantes-list',])->get();
            $role->syncPermissions($permissions);
            $profesores->assignRole([$role->id]);

            $session = new Session();
            $session->id           =  $faker->uuid;
            $session->payload      =  $faker->uuid;
            $session->user_id       = $profesores->id;
            $session->last_activity = $faker->dateTimeBetween($startDate = '-11 month', $endDate = 'now')->getTimestamp();
            $session->user_agent    = $faker->userAgent;
            $session->ip_address    = $faker->ipv4;
            $session->save();

        }

    }
}