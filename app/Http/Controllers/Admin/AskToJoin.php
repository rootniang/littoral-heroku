<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AskToJoin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('actifYN',1)->get();
        return view('admin.all_join', compact('users')) ;
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
        //     $user = New User
        $request->validate([
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'mail' => 'required',
            'password' => 'required',
            'password_conf' => 'required|same:password'
        ]);
        $actif = 1; 
        $user = New User([
            User::NUMERO_TELEPHONE       => $request->input('tel'),
            User::PRENOM                 => $request->input('firstname'),
            User::NOM                    => $request->input('lastname'),
            User::DATE_NAISSANCE         => $request->input('birth'),
            User::EMAIL                  => $request->input('mail'),
            User::PASSWORD               => bcrypt($request->input('password')),
            User::POSTE                  => $request->input('prof'),
            User::ACTIFYN                => $actif,
        ]);
        $user->actifYN = 1;
        $user->save();
    
       return view('welcome');
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
        //
    }
}
