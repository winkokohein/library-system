<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\DeliveryFee\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('deliveryfee/get', 'DeliveryFeeTableController')->name('deliveryfee.get');
            /*
             * User CRUD
             */
            Route::resource('deliveryfee', 'DeliveryFeeController');
});