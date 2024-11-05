<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toDay = date('Y-m-d');
        $orders = DB::table('orders')->where('date','LIKE','%'.$toDay.'%')->get();

        $yesterdayRevenue = DB::table('orders')
            ->whereDate('date' , Carbon::yesterday())->sum('total');
        $todayRevenue = DB::table('orders')
            ->whereDate('date' , Carbon::today())->sum('total');

        return response()->json(
            [   
                'orders' => $orders,
                'yesterdayRevenue' => $yesterdayRevenue,
                'todayRevenue' => $todayRevenue,
            ]
        );
    }

    public function sumOrders()
    {
        $data = DB::table('orders')
        ->select(DB::raw('DATE(`date`) as date'), DB::raw('SUM(total) as sum'))
        ->groupBy(DB::raw('DATE(`date`)'))
        ->orderBy('date', 'desc')
        ->limit(5)
        ->get();
        return response()->json($data);
    }

    public function countProducts(){
        $date = date('Y-m-d');
        $data = DB::table('orders')
        ->join('order_details', 'order_details.order_id', '=', 'orders.id')
        ->select('order_details.product_name', DB::raw('COUNT(order_details.product_name) as ccount'), DB::raw('SUM(orders.total) as sum'))
        ->where(DB::raw('DATE(orders.date)'), 'LIKE', "%$date%")
        ->groupBy('order_details.product_name')
        ->orderBy('ccount', 'desc')
        ->limit(6)
        ->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = DB::table('orders')->where('ref_order_id',$id)->first();
        return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
