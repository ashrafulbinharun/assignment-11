<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {
    public function homepage( Request $request ) {

        $categories = DB::table( 'products' )->get();

        $selectedCategory = $request->input( 'category', '' );

        if ( $selectedCategory ) {
            $products = DB::table( 'products' )->where( 'category', $selectedCategory )->get();
        } else {
            $products = DB::table( 'products' )->get();
        }

        return view( 'pages.all_products', compact( 'products', 'categories', 'selectedCategory' ) );
    }
}