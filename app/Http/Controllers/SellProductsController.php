<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellProductsController extends Controller {

    public function sales( Request $request ) {
        $selectedCategory = $request->input( 'category' );

        $products = $selectedCategory
        ? DB::table( 'products' )->where( 'category', $selectedCategory )->get()
        : DB::table( 'products' )->get();

        $categories = DB::table( 'products' )->select( 'category' )->distinct()->get();

        return view( 'pages.sell_products', compact( 'products', 'categories', 'selectedCategory' ) );
    }

    public function getUnitPrice( Request $request ) {
        $product = DB::table( 'products' )->find( $request->product_id );

        return response()->json( ['unit_price' => $product->unit_price] );
    }

    public function sellProduct( Request $request ) {

        $this->validate( $request, [

            'product_id'    => 'required|exists:products,id',
            'quantity_sold' => 'required|integer',
        ] );

        $product = DB::table( 'products' )->find( $request->product_id );

        if ( $product->quantity < $request->quantity_sold ) {
            return redirect()->back()->with( 'error', 'Not enough quantity available for sale.' );
        }

        DB::table( 'products' )
            ->where( 'id', $request->product_id )
            ->update( ['quantity' => $product->quantity - $request->quantity_sold] );

        DB::table( 'sales' )->insert( [
            'product_id'    => $request->product_id,
            'quantity_sold' => $request->quantity_sold,
            'total_price'   => $request->quantity_sold * $product->unit_price,
            'created_at'    => now(),
            'updated_at'    => now(),
        ] );

        return redirect()->back()->with( 'success', 'Product sold successfully!' );
    }

}