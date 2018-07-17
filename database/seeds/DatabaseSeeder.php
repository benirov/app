<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\master;
use App\User;
use App\Login;
use App\company;
use App\binnacle;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS = 0');
      master::truncate();
        User::truncate();
        Login::truncate();
        company::truncate();
        binnacle::truncate();

        $CantidadUser = 1;
        // $CantidadUserLogin = 1;
        factory(master::class, $CantidadUser)->create();
        factory(User::class, $CantidadUser)->create();
         factory(Login::class, $CantidadUser)->create();
         factory(company::class, $CantidadUser)->create();
         factory(binnacle::class, $CantidadUser)->create();

    }
}
