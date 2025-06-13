<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Review\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('review/get', 'ReviewTableController')->name('review.get');
            /*
             * User CRUD
             */
            Route::resource('review', 'ReviewController');
});