<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Requests;
use DB;
class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $requests = DB::table('requests')
        ->join('category', 'requests.id_the_loai', '=', 'category.id')
        ->select('requests.id', 'requests.due_date','requests.title','requests.mo_ta','requests.toID','requests.fromID','category.name as categoryName')
        ->get();
        $rs= array();
        foreach($requests as $request){
        $name1 = DB::table('users')->where('id','=',$request->toID)->get('name');
        $name2 = DB::table('users')->where('id','=',$request->fromID)->get('name');
        $r = array($request,$name1,$name2);
        array_push($rs,$r);
        
        }
        return $rs;
        
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
        return $a;
        
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
    public function destroy(Requests $requests)
    {
        //
        $requests->delete();

    }
}
