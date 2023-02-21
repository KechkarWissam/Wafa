<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public $settings  = [
        [
            'name' => 'Company name',
            'code' => 'company_name',
            'content' => 'Wafa',
        ],
        [
            'name' => 'Company description',
            'code' => 'company_description',
            'content' => '',
        ],
        [
            'name' => 'Phone',
            'code' => 'phone',
            'content' => '+213 (0) 555 04 00 06',
        ],
        [
            'name' => 'Fax',
            'code' => 'fax',
            'content' => '+213 (0) 23 30 51 30',
        ],
        [
            'name' => 'Email',
            'code' => 'email',
            'content' => 'info@wafafaile.net',
        ],
        [
            'name' => 'Address',
            'code' => 'address',
            'content' => '132 Zone industrielle Amara, BP 18, Cheraga Alger',
        ],
        [
            'name' => 'Address factory 1',
            'code' => 'address_factory_1',
            'content' => 'N 36 Pôle Pharmaceutique, Zone Industrielle El Boustane, Rahmania, Zéralda, Alger',
        ],
        [
            'name' => 'Address factory 2',
            'code' => 'address_factory_2',
            'content' => 'Lot 154, Zone Industrielle Ain Oussera, Djelfa',
        ],
        [
            'name' => 'Facebook',
            'code' => 'facebook_link',
            'content' => 'https://www.facebook.com/wafafaileofficiel/',
        ],
        [
            'name' => 'Instagram',
            'code' => 'instagram_link',
            'content' => 'https://www.instagram.com/wafaalgerie/',
        ],
        [
            'name' => 'Logo',
            'code' => 'logo',
            'content' => '',
        ],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach ($this->settings as $setting){
            $exist = Setting::where('code',$setting['code'])->first();

            if($exist){
                $exist->update([
                    'name' => $setting['name'],
                    'code' => $setting['code']
                ]);
            }
            else
                Setting::query()->create($setting);
        }
    }
}
