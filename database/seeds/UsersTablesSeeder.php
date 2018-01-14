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
       $roles = factory(App\Roles::class, 'admin')->create();
        factory(App\User::class, 'admin', 5)->create()->each(function ($user) use($roles)
        {
            //Many users
            $roles->user()->attach($user);
            $user->useradditionals()->save(factory(App\UserAdditionals::class, 'admin')->make());
            //One user
            //$user->roles()->save(factory(App\Roles::class, 'admin')->make());
        });
    }
}
