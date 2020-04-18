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

        $moduls = auth()->user()->modul()->pluck('moduls.id')->toArray();

//       dd($modul_id);

        $artikels = Artikel::orderBy('id','DESC');

        if(request()->has('search') && request()->get('search') != ''){

            $artikels = Artikel::whereHas('modul', function ($query) use ($moduls){

                $query->whereIn('id' ,$moduls )
                        ->where('name', 'LIKE', "%".request()->get('search')."%");
            })
            ->orWhere('name', 'LIKE', "%".request()->get('search')."%")
            ->whereIn('modul_id' ,$moduls );
        //    dd($artikels);

        }

        $artikels = $artikels->paginate(4);
        return view('search', compact('artikels'));
    }
    
    public function login(){
        return view('login');
    }
}
