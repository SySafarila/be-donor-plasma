<?php

namespace Database\Seeders;

use App\Models\Donor;
use Illuminate\Database\Seeder;

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Donor::create([
            'fullName' => 'Syahrul',
            'gender' => 'rhesus-plus',
            'placeBirth' => 'Sukabumi',
            'dateBirth' => now(),
            'mobile' => '0821123123',
            'email' => 'mail@mail.com',
            'bloodType' => 'blood-group-a',
            'rhesus' => 'rhesus-plus',
            'height' => '160',
            'weight' => '60',
            'positiveDate' => now(),
            'negativeDate' => now(),
            'agreement' => true,
            'positiveImage' => 'positive.jpg',
            'negativeImage' => 'negative.jpg',
            'status' => false,
            'city' => 'Jakarta utara'
        ]);
        Donor::create([
            'fullName' => 'Syahrul',
            'gender' => 'rhesus-plus',
            'placeBirth' => 'Sukabumi',
            'dateBirth' => now(),
            'mobile' => '0821123123',
            'email' => 'mail@mail.com',
            'bloodType' => 'blood-group-a',
            'rhesus' => 'rhesus-plus',
            'height' => '160',
            'weight' => '60',
            'positiveDate' => now(),
            'negativeDate' => now(),
            'agreement' => true,
            'positiveImage' => 'positive.jpg',
            'negativeImage' => 'negative.jpg',
            'status' => false,
            'city' => 'Jakarta barat'
        ]);
        Donor::create([
            'fullName' => 'Syahrul',
            'gender' => 'rhesus-plus',
            'placeBirth' => 'Sukabumi',
            'dateBirth' => now(),
            'mobile' => '0821123123',
            'email' => 'mail@mail.com',
            'bloodType' => 'blood-group-a',
            'rhesus' => 'rhesus-plus',
            'height' => '160',
            'weight' => '60',
            'positiveDate' => now(),
            'negativeDate' => now(),
            'agreement' => true,
            'positiveImage' => 'positive.jpg',
            'negativeImage' => 'negative.jpg',
            'status' => false,
            'city' => 'Jakarta selatan'
        ]);
        Donor::create([
            'fullName' => 'Syahrul',
            'gender' => 'rhesus-plus',
            'placeBirth' => 'Sukabumi',
            'dateBirth' => now(),
            'mobile' => '0821123123',
            'email' => 'mail@mail.com',
            'bloodType' => 'blood-group-a',
            'rhesus' => 'rhesus-plus',
            'height' => '160',
            'weight' => '60',
            'positiveDate' => now(),
            'negativeDate' => now(),
            'agreement' => true,
            'positiveImage' => 'positive.jpg',
            'negativeImage' => 'negative.jpg',
            'status' => false,
            'city' => 'Jakarta timur'
        ]);
        Donor::create([
            'fullName' => 'Syahrul',
            'gender' => 'rhesus-plus',
            'placeBirth' => 'Sukabumi',
            'dateBirth' => now(),
            'mobile' => '0821123123',
            'email' => 'mail@mail.com',
            'bloodType' => 'blood-group-b',
            'rhesus' => 'rhesus-plus',
            'height' => '160',
            'weight' => '60',
            'positiveDate' => now(),
            'negativeDate' => now(),
            'agreement' => true,
            'positiveImage' => 'positive.jpg',
            'negativeImage' => 'negative.jpg',
            'status' => false,
            'city' => 'Jakarta pusat'
        ]);
        Donor::create([
            'fullName' => 'Syahrul',
            'gender' => 'rhesus-plus',
            'placeBirth' => 'Sukabumi',
            'dateBirth' => now(),
            'mobile' => '0821123123',
            'email' => 'mail@mail.com',
            'bloodType' => 'blood-group-ab',
            'rhesus' => 'rhesus-plus',
            'height' => '160',
            'weight' => '60',
            'positiveDate' => now(),
            'negativeDate' => now(),
            'agreement' => true,
            'positiveImage' => 'positive.jpg',
            'negativeImage' => 'negative.jpg',
            'status' => false,
            'city' => 'Jakarta barat'
        ]);
        Donor::create([
            'fullName' => 'Syahrul',
            'gender' => 'rhesus-plus',
            'placeBirth' => 'Sukabumi',
            'dateBirth' => now(),
            'mobile' => '0821123123',
            'email' => 'mail@mail.com',
            'bloodType' => 'blood-group-o',
            'rhesus' => 'rhesus-plus',
            'height' => '160',
            'weight' => '60',
            'positiveDate' => now(),
            'negativeDate' => now(),
            'agreement' => true,
            'positiveImage' => 'positive.jpg',
            'negativeImage' => 'negative.jpg',
            'status' => false,
            'city' => 'Jakarta pusat'
        ]);
    }
}
