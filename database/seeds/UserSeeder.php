<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function($user) {
            // Создадим заказы на некоторых пользаков
            if (mt_rand(0, 1) == 1) {
                $order = factory(\App\Orders::class)->make();
                $order->user_mail = $user->email;
                $order->user_name = $user->name;
                $user->Orders()->save($order);
            }
        });
    }
}
