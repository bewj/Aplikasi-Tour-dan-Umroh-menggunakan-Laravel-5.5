<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\CategoryTour;
use App\Models\CategoryUmroh;
use App\Models\PersonalDatas;
use App\Models\Education;

class Sako extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
          [
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Only one and only admin',
          ],
          [
            'name' => 'direktur',
            'display_name' => 'Direktur',
            'description' => 'Company',
          ],
          [
            'name' => 'komisaris',
            'display_name' => 'Komisaris',
            'description' => 'Company',
          ],
          [
            'name' => 'manager',
            'display_name' => 'Manager',
            'description' => 'Company',
          ],
          [
            'name' => 'staff',
            'display_name' => 'Staff',
            'description' => 'Company',
          ],
        ];

        foreach ($roles as $key => $value) {
          Role::create($value);
        }

        $permissions = [
          [
            'name' => 'create_roles',
            'display_name' => 'Create Roles',
            'description' => 'Add Roles',
          ],
          [
            'name' => 'read_roles',
            'display_name' => 'Read Roles',
            'description' => 'Read Roles',
          ],
          [
            'name' => 'update_roles',
            'display_name' => 'Update Roles',
            'description' => 'Update Roles',
          ],
          [
            'name' => 'delete_roles',
            'display_name' => 'Delete Roles',
            'description' => 'Delete Roles'
          ],
          [
            'name' => 'create_data',
            'display_name' => 'Create',
            'description' => 'Add Data',
          ],
          [
            'name' => 'read_data',
            'display_name' => 'Read',
            'description' => 'Read Data',
          ],
          [
            'name' => 'update_data',
            'display_name' => 'Update',
            'description' => 'Update Data',
          ],
          [
            'name' => 'delete_data',
            'display_name' => 'Delete',
            'description' => 'Delete Data'
          ]
        ];

        foreach ($permissions as $key => $value) {
          Permission::create($value);
        }

        $users = [
            [
                'name' => 'Administrator LF',
                'email' => 'admin@sakoholidays.com',
                'password' => bcrypt('admin123'),
                'status' => 'Activated'
            ],
            [
                'name' => 'Direktur',
                'email' => 'direktur@sakoholidays.com',
                'password' => bcrypt('direktur'),
            ],
            [
                'name' => 'Komisaris',
                'email' => 'komisaris@sakoholidays.com',
                'password' => bcrypt('komisaris'),
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@sakoholidays.com',
                'password' => bcrypt('manager1'),
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@sakoholidays.com',
                'password' => bcrypt('staff12'),
            ],
        ];
        $n = 1;
        foreach ($users as $key => $value) {
          $user = User::create($value);
          $user->attachRole($n);
          $n++;
        }
        /*
        $categorys_tour = [
          [
            'name_tour' => 'Domestik',
            'description' => 'Tour Dilakukan di Indonesia',
          ],
          [
            'name_tour' => 'Internasional',
            'description' => 'Tour Dilakukan di Luar Negeri',
          ]
        ];

        foreach ($categorys_tour as $key => $value) {
          CategoryTour::create($value);
        }

        $categorys_umroh = [
          [
            'name_umroh' => 'Ekonomis',
            'description' => 'Umroh Dengan Kualitas Bintang 3',
          ],
          [
            'name_umroh' => 'Gold',
            'description' => 'Umroh Dengan Kualitas Bintang 4',
          ],
          [
            'name_umroh' => 'VIP',
            'description' => 'Umroh dengan Kualitas Bintang 5',
          ]
        ];

        foreach ($categorys_umroh as $key => $value) {
          CategoryUmroh::create($value);
        }*/
    }
}
