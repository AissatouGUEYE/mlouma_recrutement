<?php

namespace App\Http\Controllers;

use App\Models\histModel;
use Illuminate\Http\Request;
use App\Models\campagneModel;
use Subfission\Cas\Facades\Cas;
use Illuminate\Support\Facades\DB;

class Campagne extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $campagnes = DB::table('recru_campagne')->whereDate('date_fin', '>=', date('Y-m-d'))->get();
       
       return view('welcome',compact('campagnes')) ;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $campagne = new campagneModel([
        'nom' => $request->get('nomC'),
        'objet'=> $request->get('objC'),
        'lien'=>$request->get('lienC'),
        'date_debut'=> $request->get('debutC'),
        'date_fin' =>$request->get('finC')
     
        ]);
        $res = $campagne->save();
        if($res){
            $action = 2 ;
            $user = Cas::user() ;
            $hist = new histModel([
                'type' => $action,
                'utilisateur' => $user,
                'module' => 1
            ]);
            $hist->save();
            return redirect('/admin')->with('success','Campagne enrgistrée avec succés');
        }
        else {
            return redirect('/admin')->with('error',"Erreur survenue lors de l'enrgistrement ");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $campagnes = DB::table('recru_campagne')->get();

        $campagnesEnCours = DB::table('recru_campagne')->whereDate('date_fin', '>=', date('Y-m-d'))->get();
        $action = 1 ;
        // dd('hey');

        $user = Cas::user();

        $hist = new histModel([
            'type' => $action,
            'utilisateur' => $user,
            'module' => 1
        ]);
        $hist->save();
        return view('admin.campagne',compact('campagnes','campagnesEnCours')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $campagne = DB::table('recru_campagne')->where('recru_campagne.id', '=',$id)->get();
        return view('admin.campagneEdit',compact('campagne')) ;


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $nom = $request->get('nomC');
        $objet = $request->get('objC');
        $lien  = $request->get('lienC');
        $date_debut = $request->get('debutC');
        $date_fin = $request->get('finC');
        //
        // $role = $request->get('role');
        $res =  DB::update("UPDATE recru_campagne SET nom= '$nom',  objet = '$objet',lien= '$lien',  date_debut = '$date_debut', date_fin ='$date_fin'   WHERE id =$id") ;
        if ($res) {
            $action = 3 ;
            $user = Cas::user();
            $hist = new histModel([
                'type' => $action,
                'utilisateur' => $user,
                'module' => 1
            ]);
            $hist->save();
            return redirect('/admin')->with('success',"Campagne modifiée avec succés");
        }
        else {
            # code...
            return redirect('/admin')->with('error',"Erreur lors de la modification ");

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $del = DB::delete('DELETE FROM recru_campagne where id = ?', [$id]);
        if($del){
            $action = 4 ;
            $user = Cas::user();
            $hist = new histModel([
                'type' => $action,
                'utilisateur' => $user,
                'module' => 1
            ]);
            $hist->save();
            return redirect('/admin')->with('success',"Campagne supprimée avec succés");

        }
        else{
            return redirect('/admin')->with('error',"Erreur lors de la suppression");

        }
    }
}
