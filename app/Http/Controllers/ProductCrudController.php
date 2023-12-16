<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCrudController extends Controller {
    public function create() {
        $categories = DB::table( 'products' )->select( 'category' )->distinct()->get();
        return view( 'pages.create_products', compact( 'categories' ) );
    }

    public function store( Request $request ) {

        $this->validate( $request, [
            'category'     => 'required_without:new_category|string|max:50',
            'product_name' => 'required|string|max:50|unique:products,name',
            'quantity'     => 'required|integer',
            'unit_price'   => 'required|numeric',
        ] );

        $category = $request->category ? $request->category : $request->new_category;

        DB::table( 'products' )->insert( [
            'category'   => $category,
            'name'       => $request->product_name,
            'quantity'   => $request->quantity,
            'unit_price' => $request->unit_price,
            'created_at' => now(),
            'updated_at' => now(),
        ] );

        return redirect()->back()->with( 'success', 'Product added successfully!' );
    }

    public function edit( $id ) {
        $product = DB::table( 'products' )->where( 'id', $id )->first();

        return view( 'pages.edit_product', compact( 'product' ) );
    }

    public function update( Request $request, $id ) {

        $this->validate( $request, [
            'category'     => 'required|string|max:50',
            'product_name' => 'required|string|max:50',
            'quantity'     => 'required|integer',
            'unit_price'   => 'required|numeric',
        ] );

        DB::table( 'products' )->where( 'id', $id )->update( [
            'category'   => $request->category,
            'name'       => $request->product_name,
            'quantity'   => $request->quantity,
            'unit_price' => $request->unit_price,
            'updated_at' => now(),
        ] );

        return redirect()->back()->with( 'success', 'Product updated successfully!' );
    }

    public function destroy( $id ) {
        DB::table( 'products' )->where( 'id', $id )->delete();

        return redirect()->route( 'all.products' )->with( 'success', 'Product deleted successfully!' );
    }

}