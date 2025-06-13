<?php

namespace Database\Seeders;

use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Order\Entities\OrderItem;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);

        $this->call(AuthSeeder::class);
        $this->call(AnnouncementSeeder::class);

        $this->call([
            \Modules\City\Database\Seeders\CityDatabaseSeeder::class,
            \Modules\Township\Database\Seeders\TownshipDatabaseSeeder::class,
            \Modules\Customer\Database\Seeders\CustomerDatabaseSeeder::class,
            \Modules\Author\Database\Seeders\AuthorDatabaseSeeder::class,
            \Modules\BookCategory\Database\Seeders\BookCategoryDatabaseSeeder::class,
            \Modules\Book\Database\Seeders\BookDatabaseSeeder::class,
            \Modules\Borrow\Database\Seeders\BorrowDatabaseSeeder::class,
            \Modules\DeliveryFee\Database\Seeders\DeliveryFeeDatabaseSeeder::class,
            \Modules\Review\Database\Seeders\ReviewDatabaseSeeder::class,
        ]);

        Model::reguard();
        // OrderItem::newFactory()->count(10)->create();

    }
}
