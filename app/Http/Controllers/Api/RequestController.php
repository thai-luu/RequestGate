<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Requests;
use DB;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 0){
            return Requests::where('fromID', $user->id)->get();
        } else if ($user->role ==1){
            return Requests::where('toID', $user->id)->get();
        } else {
            return Requests::all();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return Requests::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Requests $request){ //Lay ra thong tin cua 1 request
        return $request;
    }
    public function showInfo(Requests $request)
    {
        //lay ra thong tin user ma request gui den 
        $users = DB::table('users')->where('id', '=', $request->toID)->get();
        $userss = DB::table('users')->where('id', '=', $request->fromID)->get();
        $a=array($userss,$users);
        return response()->json($a);
        
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requests $requests)
    {
        //
        $r= $requests::find(1);
        $r->update($request->all());
        // dd($requests);
        return $r;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests $request)
    {
        // status = 1 la HCNS da tiep nhan, 0 la chua tiep nhan
        if ($request->status == 1){
            $request->delete();
            return response()->json([
                'result' => 'success',
            ]);
        } else {
        return response()->json([
            'result' => 'failed',
        ]);
        }
    }
}
