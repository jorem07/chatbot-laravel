<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class AppAbilities extends Command
{
    protected $signature = 'app:abilities';
    protected $description = 'Create an admin user if not exists';

    public function handle()
    {
        $adminEmail = 'admin@admin.com';

        $admin = User::where('email', $adminEmail)->first();

        if ($admin && $admin->roles()->where('name', 'admin')->exists()) {
            $this->info('Admin user already exists.');
        } else {
            if (!$admin) {
                $admin = User::create([
                    'name' => 'Administrator',
                    'email' => $adminEmail,
                    'password' => Hash::make('password'),
                ]);
            }

            $adminRole = Role::firstOrCreate(['name' => 'admin']);

            UserRole::create([
                'user_id' => $admin->id,
                'role_id' => $adminRole->id
            ]);


            $this->info('Admin user created successfully.');
        }

        return Command::SUCCESS;
    }
}
