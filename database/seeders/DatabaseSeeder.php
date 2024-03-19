<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\SettingTypeEnum;
use App\Enums\UserRoleEnum;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'username' => 'admin',
            'role' => UserRoleEnum::ADMIN,
            'email' => 'admin@admin.com',
        ]);

        $settings = [
            ['key' => 'airalo_client_id', 'type' => SettingTypeEnum::NORMAL ],
            ['key' => 'airalo_client_secret', 'type' => SettingTypeEnum::NORMAL ],
            ['key' => 'airalo_env', 'type' => SettingTypeEnum::DROPDOWN ],
            ['key' => 'paypal_client_id', 'type' => SettingTypeEnum::NORMAL ],
            ['key' => 'paypal_client_secret', 'type' => SettingTypeEnum::NORMAL ],
            ['key' => 'paypal_env', 'type' => SettingTypeEnum::DROPDOWN ],
        ];
        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                [ 'key' => $setting['key'] ],
                [ 'value' => '', 'type' => $setting['type'] ]
            );
        }

    }
}
