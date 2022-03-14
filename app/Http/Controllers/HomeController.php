<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Customer;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->Customer=new Customer();
    }
    function index(){
        $id = Users::all();
        return view('customer')->with('id', $id);
    }
    public function tampildata()
    {
        $data = DB::table('users')
            ->join('customer', 'users.id', '=', 'customer.id')
            ->select('users.id','users.name','users.phone','customer.address')
            ->orderBy('users.name', 'asc')
            ->get();
        return response()-> json($data);
    }

    public function POST(Request $request)
    {
       
        $save = new Users;
        $save->phone = $request->phone;
        $save->save();

        $address = new Customer;
        $address->id = $request->id;
        $address->address =$request->address;
        $address->save();
        return back();
    }
}
