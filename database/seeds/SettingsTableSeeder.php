<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $settings = [
        [
            'key'                       =>  'site_name',
            'value'                     =>  'E-Commerce Application',
        ],
        [
            'key'                       =>  'site_title',
            'value'                     =>  'E-Commerce',
        ],
        [
            'key'                       =>  'default_email_address',
            'value'                     =>  'admin@admin.com',
        ],
        [
            'key'                       =>  'info_email_address',
            'value'                     =>  'info@egepleks.com',
        ],
        [
            'key'                       =>  'currency_code',
            'value'                     =>  'GBP',
        ],
        [
            'key'                       =>  'currency_symbol',
            'value'                     =>  '£',
        ],
        [
            'key'                       =>  'site_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_favicon',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'footer_copyright_text',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_description',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_facebook',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_twitter',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_instagram',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_linkedin',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'google_analytics',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'facebook_pixels',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paytr_payment_method',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paytr_merchant_id',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paytr_merchant_key',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paytr_merchant_salt',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paytr_redirect_host',
            'value'                     =>  '',
        ],
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting)
        {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->settings). ' records');
    }
}