<?php

namespace App\Http\Controllers;

use App\Models\histModel;
use App\Models\mlusersModel;
use App\Models\regionModel;
use Illuminate\Http\Request;
use Subfission\Cas\Facades\Cas;
use App\Models\candidatureModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Candidature extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $region = new regionModel() ;
        $regions = DB::table('ml_region')->get();
        // $depts = DB::table('ml_departement')->get();
        // $communes = DB::table('ml_commune')->get();
        // $localites = DB::table('ml_localite')->get();
        $enos = DB::table('recru_eno')->get();
        $filieres = DB::table('recru_filiere')->get();
        $profilCandidats = DB::table('recru_profil_candidat')->get();
        $niveaux = DB::table('recru_niv_etu')->get();

        $url = url()->current();
        $campagne = explode('/', $url);
        $campagneEnCours = $campagne[4];


        return view('form', compact('regions', 'profilCandidats', 'campagneEnCours', 'filieres', 'enos', 'niveaux'));
    }

    public function index_resop()
    {
        //
        // $region = new regionModel() ;
        $regions = DB::table('ml_region')->get();
        // $depts = DB::table('ml_departement')->get();
        // $communes = DB::table('ml_commune')->get();
        // $localites = DB::table('ml_localite')->get();
        $filieres = DB::table('recru_filiere')->get();
        $profilCandidats = DB::table('recru_profil_candidat')->get();
        $organisations = DB::table('recru_organisation')->get();

        $niveaux = DB::table('recru_niv_etu')->get();
        $formations = DB::table('recru_formation')->get();


        $url = url()->current();
        return view('form_resop', compact('regions', 'profilCandidats', 'filieres', 'formations', 'niveaux', 'organisations'));
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

        $url = url()->previous();
        $campagne = explode('/', $url);
        $check = DB::select('SELECT * FROM recru_candidature rc WHERE rc.email  = ?  AND rc.id_campagne = ?', [
            $request->get('email'), $campagne[4],
        ]);
        if (empty($check)) {
            // $url = url()->previous();
            // $campagne = explode('/',$url);
            $langue = json_encode($request->get('langue'));
            $cv = $request->file('cv');
            $lm = $request->file('lm');
            $pp = $request->file('pp');
            if (!empty($cv)) {
                $cvfilename = time() . '.' . $cv->getClientOriginalExtension();
                // $lmfilename = time() .'.' . $lm->getClientOriginalExtension();
                // $ppfilename = time() .'.' . $pp->getClientOriginalExtension();
                $cvdestinationPath = 'assets/cv/';
                // $lmdestinationPath = 'assets/lm/';
                // $ppdestinationPath = 'assets/pp/';

                $cv->move($cvdestinationPath, $cvfilename);
                // $lm->move($lmdestinationPath, $lmfilename);
                // $pp->move($ppdestinationPath, $ppfilename);


                # code...
            } else {
                # code...
                $cvfilename = null;
            }
            if (!empty($lm)) {
                # code...
                $lmfilename = time() . '.' . $lm->getClientOriginalExtension();
                $lmdestinationPath = 'assets/lm/';
                $lm->move($lmdestinationPath, $lmfilename);
            } else {
                $lmfilename = null;
            }
            if (!empty($pp)) {
                $ppfilename = time() . '.' . $pp->getClientOriginalExtension();
                $ppdestinationPath = 'assets/pp/';
                $pp->move($ppdestinationPath, $ppfilename);
            } else {
                $ppfilename = null;
            }



            $candidature = new candidatureModel([
                'id_campagne' => $campagne[4],
                'nom' => $request->get('nom'),
                'prenom' => $request->get('prenom'),
                'dt_naiss' => $request->get('dt_naiss'),
                'profil_social' => $request->get('ps'),
                'niveau_etu' => $request->get('niv'),
                'cv' => $cvfilename,
                'lm' => $lmfilename,
                'pp' => $ppfilename,
                'filiere' => $request->get('filiere'),
                'eno' => $request->get('eno'),
                'langue' => $langue,
                'tel' => $request->get('tel'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('pwd')),
                'region' => $request->get('region'),
                'dept' => $request->get('dept'),
                'commune' => $request->get('commune'),
                'localite' => $request->get('localite'),
                'etat' => 1


            ]);





            //$originalFile = $file->getClientOriginalName();


            // $check = DB::select('SELECT * FROM ml_users mlu WHERE mlu.mail  = ? OR mlu.tel = ?' , [$request->get('email'),$request->get('tel'),]) ;
            // if(empty($check)){
            // $newUser = new mlusersModel (
            //         [
            //             'prenom' => $request->get('prenom'),
            //             'nom' => $request->get('nom'),
            //             'tel' => $request->get('tel'),
            //             'genre' => $request->get('genre'),
            //             'mail'=> $request->get('email'),
            //             'id_campagne' => $campagne[4]

            //         ]
            //     );
            //     $newUser->save() ;


            // }
            $res = $candidature->save();
            if ($res) {
                $action = 5;
                $user = $request->get('nom');
                $hist = new histModel([
                    'type' => $action,
                    'utilisateur' => $user,
                    'module' => 1
                ]);
                $hist->save();
                return redirect('/candidature/' . $campagne[4])->with('success', 'Votre candidature a bien été enregistré ');
            } else {
                return redirect('/candidature/' . $campagne[4])->with('error', "Erreur lors de l'enregistrement,Veuillez verifier les informations saisies ");
            }
        } else {
            return redirect('/candidature/' . $campagne[4])->with('error', "Les informations saisies existent déja ");
        }
    }

    public function store_resop(Request $request)
    {

        $erreur = '';
        if (!$request->checkbox) {
            $erreur .= "Veuillez accepter les conditions d'utilisation svp.";
        }
        if (!$request->activite) {
            $erreur .= 'Veuillez repondre aux questionx svp.';
        }
        if (!$request->pratique) {
            $erreur .= 'Veuillez repondre aux questionx svp.';
        }
        if (!$request->genre) {
            $erreur .= 'Veuillez renseigner votre genre svp.';
        }
        if (!$request->localite) {
            $erreur .= 'Veuillez renseigner votre adresse svp.';
        }
        if (!$request->niv) {
            $erreur .= 'Veuillez renseigner votre niveau svp.';
        }
        if (!$request->formation) {
            $erreur .= 'Veuillez renseigner votre formation svp.';
        }
        if ($request->dt_naiss == '') {
            $erreur .= 'Veuillez renseigner votre date de naissance svp.';
        }
        if ($request->prenom == '') {
            $erreur .= 'Veuillez renseigner votre prenom svp.';
        }
        if ($request->nom == '') {
            $erreur .= 'Veuillez renseigner votre nom svp.';
        }
        if ($request->tel == '') {
            $erreur .= 'Veuillez renseigner votre telephone svp.';
        }
        if ($request->email == '') {
            $erreur .= 'Veuillez renseigner votre email svp.';
        }
        if (!$request->organisation) {
            $erreur .= 'Veuillez renseigner votre organisation svp.';
        }

        if (!$erreur) {
            $url = url()->previous();
            $check = DB::select(
                'SELECT * FROM recru_candidature rc WHERE rc.email  = ?',
                [
                    $request->get('email')
                ]
            );
            if (empty($check)) {
                $candidature = new candidatureModel([
                    'id_campagne' => null,
                    'nom' => $request->get('nom'),
                    'prenom' => $request->get('prenom'),
                    'genre' => $request->get('genre'),
                    'dt_naiss' => $request->get('dt_naiss'),
                    'profil_social' => null,
                    'niveau_etu' => $request->get('niv'),
                    'cv' => null,
                    'lm' => null,
                    'pp' => null,
                    'filiere' => null,
                    'eno' => null,
                    'langue' => null,
                    'password' => null,
                    'tel' => $request->get('tel'),
                    'email' => $request->get('email'),
                    'region' => $request->get('region'),
                    'dept' => $request->get('dept'),
                    'commune' => $request->get('commune'),
                    'localite' => $request->get('localite'),
                    'etat' => 1,
                    'organisation' => $request->organisation,
                    // 'lieu_residence'=>$request->residence,
                    'formation' => $request->get('formation'),
                    'actif' => $request->activite,
                    'pratique' => $request->pratique
                ]);

                $res = $candidature->save();
                if ($res) {
                    $action = 5;
                    $user = $request->get('nom');
                    $hist = new histModel([
                        'type' => $action,
                        'utilisateur' => $user,
                        'module' => 1
                    ]);
                    $hist->save();
                    return redirect('/resop')->with('success', 'Votre candidature a bien été enregistré ');
                } else {
                    return redirect('/resop')->with('error', "Erreur lors de l'enregistrement,Veuillez verifier les informations saisies ");
                }
            } else {
                return redirect('/resop')->with('error', "Les informations saisies existent déja ");
            }
        } else {
            return redirect('/resop')->with('error', $erreur);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $candidatures = DB::select("SELECT lc.*,mr.nom as reg,md.nom as dp,le.nom_eno,lf.designation FROM  recru_candidature lc , recru_filiere lf ,recru_eno le , ml_region mr, ml_departement md
        // WHERE   lc.filiere = lf.id
        // AND     lc.eno = le.id
        // AND     lc.region = mr.id
        // AND     lc.dept = md.id

        // ");

        // $candidates = count($candidatures);

        // return view('admin.campagne',compact('candidatures','candidates')) ;

        $candidates = DB::select(
            'SELECT rc.*,d.nom as d,c.nom as c,l.nom as l,rg.nom as rnom,re.id as rid,re.state as res, ne.* FROM recru_candidature rc,ml_departement d, recru_etat re,recru_niv_etu as ne,
        ml_commune c,ml_localite l,ml_region rg WHERE id_campagne = ?
        AND rc.localite = l.id
        AND rc.niveau_etu =  ne.id
        AND rc.etat = re.id
        AND rc.commune = c.id
        AND rc.dept = d.id
        AND rc.region = rg.id',
            [$id]
        );
        $i = 0;

        foreach ($candidates as $key => $value) {
            $candidates[$i]->id = $value->id;
            $candidates[$i]->nom = $value->nom;
            $candidates[$i]->prenom = $value->prenom;
            $candidates[$i]->dt_naiss = $value->dt_naiss;
            $candidates[$i]->tel = $value->tel;
            $candidates[$i]->mail = $value->mail;
            $candidates[$i]->profil_social = $value->profil_social;
            $candidates[$i]->niveau = $value->niveau;
            $candidates[$i]->filiere = $value->filiere;
            $candidates[$i]->eno = $value->eno;
            $candidates[$i]->langue = $value->langue;
            $candidates[$i]->cv = $value->cv;
            $candidates[$i]->lm = $value->lm;
            $candidates[$i]->pp = $value->pp;
            $candidates[$i]->r = $value->rnom;
            $candidates[$i]->d = $value->d;
            $candidates[$i]->c = $value->c;
            $candidates[$i]->l = $value->l;
            $candidates[$i]->etat = $value->res;
            $candidates[$i]->commentaire = $value->commentaire;


            $i++;
        }
        echo json_encode($candidates);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states = DB::select('select * from recru_etat');
        $candidature = DB::select(
            'SELECT rc.*,d.nom as d,c.nom as c,l.nom as l,rg.nom as rnom,re.id as rid,re.state as res  FROM recru_candidature rc,ml_departement d,recru_etat re,
        ml_commune c,ml_localite l,ml_region rg WHERE rc.id = ?
        AND rc.localite = l.id
        AND rc.etat = re.id
        AND rc.commune = c.id
        AND rc.dept = d.id
        AND rc.region = rg.id',
            [$id]
        );

        return view('admin.candidatureEdit', compact('candidature', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $etat = $request->get('etat');
        $commentaire = $request->get('comment');
        $res =  DB::update("UPDATE recru_candidature SET etat= '$etat' , commentaire ='$commentaire'  WHERE id =$id");
        if ($res) {
            # code...
            $action = 6;
            $user = Cas::user();
            $hist = new histModel([
                'type' => $action,
                'utilisateur' => $user,
                'module' => 1
            ]);
            $hist->save();
            return redirect('/admin')->with('success', "Etat modifié avec succés");
        } else {
            # code...
            return redirect('/admin')->with('error', "Erreur lors de la modification ");
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
        //
        $del = DB::delete('DELETE FROM recru_candidature where id = ?', [$id]);
        if ($del) {
            $action = 7;
            $user = Cas::user();
            $hist = new histModel([
                'type' => $action,
                'utilisateur' => $user,
                'module' => 1
            ]);
            $hist->save();
            return redirect('/admin')->with('success', "Candidature supprimée avec succés");
        } else {
            return redirect('/admin')->with('error', "Erreur lors de la suppression");
        }
    }
}
