<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Borrow\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('borrow/get', 'BorrowTableController')->name('borrow.get');
            /*
             * User CRUD
             */
            Route::resource('borrow', 'BorrowController');
});