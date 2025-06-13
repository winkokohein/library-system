<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Book\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('book/get', 'BookTableController')->name('book.get');
            /*
             * User CRUD
             */
            Route::resource('book', 'BookController');
});