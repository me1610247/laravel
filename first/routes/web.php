<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products/{id}',function($id){

    $Products=[
        1 =>[
            'title'=>"Product Number 1",
            'description' => "Product Number 1 Description",
            'is_new' => true,
            'has_reviews' => ['first review','second review'],
        ],
        2 =>[
            'title'=>"Product Number 2",
            'description' => "Product Number 2 Description",
            'is_new' => false
        ],
        3 =>[
            'title'=>"Product Number 3",
            'description' => "Product Number 3 Description",
            'is_new' => true
        ],
    ];
    abort_if(!isset($Products[$id]),404);
    $product=$Products[$id];
    return view('products.show',compact('product'));
});

Route::get('home',function(){
    return view('home.index');
});
Route::get('contact',function(){
    return view('home.contact');
});
Route::get('about',function(){
    return view('home.about');
});
Route::get('/products',function(){
    $Products=[
        0 =>[
            'title'=>"Product Number 1",
            'description' => "Product Number 1 Description",
            'is_new' => true,
            'has_reviews' => ['first review','second review'],
        ],
        2 =>[
            'title'=>"Product Number 2",
            'description' => "Product Number 2 Description",
            'is_new' => false
        ],
        3 =>[
            'title'=>"Product Number 3",
            'description' => "Product Number 3 Description",
            'is_new' => true
        ],
    ];
    return view('products.index',compact('Products'));
});