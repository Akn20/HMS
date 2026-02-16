<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use App\Models\User;   // ← add this

use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create a default role
        $role = Roles::firstOrCreate(
            ['name' => 'Admin'],
            [
                'id' => (string) Str::uuid(),
                'description' => 'Default admin role',
                'status' => true,
            ]
        );

        // Create a default user with that role
        User::factory()->create([
            'role_id' => $role->id,
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
