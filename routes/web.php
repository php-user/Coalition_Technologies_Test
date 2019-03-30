<?php

Route::get('/', 'ProductController@index')->name('product');
Route::post('/product/add', 'ProductController@add')->name('product.add');