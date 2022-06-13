<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr=['Deportes',
            'Arte y entretenimiento',
            'Sucesos',
            'Política',
            'Economía',
            'Salud y estado físico',
            'Medio ambiente',
            'Música',
            'Tecnología',
            'Redes sociales',
            'Finanzas',
            'Influencers'];
        foreach($arr as $item) { 
            $categoria = Category::create([
                'name'       => $item,
                'user_id'    => 1,
            ]);
        }
    }
}
