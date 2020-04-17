<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Modul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Mod;

class WelcomeController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('welcome');
    }

    public function search(){


        // if(request()->route()->parameter('id')){
        //     $array['selectedSkills'] = $this->model->find(request()->route()->parameter('id'))
        //     ->skills()->pluck('skills.id')->toArray();


    //    $user_id = auth()->user()->id;

    //    $articles = Articles::whereHas('categories', function($query) use ($ids)
    // {
    //     $query->whereIn('id', $ids);
    // })
    // ->with('categories')
    // ->get();

    //    dd($module_id);

    // $aricles=DB::table('articles') //open articles table
    //                 ->join('categories',function($join) use ($id)){ //join to categories table
    //                     $join->on('articles.categoryID','=','categories.id')//where from articles table the categoryID column === categories table ID column
    //                          ->where('categories.userID',$id); //where categories have user id ==$id
    //                 }
    //                 ->get();

     //     $modul = Modul::whereHas('user', function($q) use ($modul_id){
        //         $q->whereIn('modul_id',$modul_id);
        //     })->get();


        //    dd($modul);

        // $artikels = Artikel::join('modul', function($join) use ($user_id){
            //     $join->on('artikels.modul_id', '=', 'moduls.id')
            //     ->where('moduls.user_id', $user_id);
            // })->get();
            // dd($artikels);


        $moduls = auth()->user()->modul()->pluck('moduls.id')->toArray();

//       dd($modul_id);

        $artikels = Artikel::orderBy('id','DESC');

        if(request()->has('search') && request()->get('search') != ''){

            $artikels = Artikel::whereHas('modul', function ($query) use ($moduls){

                $query->whereIn('id' ,$moduls )
                        ->where('name', 'LIKE', "%".request()->get('search')."%");
            })
            ->orWhere('name', 'LIKE', "%".request()->get('search')."%")
            ->whereIn('modul_id' ,$moduls )->get();
//            dd($artikels);


        }

        $artikels = $artikels->paginate(4);
        return view('search', compact('artikels'));
    }
    public function login(){
        return view('login');
    }
}
