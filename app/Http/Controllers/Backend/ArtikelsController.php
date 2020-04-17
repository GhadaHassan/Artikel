<?php

namespace App\Http\Controllers\Backend;

use App\Models\Artikel;
use App\Models\Modul;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ArtikelsController\Store;

class ArtikelsController extends BackEndController
{
    public function __construct(Artikel $model){
        parent::__construct($model);
    }
        
    protected function filter($rows){
        if(request()->has('name') && request()->get('name') != ''){
            $rows = $rows->where('name', request()->get('name'));
        }
        return $rows;
    }

    protected function with(){
        return ['modul','user'];
    }
    protected function append(){
        return [
            'moduls' => Modul::get(),   // relation 1 to m
        ];
    }

    public function store(Store $request){

        $requestArray = [
            'user_id' => auth()->user()->id
        ] + $request->all();                         // $requestArray => create new row with user login
        // dd($requestArray);
        $row = $this->model->create($requestArray); // $row => create new row video
        

        return redirect('dashboard/artikels');
    }

    public function update($id, Store $request){
        $row = $this->model->findOrFail($id);
    
        $row->update($request->all());
        return redirect('dashboard/artikels');
    }
}
