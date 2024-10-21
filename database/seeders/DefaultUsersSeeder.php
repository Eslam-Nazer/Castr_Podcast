<?php

declare(strict_types=1);

namespace Database\Seeders;

use Castr\Domains\Shared\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultUsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            "name"      => "Eslam",
            "email"     => "eslam@gmail.com",
            "password"  => "password",
        ]);
    }
}
