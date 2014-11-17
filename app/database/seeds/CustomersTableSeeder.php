<?php

class CustomersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('customers')->delete();

        Customer::create(array(
            'customer' => 'Google LV',
            'contact_person' => 'Sergey Brin',
            'email' => 'serjozha@inbox.lv',
            'phone' => 67888888,
            'mobile' => 29845678,
            'web_page' => 'https://www.google.lv/',
            'address' => 'Rīga, Lāčplēša iela 87, 304. kab.'
        ));

        Customer::create(array(
            'customer' => 'Webskola',
            'contact_person' => 'Vasilij Zhukov',
            'email' => 'vasjzhuk@inbox.lv',
            'phone' => 67888111,
            'mobile' => 29845111,
            'web_page' => 'http://webskola.lv/',
            'address' => 'Rīga, Lāčplēša iela 87, 203. kab.'
        ));
    }

}
