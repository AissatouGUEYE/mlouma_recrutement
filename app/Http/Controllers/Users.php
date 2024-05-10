<?php

namespace App\Http\Controllers;

use App\Models\histModel;
use App\Models\usersModel;
use Illuminate\Http\Request;
use Subfission\Cas\Facades\Cas;
use Illuminate\Support\Facades\DB;

class Users extends Controller
{
    //
    public function index()
    {
        //$action = serialize(session_get_cookie_params());
        // $hist = new HistModel([
        //     'action' => 1,
        //     'contenu' => $action,
        //     'user' => cas()->getUser()
        // ]);
        // $hist->save();


        $users = DB::table('ml_users')->get();
        $roles = DB::table('recru_role')->get();
        $profils = DB::select('SELECT rup.id as pid, mlu.*,rr.designation FROM recru_uProfil rup,ml_users mlu,recru_role rr 
        WHERE rup.id_user = mlu.id
        AND rup.id_role = rr.id');

        return view('admin.user',compact('users','roles','profils'));
    }
    public function create(Request $request)
    {
        // $action = serialize(session_get_cookie_params());
        // $hist = new HistModel([
        //     'action' => 1,
        //     'contenu' => $action,
        //     'user' => cas()->getUser()
        // ]);
        // $hist->save();

        $users = new usersModel([
            'id_user' => $request->get('user'),
            'id_role' => $request->get('role')
        ]);
        $res = $users->save();
        if ($res) {
            # code...
            $action = 1 ;
            $user = Cas::user();
            $hist = new histModel([
                'type' => $action,
                'utilisateur' => $user,
                'module' => 2
            ]);
            $hist->save();
            return redirect('/admin/users')->with('success',"Utilisateur enregistré avec succés");
        }
        else {
            # code...
            return redirect('/admin/users')->with('error',"Erreur lors de l'enregistrement ");

        }
    }
    public function edit($id){
        $users = DB::table('ml_users')->get();
        $roles = DB::table('recru_role')->get();
        $profils = DB::select('SELECT rup.id as pid,rup.id_user,rup.id_role, mlu.*,rr.designation FROM recru_uProfil rup,ml_users mlu,recru_role rr 
        WHERE rup.id= ?
        AND rup.id_user = mlu.id
        AND rup.id_role = rr.id',[$id]);
        return view('admin.userEdit',compact('profils','users','roles')) ;
    }
    public function update(Request $request ,$id){
        $user = $request->get('user');
        $role = $request->get('role');
        $res =  DB::update("UPDATE recru_uProfil SET id_user= '$user',  id_role = '$role'  WHERE id =$id") ;
        if ($res) {
            # code...
            $action = 3 ;
            $user = Cas::user();
            $hist = new histModel([
                'type' => $action,
                'utilisateur' => $user,
                'module' => 2
            ]);
            $hist->save();
            return redirect('/admin/users')->with('success',"Profil modifié avec succés");
        }
        else {
            # code...
            return redirect('/admin/users')->with('error',"Erreur lors de la modification ");

        }

    }
    public function delete($id){

        $del = DB::delete('DELETE FROM recru_uProfil where id = ?', [$id]);
        if($del){
            $action = 4 ;
            $user = Cas::user();
            $hist = new histModel([
                'type' => $action,
                'utilisateur' => $user,
                'module' => 2
            ]);
            $hist->save();
            return redirect('/admin/users')->with('success',"Profil supprimé avec succés");

        }
        else{
            return redirect('/admin/users')->with('error',"Erreur lors de la suppression");

        }
    }
}
