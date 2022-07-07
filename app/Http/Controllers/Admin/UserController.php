<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Organisation;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user = $request->user();
        if($user->status == 2){
            $users = User::where(User::IDORG,$user->idOrg)->get();
        }elseif($user->status == 3){
            $users = User::all();
        }else{
            $users = User::where(User::ID,$user->id)->get();
        }

        return view('admin.user.users', compact('users')) ;
    }

    /**
     * active the use
     * @user
     */
    public function actived(Request $request,User $user){
        $user->actifYN = 1;
        $user->save();
        return back()->withInput();
    }
    /**
     * unActive the user
     * @user
     */
    public function unActived(Request $request,User $user){
        $user->actifYN = 0;
        $user->save();
        return back()->withInput();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
      $organisations = Organisation::all();
      return view('admin.user.addUser',compact('organisations')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        //return $request;
        $user = New User([
            User::NUMERO_TELEPHONE       => $request->input('telephone'),
            User::PRENOM                 => $request->input('prenom'),
            User::NOM                    => $request->input('nom'),
            User::DATE_NAISSANCE         => $request->input('datenaissance'),
            User::EMAIL                  => $request->input('email'),
            User::PASSWORD               => bcrypt($request->input('password')),
            User::POSTE                  => $request->input('poste'),
            User::STATUS                 => $request->input('status'),
            User::ACTIFYN                => 0,
        ]);
        $user->save();
    return redirect()->route('users.index');
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
    public function edit(Request $request,User $user)
    {
        //
        $organisations = Organisation::all();
        return view('admin.user.updateUser',compact('user','organisations')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user->update([
            User::NUMERO_TELEPHONE       => $request->input('telephone'),
            User::PRENOM                 => $request->input('prenom'),
            User::NOM                    => $request->input('nom'),
            User::DATE_NAISSANCE         => $request->input('datenaissance'),
            User::EMAIL                  => $request->input('email'),
            User::POSTE                  => $request->input('poste'),
            User::ACTIFYN                => $user->actifYN,
        ]);
        if($request->has('password')){
            $user->password =  bcrypt($request->input('password'));
            $user->save();
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,User $user)
    {
        //
        $user->delete();
        return back()->withInput();
    }
}
