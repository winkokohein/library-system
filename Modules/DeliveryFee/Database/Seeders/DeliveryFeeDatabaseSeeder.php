<?php

namespace Modules\DeliveryFee\Database\Seeders;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Auth\Models\User;

// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use Modules\DeliveryFee\Entities\DeliveryFee;

class DeliveryFeeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        //test 
        // Grouped permissions
        // Users category
        $lower_module = strtolower('DeliveryFee');
        $name = 'admin.access.'.$lower_module;

        $users = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => $name,
            'description' => 'All '.$lower_module.' Permissions',
        ]);

        $users->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.manage',
                'description' => 'manage '.$lower_module,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.view',
                'description' => 'view '.$lower_module,
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.create',
                'description' => 'create '.$lower_module,
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.edit',
                'description' => 'edit '.$lower_module,
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.'.$lower_module.'.delete',
                'description' => 'delete '.$lower_module,
                'sort' => 5,
            ]),
        ]);
        //end test

        $delivery_fees = [
            ['city_id' => 1, 'township_id' => 1, 'amount'=> '1800', 'created_at' => now(), "updated_at" => now()],
            ['city_id' => 1, 'township_id' => 2, 'amount'=> '2200', 'created_at' => now(), "updated_at" => now()],
            ['city_id' => 1, 'township_id' => 3, 'amount'=> '2100', 'created_at' => now(), "updated_at" => now()],
            ['city_id' => 1, 'township_id' => 4, 'amount'=> '2000', 'created_at' => now(), "updated_at" => now()],
            ['city_id' => 1, 'township_id' => 5, 'amount'=> '2500', 'created_at' => now(), "updated_at" => now()],
            ['city_id' => 1, 'township_id' => 6, 'amount'=> '1800', 'created_at' => now(), "updated_at" => now()],
            ['city_id' => 1, 'township_id' => 7, 'amount'=> '1900', 'created_at' => now(), "updated_at" => now()],
            ['city_id' => 1, 'township_id' => 8, 'amount'=> '1900', 'created_at' => now(), "updated_at" => now()],
            ['city_id' => 1, 'township_id' => 9, 'amount'=> '1500', 'created_at' => now(), "updated_at" => now()],
            ['city_id' => 1, 'township_id' => 10, 'amount'=> '2800', 'created_at' => now(), "updated_at" => now()],
            ['city_id' => 1, 'township_id' => 11, 'amount'=> '2800', 'created_at' => now(), "updated_at" => now()],
        ];

        DeliveryFee::insert($delivery_fees);
    }
}
