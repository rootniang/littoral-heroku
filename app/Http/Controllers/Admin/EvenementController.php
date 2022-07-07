<?php

namespace App\Http\Controllers\Admin;
use App\Models\Categorie;
use App\Models\Evenement;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $eve= Evenement::find($event ->id)->publication();

       $evenements = Evenement::with('publication')->get();
       return view('admin.all_event', compact('evenements')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Categorie::all();
        return view('admin.add_event', compact('categories')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = Auth::user();
        
        $request->validate([
            'eventName' => 'required|max:100',
            'eventDate' => 'required',
        ]);
        $dateDuJour = Carbon::now()->toDateTimeString();

        $pub = new Publication;
        $pub->titre = $request->eventName;
        $pub->datePublication = $dateDuJour;
        $pub->idcat = $request->id; 
        $pub->actifYN = 1;
        $pub->iduser = $user->id;
        $pub->save();
        $idpub = $pub->id;
        Evenement::create([
            'idPub' => $idpub,
            'date_evenement' => $request->eventDate
        ]) ;
        return redirect()->route('evenement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categorie::all();
        $evenement = Evenement::find($id)->publication;
        $eventSimple = Evenement::find($id);
        return view('admin.update_event', compact('evenement','categories','eventSimple')) ;
       
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
        //je recupére la publication liée à l'événement puis j'enregistre les modifications
        $publication = Evenement::find($id)->publication;
        $publication->titre = $request->eventName ;
        $publication->idcat = $request->id ;

        //je recupére l'événement correspondant puis j'enregistre les modifications
        $evenement = Evenement::find($id);
        $evenement->date_evenement = $request->eventDate ;
        $publication->update();
        $evenement->update() ;
        return redirect()->route('evenement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evenement = Evenement::find($id);
        $evenement->delete() ;
        return redirect()->route('evenement.index');
    }
}
