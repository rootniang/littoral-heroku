<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Document;
use App\Models\Categorie;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * uploading file
     */
    public function uploadFile(Request $request){

        $path       = "";
        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $mime = $name ;//mime_content_type($name);
        if($this->isVideo($name)){
            $path = $file->storeAs('videos', $name);
        }else if($this->isImage($name)){
            $path = $file->storeAs('images', $name);
        }else{
            $path = $file->storeAs('documents', $name);
        }
        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
            'path'         =>  $path,
        ]);
    }
    public function index()
    {
        $documents = Document::with('publication')->get();
        return view('admin.all_document', compact('documents')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.add_document', compact('categories')) ;
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
            'title' => 'required|max:100',
            'file' => 'required',
            'type' => 'required',
        ]);
        $dateDuJour = Carbon::now()->toDateTimeString();

        $pub = new Publication;
        $pub->titre = $request->title;
        $pub->datePublication = $dateDuJour;
        $pub->idcat = $request->id;
        $pub->actifYN = 1;
        $pub->save();
        $idpub = $pub->id;
        $filename = time() . '.' . $request->file('file')->extension();
        $filestorage = '';
        switch ($request->type) {
            case '1':
                $filestorage = 'Image' ;
                break;
            case '2':
                $filestorage = 'Video' ;
                break;
            case '3':
                $filestorage = 'Docs' ;
                break;
            default:
                exit() ;
                break;
        }
        $fichier = $request->file('file')->storeAs(
            $filestorage,
            $filename,
            'public'
        );

        Document::create([
            'idPub' => $idpub,
            'chemin' => $fichier,
            'type' => $request->type,
        ]) ;
        return redirect()->route('document.index');
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
        $document = Document::find($id);
        $document->delete() ;
        return redirect()->route('document.index');
    }
}
