<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = DB::table('member')->limit(100)->get();
        return response()->json($members);
    }

    public function countCustomer()
    {
        $date = date('Y-m-d');
        $countCustomer = DB::table('member')
            ->where('status','=' ,'4')
            ->where('exp_date', '>=' ,$date)
            ->count();
        return response()->json($countCustomer);
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
        $member = DB::table('member')->where('id',$id)->first();
        return response()->json($member);
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
