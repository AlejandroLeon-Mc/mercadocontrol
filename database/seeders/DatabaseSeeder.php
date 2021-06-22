<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marketplace_fields')->insert([
            'id' => null,
            'marketplace_id' => "5",
            'name' => 'MKU-Copname',
            'data-type' => 'text',
            'data-long' => '500',
            ]);
        DB::table('source_fields')->insert([
            'id' => null,
            'source_provider_id' => "5",
            'name' => 'nombre',
            'data-type' => 'text',
            'data-long' => '500',
            'descriptio' =>'Soy la descripcion del producto , necesito el titulo del producto',
            ]);
        DB::table('source_providers')->insert([
            'id' => null,
            'short_name' => "name",
            'name' => 'name',
            'nosotros' => 'solos',
            ]);
    }
}
