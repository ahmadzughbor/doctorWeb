<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'admin@example.org',
            'role' => Role::ADMIN->value,
        ]);
    }
}
