<?php

use Illuminate\Database\Seeder;

class ApartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var  \App\Repositories\CondominioRepository */

        $repository = app(\App\Repositories\CondominioRepository::class);
        $condominios = $repository->all();



        factory(\App\Entities\Apartamento::class, 10)
            ->make()
            ->each(function ($apartamento) use($condominios){
                $condominio = $condominios->random();
                $apartamento->condominio_id = $condominio->id;



                $condominio->save();

            });

    }
}
