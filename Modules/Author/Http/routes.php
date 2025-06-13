<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Author\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('author/get', 'AuthorTableController')->name('author.get');
            /*
             * User CRUD
             */
            Route::resource('author', 'AuthorController');
});