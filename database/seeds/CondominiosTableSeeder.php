<?php
use Illuminate\Database\Seeder;
class CondominiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\Condominio::class, 10)->create();
    }
}