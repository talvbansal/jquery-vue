<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jquery', 'JqueryController@index')->name('jquery.index');
Route::get('/vue', 'VueController@index')->name('vue.index');

Route::get('/data/quotes', function(\Faker\Generator $faker){

    $coverTypes = ['Comprehensive', 'Third Party Fire And Theft', 'Third Party Only'];
    $insurers = ['Insurer A', 'Insurer B', 'Insurer C'];
    $customerId = $faker->numberBetween(1000, 5000);

    $data = [];

    for($i = 0; $i <= 9; $i++)
    {
        $data[] = (object)[
            'id' => $i + 1,
            'cover_type' => array_random($coverTypes, 1)[0],
            'customer_id' => $customerId,
            'insurer' => array_random($insurers, 1)[0],
            'voluntary' => $faker->numberBetween(0, 750),
            'scheme_no' => $faker->unique()->numberBetween(100, 500),
            'valid' => $valid = $faker->boolean,
            'premium' => ($valid) ? $faker->numberBetween(500, 2000) : 0,
            'notes' => (!$valid)? $faker->sentence : '',

        ];
    }

    return $data;
});

Route::get('/emergency', 'EmergencyController@index')->name('emergency.index');
