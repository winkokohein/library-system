<?php
use Modules\Api\Http\Controllers\ApiController;
use Modules\Author\Http\Controllers\AuthorController;
use Modules\Book\Http\Controllers\BookController;
use Modules\BookCategory\Http\Controllers\BookCategoryController;
use Modules\Customer\Http\Controllers\CustomerController;
use Modules\Borrow\Http\Controllers\ApiBorrowController;
use Modules\Review\Http\Controllers\ReviewController;

Route::group([
    'middleware' => ['api'],
    'prefix' => 'api/v1',
    'as' => 'api.',
    'namespace' => 'Modules\Api\Http\Controllers'
],function () {
    Route::post('register', [ApiController::class, 'register']);
    Route::post('login', [ApiController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('me', function () {
            return auth()->user();
        });

        Route::get('profile', [ApiController::class,'profile']);
        Route::get('get-books', [ApiController::class,'getBook']);
        Route::get('books', [ApiController::class,'filter']);
        Route::post('book/review/{id}', [ReviewController::class,'store']);

        Route::get('borrows', [ApiBorrowController::class, 'index']);
        Route::post('borrows', [ApiBorrowController::class, 'store']);
        Route::get('borrows/{id}', [ApiBorrowController::class, 'show']);

        Route::post('logout', [ApiController::class,'logout']);


        Route::middleware('is_api_admin')->group(function () {
            Route::get('authors', [ApiController::class, 'getAuthor']);
            Route::post('author/create', [ApiController::class, 'authorStore']);
            Route::post('author/update/{id}', [ApiController::class,'updateAuthor']);
            Route::delete('author/delete/{id}', [ApiController::class,'deleteAuthor']);

            Route::get('book-categories', [ApiController::class, 'getBookCategory']);
            Route::post('book-category/create', [ApiController::class, 'storeBookCategory']);
            Route::post('book-category/update/{id}', [ApiController::class, 'updateBookCategory']);
            Route::delete('book-category/delete/{id}', [ApiController::class, 'deleteBookCategory']);

            Route::post('book/create', [ApiController::class, 'storeBook']);
            Route::post('book/update/{id}', [ApiController::class, 'updateBook']);
            Route::delete('book/delete/{id}', [ApiController::class, 'deleteBook']);

            Route::get('delivery-fees', [ApiController::class, 'getDeliveryFee']);
            Route::post('delivery-fee/create', [ApiController::class, 'storeDeliveryFee']);
            Route::post('delivery-fee/update/{id}', [ApiController::class, 'updateDeliveryFee']);
            Route::delete('delivery-fee/delete/{id}', [ApiController::class, 'deleteDeliveryFee']);

            Route::get('customers', [ApiController::class, 'getCustomer']);
            Route::post('customer/create', [ApiController::class, 'storeCustomer']);
            Route::post('customer/update/{id}', [ApiController::class, 'updateCustomer']);
            Route::delete('customer/delete/{id}', [ApiController::class, 'deleteCustomer']);

            Route::get('townships', [ApiController::class, 'getTownship']);
            Route::post('township/create', [ApiController::class, 'storeTownship']);
            Route::post('township/update/{id}', [ApiController::class, 'updateTownship']);
        });

    });

});



Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Api\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            // Route::post('api/get', 'ApiTableController')->name('api.get');
            /*
             * User CRUD
             */
            Route::resource('api', 'ApiController');
});