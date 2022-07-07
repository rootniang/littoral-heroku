<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Evenement;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use function GuzzleHttp\normalize_header_keys;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function isImage($file){
        $mage = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
        $explodeImage = explode('.', $file);
        $extension = end($explodeImage);
        if(in_array($extension, $mage))
        {
            return true;
        }else
        {
            return false;
        }
    }
    /***
     * check if file is video
     */
    public function isVideo($filePath){
        $video = ['flv','mp4','m3u8','ts','3gp','mov','avi','wmv'];
        $explodeVideo = explode('.', $filePath);
        $extension = end($explodeVideo);
        if(in_array($extension, $video))
        {
            return true;
        }else
        {
            return false;
        }
    }

    // récupère la date et renvoie le mois en lettres
    function getMonthInLetters($date)
    {
        $month = substr($date, 5, 2);
        switch ($month) {
            case '01':
                return 'Janvier';
            case '02':
                return 'Février';
            case '03':
                return 'Mars';
            case '04':
                return 'Avril';
            case '05':
                return 'Mai';
            case '06':
                return 'Juin';
            case '07':
                return 'Juillet';
            case '08':
                return 'Août';
            case '09':
                return 'Septembre';
            case '10':
                return 'Octobre';
            case '11':
                return 'Novembre';
            case '12':
                return 'Décembre';
            default:
                return 'Erreur';
        }
    }

    function accueil()
    {
        // recuperer 2 articles
        $articles = Article::latest()->take(2)->get();
        $bloc_2_articles = array();
        foreach ($articles as $article)
        {
            $categorie = Categorie::find($article->publication->idcat);
            $nomCategorie = $categorie->libellle;
            $auteur = User::find($article->publication->iduser);
            $nomAuteur = $auteur->prenom." ".$auteur->nom;
            $publication = [
                "publication" => $article->publication,
                "article" => $article,
                "categorie" => $nomCategorie,
                "auteur" => $nomAuteur,
            ];
            array_push($bloc_2_articles, $publication);
        }

        // recuperer 4 articles
        $articles = Article::latest()->take(4)->get();
        $bloc_4_articles = array();
        foreach ($articles as $article)
        {
            $categorie = Categorie::find($article->publication->idcat);
            $nomCategorie = $categorie->libellle;
            $auteur = User::find($article->publication->iduser);
            $nomAuteur = $auteur->prenom." ".$auteur->nom;
            $publication = [
                "publication" => $article->publication,
                "article" => $article,
                "categorie" => $nomCategorie,
                "auteur" => $nomAuteur,
            ];
            array_push($bloc_4_articles, $publication);
        }
        
        // recuperer 3 evenements
        $events = Evenement::latest()->take(4)->get();
        $bloc_events = array();
        foreach ($events as $event)
        {
            $publication = [
                "publication" => $event->publication,
                "jour" => substr($event->date_evenement, 8, 2),
                "mois" => $this->getMonthInLetters($event->date_evenement),
            ];
            array_push($bloc_events, $publication);
        }

        return view('welcome', compact('bloc_2_articles', 'bloc_4_articles', 'bloc_events'));
    }    
}
