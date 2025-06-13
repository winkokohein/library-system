<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'Super Admin',
            'email' => 'booklibrary@admin.com',
            'password' => 'secret123',
            'email_verified_at' => now(),
            'mobile' => '959253450837',
            'active' => true,
            'is_vendor' => 0,
            'is_customer' => 0,
        ]);

        if (app()->environment(['local', 'testing'])) {
            User::create([
                'type' => User::TYPE_USER,
                'name' => 'Test User',
                'email' => 'booklibrary@user.com',
                'password' => 'secret',
                'email_verified_at' => now(),
                'mobile' => null,
                'active' => true,
                'is_vendor' => 0,
                'is_customer' => 0,
            ]);
        }

        $this->enableForeignKeys();
    }
}
