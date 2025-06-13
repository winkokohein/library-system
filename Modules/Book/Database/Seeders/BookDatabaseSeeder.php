<?php

namespace Modules\Book\Database\Seeders;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Auth\Models\User;

// use Spatie\Permission\Models\Role;
use Modules\Book\Entities\Book;
use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;

class BookDatabaseSeeder extends Seeder
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
        $lower_module = strtolower('Book');
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

        $books = [
            [
                'book_name' => 'လေရူးသုန်သုန်',
                'author_id' => 1,
                'book_category_id' => 1,
                'published_year' => 1949,
                'publisher' => 'Secker & Warburg',
                'quantity' => 5,
                'available_quantity' => 3,
                'borrow_amount'=>3000,
                'summary' => 'A dystopian novel set in a totalitarian society ruled by Big Brother.',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'မအိမ်ကံ',
                'author_id' => 2,
                'book_category_id' => 2,
                'published_year' => 1997,
                'publisher' => 'Bloomsbury',
                'quantity' => 10,
                'available_quantity' => 7,
                'borrow_amount'=>3000,
                'summary' => 'The first book in the Harry Potter series about a young wizard.',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'ရွှေပြည်တော်မျှော်တိုင်း‌ေ၀◌း',
                'author_id' => 1,
                'book_category_id' => 1,
                'published_year' => 1997,
                'publisher' => 'Bloomsbury',
                'quantity' => 10,
                'available_quantity' => 1,
                'borrow_amount'=>3000,
                'summary' => 'The first book in the Harry Potter series about a young wizard.',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'သူလိုလူ',
                'author_id' => 3,
                'book_category_id' => 2,
                'published_year' => 1997,
                'publisher' => 'Bloomsbury',
                'quantity' => 10,
                'available_quantity' => 7,
                'borrow_amount'=>3000,
                'summary' => 'The first book in the Harry Potter series about a young wizard.',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'The Guys of Rangon',
                'author_id' => 2,
                'book_category_id' => 1,
                'published_year' => 1997,
                'publisher' => 'Bloomsbury',
                'quantity' => 10,
                'available_quantity' => 1,
                'borrow_amount'=>3000,
                'summary' => 'The first book in the Harry Potter series about a young wizard.',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Book::insert($books);
    }
}
