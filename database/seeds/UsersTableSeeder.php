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
        User::create([
            'first_name' => 'Gonzalo ',
            'last_name' => 'Vargas',
            'email' => 'admin@admin.com',
            'phone_number' => '123456',
            'password' => bcrypt('test123test'),
            'email_verified_at' => now(),
            'admin' => true,
            'remember_token' => Str::random(10),
        ]);

        factory(User::class, 10)->create();
    }
}
