<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         $user1 = User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@gmail.com',
         ]);
        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@gmail.com',
        ]);
        $role = Role::create(['name' => 'Superadmin']);
        $user1->assignRole($role);
    }
}
