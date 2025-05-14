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
            'header' => [
                'ar' => 'مرحباً بكم في موقعنا',
                'en' => 'Welcome to our website'
            ],
            'footer' => [
                'ar' => 'سواء كنت تبحث عن تعزيز علامتك التجارية، زيادة المبيعات، أو جذب العملاء، فريقنا المتخصص مستعد لتحويل أهدافك إلى واقع!',
                'en' => 'Whether you are looking to strengthen your brand, increase sales, or attract customers, our dedicated team is ready to turn your goals into reality!'
            ],
            'copyrights' => [
                'ar' => ' © '. date('Y') . ' example. جميع الحقوق محفوظة.',
                'en' => 'All rights reserved to example Company © ' . date('Y')
            ],
            'google_play' => 'https://play.google.com/store/apps/details?id=com.example.app',
            'app_store' => 'https://apps.apple.com/app/example/id123456789',
            'terms_condition' => [
                'ar' => 'هذه هي شروط الاستخدام الخاصة بالموقع. يجب على المستخدمين الالتزام بها.',
                'en' => 'These are the site’s terms of use. Users must comply with them.'
            ],
            'return_description' => [
                'ar' => 'سياسة الإرجاع: يمكنك إرجاع المنتج خلال 14 يومًا من تاريخ الاستلام.',
                'en' => 'Return Policy: You may return the product within 14 days of receipt.'
            ],
            'privacy_description' => [
                'ar' => 'نحن نحترم خصوصيتك. لن نشارك معلوماتك مع أي طرف ثالث دون إذنك.',
                'en' => 'We respect your privacy. We will not share your information with any third party without your consent.'
            ],
            'map' => '<iframe src="https://maps.google.com/..." width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
            'sales_development' => 100,
            'website_designer' => 100,
            'marketing_service' => 100,
            'clients' => 100,
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
