<?php

Route::group(['prefix' => 'status-rencana-pengadaan', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\StatusRencanaPengadaan\Http\Controllers\StatusRencanaPengadaanController@index',
        'create'     => 'Bantenprov\StatusRencanaPengadaan\Http\Controllers\StatusRencanaPengadaanController@create',
        'store'     => 'Bantenprov\StatusRencanaPengadaan\Http\Controllers\StatusRencanaPengadaanController@store',
        'show'      => 'Bantenprov\StatusRencanaPengadaan\Http\Controllers\StatusRencanaPengadaanController@show',
        'update'    => 'Bantenprov\StatusRencanaPengadaan\Http\Controllers\StatusRencanaPengadaanController@update',
        'destroy'   => 'Bantenprov\StatusRencanaPengadaan\Http\Controllers\StatusRencanaPengadaanController@destroy',
    ];

    Route::get('/',$controllers->index)->name('status-rencana-pengadaan.index');
    Route::get('/create',$controllers->create)->name('status-rencana-pengadaan.create');
    Route::post('/store',$controllers->store)->name('status-rencana-pengadaan.store');
    Route::get('/{id}',$controllers->show)->name('status-rencana-pengadaan.show');
    Route::put('/{id}/update',$controllers->update)->name('status-rencana-pengadaan.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('status-rencana-pengadaan.destroy');

});

