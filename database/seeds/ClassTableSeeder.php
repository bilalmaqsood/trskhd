<?php

use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('classes')->insert([

               'name' => 'Main, Eight A'
        ]);
        \DB::table('classes')->insert([

               'name' => 'Main, Five A'
        ]);
        \DB::table('classes')->insert([

               'name' => 'Main, Four A'
        ]); \DB::table('classes')->insert([

               'name' => 'Main, KG A'
        ]); \DB::table('classes')->insert([

               'name' => 'Main, Nine A'
        ]); \DB::table('classes')->insert([

               'name' => 'Main, Nursery A'
        ]); \DB::table('classes')->insert([

               'name' => 'Main, One A'
        ]); \DB::table('classes')->insert([

               'name' => 'Main, Pre-Nursery A'
        ]); \DB::table('classes')->insert([

               'name' => 'Main, Seven A'
        ]); \DB::table('classes')->insert([

               'name' => 'Main, Six A'
        ]);
        \DB::table('classes')->insert([

               'name' => 'Main, Ten A'
        ]);\DB::table('classes')->insert([

               'name' => 'Main, Three A'
        ]);\DB::table('classes')->insert([

               'name' => 'Main, Two A'
        ]);
    }
}
