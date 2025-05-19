<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{

    public function run(): void
    {
        $data = [
            'name' => [
                'ar' => 'UCE',
                'en' => 'UCE'
            ],
            'title' => [
                'ar' => 'United creative engineers',
                'en' => 'United creative engineers'
            ],
            'email' => 'unitedcreativeengineers@gmail.com',
            'about' => [
                'ar' => 'United creative engineers',
                'en' => 'United creative engineers'
            ],
            'description' => [
                'ar' => 'United creative engineers',
                'en' => 'United creative engineers'
            ],
            'address' => [
                'ar' => 'Makanak Office Space - Sheikh Zayed',
                'en' => 'Makanak Office Space - Sheikh Zayed'
            ],

            'phone' => '+20 100 115 1306',
            'map' => 'https://maps.app.goo.gl/9S55GCdZ7g1m5EAo9?g_st=com.google.maps.preview.copy',
            'whatsapp' => '+20 100 115 1306',
            'facebook' => 'https://facebook.com/example',
            'linkedIn' => 'https://www.linkedin.com/company/united-creative-engineers/',
            'instagram' => 'https://www.instagram.com/united_creative_engineers?igsh=MXZkbGVhNmducXlrbQ==',

            'copyrights' => [
                'ar' => 'All rights reserved to United creative engineers company © 2025',
                'en' => 'All rights reserved to United creative engineers company © 2025'
            ],
            'updated_at' => now(),
        ];

        $setting = Setting::first();

        if ($setting) {
            $setting->update($data);
        } else {
            Setting::create(array_merge($data, [
                'created_at' => now(),
            ]));
        }
    }
}
