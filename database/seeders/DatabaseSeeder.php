<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->importRoles();

        DB::table('shops')->insert(
            [
                [
                    'name' => 'KIM LONG 1',
                    'address' => 'KIM LONG 1',
                    'hotline' => 'KIM LONG 1',
                    'email' => 'KIM LONG 1',
                    'image' => 'KIM LONG 1',
                ],
                [
                    'name' => 'KIM LONG 2',
                    'address' => 'KIM LONG 2',
                    'hotline' => 'KIM LONG 2',
                    'email' => 'KIM LONG 2',
                    'image' => 'KIM LONG 2',
                ]
            ]
        );
        DB::table('positions')->insert(
            [
                [
                    'name' => 'SUPER_ADMIN'
                ],
                [
                    'name' => 'ADMIN'
                ],
                [
                    'name' => 'GIAM DOC'
                ]
            ]
        );
        DB::table('users')->insert(
            [
                [
                    'name' => 'Hoàng thanh hải',
                    'day_of_birth' => '2022-11-11',
                    'gender' => 'nam',
                    'address' => 'Hoàng thanh hải',
                    'position_id' => 1,
                    'shop_id' => 1,
                    'phone' => '1111111111',
                    'email' => 'haipro2141999@gmail.com',
                    'password' => bcrypt('admin'),
                    'image' => '1234567890',

                ],
                [
                    'name' => 'Hoàng thanh hải',
                    'day_of_birth' => '2022-11-11',
                    'gender' => 'nam',
                    'address' => 'Hoàng thanh hải',
                    'position_id' => 1,
                    'shop_id' => 1,
                    'phone' => '1111111111',
                    'email' => 'haipro@gmail.com',
                    'password' => bcrypt('admin'),
                    'image' => '1234567890',
                ]

            ]
        );

        DB::table('role_position')->insert(
            [
                [
                    'position_id' => 1,
                    'role_id' => 1
                ],
                [
                    'position_id' => 1,
                    'role_id' => 2
                ],
                [
                    'position_id' => 1,
                    'role_id' => 3
                ],
                [
                    'position_id' => 1,
                    'role_id' => 4
                ],
                [
                    'position_id' => 1,
                    'role_id' => 5
                ],
            ]
        );
    }
    public function importRoles()
    {
        $parentNameGroups = [
            'shop',
            'Route',
            'position',
            'RolePosition',
            'QuantityManagement',
            'detail',
            'customer',
            'category',
            'book',
            'author'
        ];
        foreach ($parentNameGroups as $parentNameGroup){
            DB::table('roles')->insert([
                'group_name' => $parentNameGroup,
                'role_name' => 'view_' . $parentNameGroup,
            ]);
            DB::table('roles')->insert([

                'group_name' => $parentNameGroup,
                'role_name' => 'show_' . $parentNameGroup,
            ]);
            DB::table('roles')->insert([

                'group_name' => $parentNameGroup,
                'role_name' => 'add_' . $parentNameGroup,
            ]);
            DB::table('roles')->insert([

                'group_name' => $parentNameGroup,
                'role_name' => 'update_' . $parentNameGroup,
            ]);
            DB::table('roles')->insert([

                'group_name' => $parentNameGroup,
                'role_name' => 'delete_' . $parentNameGroup,
            ]);
        }
    }
}
