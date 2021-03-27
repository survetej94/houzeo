<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Events\RegisterMail;

class UserController extends Controller
{
    
    public function createUser(Request $request){
       
      
     $this->validate($request,[
         'name'=>'required',
         'email'=>'required|email:rfc,dns|unique:users',
         'phone'=>'required|unique:users|max:10|min:10',
         'address'=>'required',
         'city'=>'required',
         'state'=>'required',
         'zip'=>'required|min:5',
         'password'=>'required|min:5|max:8'
      ]);

     try{
        
        $country_name='';
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->request('GET', 'https://us-street.api.smartystreets.com/street-address?auth-id='.config('services.smarty.auth_id').'&auth-token='.config('services.smarty.auth_token').'&candidates=10&street='.$request->address.'&city=&state=&zipcode=&match=invalid');
        
        $jsonResp=json_decode($response->getBody());
        if(count($jsonResp)>0){
          $country_name = $jsonResp[0]->metadata->county_name;
        }

        
         $user = new User();
         $user->name     = $request->name;
         $user->email    = $request->email;
         $user->password = Hash::make($request->password);
         $user->phone    = $request->phone;
         $user->address  = $request->address;
         $user->city     = $request->city;
         $user->country  =  $country_name;
         $user->state    = $request->state;
         $user->zip_code = $request->zip;
         $user->save();

         event(new RegisterMail($user));
      
      return redirect('/')->with('success', 'Registerd Successfully. Please check your mail');

     }catch(\Exception $e){
       return redirect('/')->with('error', 'Something went wrong. Please contact Support Team.');
     }

    }
}
