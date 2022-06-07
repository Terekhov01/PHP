<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
     public function index(Request $request){
        $search =  $request->input('names');
        $search2 =  $request->input('other');
        Log::info($search);
        Log::info($search2);
        $customers = Customer::where(function ($query) use ($search, $search2){
            $query->where('name', 'like', '%'.$search.'%')
                ->orWhere('lastname', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search2.'%')
                ->orWhere('phone', 'like', '%'.$search2.'%');
        })
        ->paginate(10)
        ->appends(['names' => $search, 'other' => $search2]);
        // $customers->appends(['names' => $search]);
        // $customers->appends(['other' => $search2]);

        // if($search2!=""){
        //     $customers = Customer::where(function ($query) use ($search2){
        //         $query->where('email', 'like', '%'.$search2.'%')
        //             ->orWhere('phone', 'like', '%'.$search2.'%');
        //     })
        //     ->paginate(10);
        //     $customers->appends(['other' => $search2]);
        //     info('other');
        // }
        // else{
        //     $customers = Customer::paginate(10);
        //     info('--other');
        // }
        return View('customers')->with('customers',$customers);

        // if ($search != "" && $search2 != "") {
            
        // } else if ($search != "") {

        // } else ($search2 != "") {

        // } else {
            
        // }
        // if($search!=""){
        //     $customers = Customer::where(function ($query) use ($search){
        //         $query->where('name', 'like', '%'.$search.'%')
        //             ->orWhere('lastname', 'like', '%'.$search.'%');
        //     })
        //     ->paginate(10);
        //     $customers->appends(['names' => $search]);
        //     info('names');
        // }
        // else{
        //     $customers = Customer::paginate(10);
        //     info('--names');
        // }


        // return View('customers')->with('customers',$customers);
        //
    }
}
