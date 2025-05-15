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
                'ar' => 'example',
                'en' => 'example'
            ],
            'title' => [
                'ar' => 'example',
                'en' => 'example'
            ],
            'email' => 'example@example.com',
            'about' => [
                'ar' => 'example',
                'en' => 'example'
            ],
            'description' => [
                'ar' => 'example',
                'en' => 'example'
            ],
            'address' => [
                'ar' => 'example',
                'en' => 'example'
            ],
            'phone' => '+9665455470',
            'whatsapp' => '+9685272470',
            'facebook' => 'https://facebook.com/example',
            'twitter' => 'https://twitter.com/example',
            'youtube' => 'https://youtube.com/example',
            'linkedIn' => 'https://linkedin.com/company/example',
            'instagram' => 'https://instagram.com/example',
            'snapchat' => 'https://snapchat.com/add/example',
            'copyrights' => [
                'ar' => ' © '. date('Y') . ' example. جميع الحقوق محفوظة.',
                'en' => 'All rights reserved to example Company © ' . date('Y')
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
