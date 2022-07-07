<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Alerte;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlerteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alertes = Alerte::all();
        return view('admin.all_alerte', compact('alertes')) ;
    }

    public function allAlertes()
    {
        $alertes = Alerte::latest()->get();
        return view('allAlertesPublique', compact('alertes'));
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
        $request->validate([
            'description' => 'required|max:1000',
            'titre' => 'required|max:100',
        ]);
        $dateDuJour = Carbon::now()->toDateTimeString();

        $pub = new Publication;
        $pub->titre = $request->titre;
        $pub->datePublication = $dateDuJour;
        $pub->idcat = 1; 
        $pub->iduser = 1; 
        $pub->actifYN = 0;
        $pub->save();
        $idpub = $pub->id;
        Alerte::create([
            'idPub' => $idpub,
            'description' => $request->description
        ]) ;
        return back()->with('success', 'Alerte créée avec succès');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alerte = Alerte::find($id);
        $alerte->delete() ;
        return redirect()->route('alerte.index');
    }
}
