<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\BookCategory\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('bookcategory/get', 'BookCategoryTableController')->name('bookcategory.get');
            /*
             * User CRUD
             */
            Route::resource('bookcategory', 'BookCategoryController');
});