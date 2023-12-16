<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SalesHistoriesController extends Controller {

    public function salesRecord() {

        $sales = DB::table( 'sales' )->get();

        $today     = Carbon::now()->format( 'Y-m-d' );
        $yesterday = Carbon::yesterday()->format( 'Y-m-d' );

        // Today sale
        $todaySale = DB::table( 'sales' )
            ->whereDate( 'created_at', $today )
            ->sum( 'total_price' );

        // Yesterday sale
        $yesterdaySale = DB::table( 'sales' )
            ->whereDate( 'created_at', $yesterday )
            ->sum( 'total_price' );

        // This month sale
        $thisMonthSale = DB::table( 'sales' )
            ->whereYear( 'created_at', Carbon::now()->year )
            ->whereMonth( 'created_at', Carbon::now()->month )
            ->sum( 'total_price' );

        // Last month sale
        $lastMonthSale = DB::table( 'sales' )
            ->whereYear( 'created_at', Carbon::now()->subMonth()->year )
            ->whereMonth( 'created_at', Carbon::now()->subMonth()->month )
            ->sum( 'total_price' );

        return view( 'pages.sales_history', compact( 'todaySale', 'yesterdaySale', 'thisMonthSale', 'lastMonthSale' ) );
    }

}