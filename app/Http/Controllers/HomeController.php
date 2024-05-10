<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $curUser = Auth::user()->email;
        // $candidatures = DB::select('select rc.*,c.nom as cnom,c.id,c.objet,c.date_debut,c.date_fin,e.*,r.nom as reg,d.nom as dept,cm.nom as com,l.nom as loc from recru_candidature rc , recru_campagne c,recru_etat e,
        // ml_commune cm,ml_localite l,ml_region r,ml_departement d where email = ? 
        // and rc.id_campagne = c.id 
        // and rc.etat = e.id
        // and rc.region = r.id
        // and rc.dept = d.id
        // and rc.commune = cm.id
        // and rc.localite = l.id', [$curUser]);


        $candidatures = DB::table('recru_candidature')
            ->leftJoin('ml_localite', 'ml_localite.id', '=', 'recru_candidature.localite')
            ->leftJoin('recru_formation', 'recru_formation.id', '=', 'recru_candidature.formation')
            ->leftJoin('recru_niv_etu', 'recru_niv_etu.id', '=', 'recru_candidature.niveau_etu')
            ->leftJoin('recru_organisation', 'recru_organisation.id', '=', 'recru_candidature.organisation')
            ->where('mloumer','==',1)
            ->get([

                'recru_candidature.id as id',
                'recru_candidature.nom as nom',
                'recru_candidature.prenom as prenom',
                'recru_candidature.dt_naiss as dt_naiss',
                'recru_candidature.tel as tel',
                'recru_candidature.email as email',
                'recru_candidature.genre as genre',
                'recru_candidature.etat as etat',
                'recru_candidature.actif as actif',
                'recru_candidature.pratique as pratique',
                'recru_candidature.commentaire as commentaire',

                'ml_localite.id as id_localite',
                'ml_localite.nom as localite',

                'recru_organisation.id as id_organisation',
                'recru_organisation.organisation as organisation',
                'recru_organisation.lieu_residence as lieu_residence',

                'recru_formation.id as id_formation',
                'recru_formation.formation as formation',

                'recru_niv_etu.id as id_niveau_etu',
                'recru_niv_etu.niveau as niveau_etu',

            ]);
        // dd($candidatures);
        return view('home', compact('candidatures'));
    }
}
// 'SELECT rc.*,d.nom as d,c.nom as c,l.nom as l,rg.nom as rnom,re.id as rid,re.state as res, ne.* FROM recru_candidature rc,ml_departement d, recru_etat re,recru_niv_etu as ne,
//         ml_commune c,ml_localite l,ml_region rg WHERE id_campagne = ?
//         AND rc.localite = l.id
//         AND rc.niveau_etu =  ne.id
//         AND rc.etat = re.id
//         AND rc.commune = c.id
//         AND rc.dept = d.id
//         AND rc.region = rg.id'