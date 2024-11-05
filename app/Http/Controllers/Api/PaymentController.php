<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('payment')->limit(100)->get();
        return response()->json($data);
    }

    public function countPayment(){
        $date = date('Y-m-d');
        $data = DB::table('orders')
        ->select('pay', DB::raw('COUNT(pay) as count'), DB::raw('SUM(total) as sum'))
        ->where('date', 'like', "%$date%")
        ->groupBy('pay')
        ->orderBy('sum', 'desc')
        ->limit(5)
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
        $data = DB::table('payment')->where('pay_id',$id)->first();
        return response()->json($data);
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
