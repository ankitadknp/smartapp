<?php

use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('role_has_permission')->insert(
                array(
                    array(
                        "module_name" => "Permissions",
                        "controller_name" => "",
                        "permission_id" => 1,
                    ),
                    array(
                        "module_name" => "Sub Admin",
                        "controller_name" => "sub_admin",
                        "permission_id" => 1,
                    ),
                    array(
                        "module_name" => "User Roles",
                        "controller_name" => "user-roles",
                        "permission_id" => 1,
                    ),
                    array(
                        "module_name" => "Blog",
                        "controller_name" => "blog",
                        "permission_id" => 2,
                    ),
                    array(
                        "module_name" => "Categories",
                        "controller_name" => "categories",
                        "permission_id" => 3,
                    ),
                    array(
                        "module_name" => "Public Feed",
                        "controller_name" => "public_feed",
                        "permission_id" => 4,
                    ),
                    array(
                        "module_name" => "Merchant",
                        "controller_name" => "merchant",
                        "permission_id" => 5,
                    ),
                    array(
                        "module_name" => "Client",
                        "controller_name" => "client",
                        "permission_id" => 6,
                    ),
                    array(
                        "module_name" => "Coupons QR Code",
                        "controller_name" => "coupons-qr",
                        "permission_id" => 7,
                    ),
                    array(
                        "module_name" => "Smart Debit Card",
                        "controller_name" => "smart-debit-card",
                        "permission_id" => 8,
                    ),
                    array(
                        "module_name" => "CMS Pages",
                        "controller_name" => "cms_pages",
                        "permission_id" => 9,
                    ),
                    array(
                        "module_name" => "Locations",
                        "controller_name" => "locations",
                        "permission_id" => 10,
                    ),
                    array(
                        "module_name" => "Language",
                        "controller_name" => "language",
                        "permission_id" => 11,
                    ),
                )
        );
    }

}
