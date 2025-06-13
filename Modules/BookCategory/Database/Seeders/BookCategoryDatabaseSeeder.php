<?php

namespace Modules\BookCategory\Database\Seeders;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Auth\Models\User;

// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Modules\BookCategory\Entities\BookCategory;
use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;

class BookCategoryDatabaseSeeder extends Seeder
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
        $lower_module = strtolower('BookCategory');
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

        $book_categories = [
             ['name' => 'မြန်မာဘာသာပြန်စာအုပ်များ','description' => 'မြန်မာဘာသာပြန်စာအုပ်များ', 'created_at'=> now(),'updated_at' => now()],
             ['name' => 'သုတ ရသ စာပေများ','description' => 'သုတ ရသ စာပေများ.', 'created_at'=> now(),'updated_at' => now()],
             ['name' => 'IT စာပေများ','description' => 'Books based on technology.', 'created_at'=> now(),'updated_at' => now()],
        ];

        BookCategory::insert($book_categories);

    }
}
