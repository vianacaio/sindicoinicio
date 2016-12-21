<?php
use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)
            ->states('admin')
            ->create([
                'name' => 'Caio Viana',
                'email' => 'admin@user.com'
                ]);
        factory(App\User::class, 1)
                ->create([
                'name' => 'Client da Silva',
                'email' => 'client@user.com'
                ]);   
    }
}