<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Customers extends Model
{
    //
    protected $table = "customers";
    protected $fillable = [
    	"fullname",
    	"email",
    	"created_at",
    	"updated_at"
    ];

    public static function addCustomer($data){
    	return Customers::insert([
    		'fullname' 	=> $data->fullnameKey,
    		'email'		=> $data->emailKey,
    		'created_at' => DB::raw("NOW()"),
    		'updated_at' => DB::raw("NOW()")
    	]);
    }

   	public static function getCustomersList(){
   		return Customers::get();
   	}
}