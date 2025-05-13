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
                'ar' => 'سيف المستقبل',
                'en' => 'Sword of the Future'
            ],
            'title' => [
                'ar' => 'سيف المستقبل | مستقبل أعمالك في أيد أمينة',
                'en' => 'Sword of the Future | The future of your business is in safe hands'
            ],
            'email' => 'info@future-sword.com',
            'about' => [
                'ar' => 'سيف المستقبل يقدم حلولاً ذكية مصممة لاحتياجاتك، لتسبيط عملياتك، وتعزيز حضورك الرقمي، وزيادة مبيعاتك بطرق مبتكرة.',
                'en' => 'Saif Al Mustaqbal offers smart solutions tailored to your needs, to streamline your operations, enhance your digital presence, and increase your sales in innovative ways.'
            ],
            'description' => [
                'ar' => 'مع أكثر من 10 سنوات من الخبرة في مجال تطوير المواقع الإلكترونية والتسويق الرقمي، نحن نقدم لك حلولاً متكاملة تناسب احتياجاتك وميزانيتك . سواء كنت تبحث عن موقع إلكتروني جديد، أو تطوير موقعك الحالي، أو التسويق الرقمي الشامل، فريقنا المتخصص جاهز لمساعدتك',
                'en' => 'With more than 10 years of experience in the field of website development and digital marketing, we offer you complete solutions that suit your needs and budget . Whether you are looking for a new website, developing your existing one, or comprehensive digital marketing, our dedicated team is ready to help you'
            ],
            'address' => [
                'ar' => 'الرياض، المملكة العربية السعودية',
                'en' => 'Riyadh, Saudi Arabia'
            ],
            'phone' => '+966541172470',
            'whatsapp' => '+966541172470',
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
                'ar' => ' © '. date('Y') . ' سيف المستقبل. جميع الحقوق محفوظة.',
                'en' => 'All rights reserved to Sword of the Future Company © ' . date('Y')
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
