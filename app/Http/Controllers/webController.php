<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Customers;
use DB;

class webController extends Controller
{
    //
    public function addCustomer(Request $request){
    	$query = Customers::addCustomer($request);
    	if($query){
    		return response()->json([
    			'response' => true,
    			'message' => "Data Inserted"
    		]);
    	}else{
    		return response()->json([
    			'response' => false,
    			'message' => "There's an error"
    		]);
    	}
    }

    public function getCustomersList(){
    	$query = Customers::get();

    	$content = "";
    	
    	foreach($query as $out){
    		$content .= "
    			<label> Fullname: $out->fullname </label><br/>
    			<label> Email: $out->email </label>
    			<hr style='border: 1px solid black;'/>
    		";
    	}

    	return response()->json([
    		'content' => $content
    	]);


    	// $query2 = Customers::getCustomersList();

    	// return $queryDB = DB::connection('mysql')
    	// ->table('customers')
    	// ->get();

    	// if($query && $query2){
    	// 	return response()->json([
    	// 		'fromController' => $query,
    	// 		'fromModel' => $query2
    	// 	]);
    	// }else{
    	// 	return response()->json([
    	// 		'fromController' => array(),
    	// 		'fromModel' => array()
    	// 	]);
    	// }
    }
}
