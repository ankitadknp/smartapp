<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('permissions')->insert(
                array(
                    array("name" => "Sub Admin"),
                    array("name" => "User Roles"),
                    array("name" => "Blog"),
                    array("name" => "Categories"),
                    array("name" => "Public Feed"),
                    array("name" => "Merchant"),
                    array("name" => "Client"),
                    array("name" => "Coupons QR Code"),
                    array("name" => "Smart Debit Card"),
                    array("name" => "CMS Pages"),
                    array("name" => "Locations"),
                    array("name" => "Language"),
                    array("name" => "Dashboard"),
                )
        );
    }

}
