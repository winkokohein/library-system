<?php

namespace Modules\Author\Database\Seeders;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Auth\Models\User;

// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Modules\Author\Entities\Author;
use Modules\Book\Entities\Book;
use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;

class AuthorDatabaseSeeder extends Seeder
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
        $lower_module = strtolower('Author');
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
        $authors = [
            ['name' => 'မြသန်းတင့်', 
                'bio' => 'Myanmar author ".', 
                'nationality' => 'Myanmar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ['name' => 'ခင်ခင်ထူး', 
                'bio' => 'Myanmar author best known ', 
                'nationality' => 'Myanmar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ['name' => 'ဂျာနယ်ကျော်မမလေး', 
                'bio' => '', 
                'nationality' => 'Myanmar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Author::insert($authors);

    }
}
