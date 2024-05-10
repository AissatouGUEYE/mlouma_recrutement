<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Subfission\Cas\Facades\Cas;
use Illuminate\Support\Facades\DB;

class CasController extends Controller
{
    public function __construct()
{
    //$this->middleware('cas.auth');
}
    public function index (Request $request)
    {
        //$username = Cas::getUser();

        //$login = DB::select("SELECT COUNT(*) FROM ml_users WHERE login = '$username' ");
        //$email_in_bd = DB::select("SELECT COUNT(*) FROM ml_users WHERE email = '$email' ");
            
          //  if ($login == 1) {
            //    return redirect('/produits');
           // } 
          // $user = cas()->user();
    
          //  return view('admin.produits.listProduitPerCity',compact('username'));
         //return view('master', [
            //'user'=>$user
       // ]);
    }

   
    public function callback()
    {
        // $username = Cas::getUser();
        // Here you can store the returned information in a local User model on your database (or storage).

        // This is particularly usefull in case of profile construction with roles and other details
        // e.g. Auth::login($local_user);

        return redirect()->route('/admin');
    }
}
