<?php

use Illuminate\Database\Seeder;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 'admin', 1)->create()->each(function ($user)
        {
            $user->useradditionals()->save(factory(App\UserAdditionals::class, 'admin')->make());
            $user->roles()->save(factory(App\Roles::class, 'admin')->make());
        });
    }
}
