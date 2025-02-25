<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    //
    public function create(Request $request)
    {
        if ($request->hasFile('imagem')) {
            $fileNameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $fileName . "_" . time() . "." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai/icon', $nameStore);
        } else {
            $nameStore = "noicon.png";
        }

        $db = new Service;
        $db->title = $request->title;
        $db->description = $request->description;
        $db->icon =  'senai/icon/' . $nameStore;;
        $db->save();       
        
        return view('dashboard', ['x'=>"", 'msg'=>'Item adicionado com sucesso !']);
    }
    public function getAllService()
    {
        return view('dashboard', ['x'=>"list",'type'=>"service", 'list'=>Service::all()]);
    }
    public function getService(Request $request)
    {
        return view('editService',['list'=>Service::find($request->id)]);
    }
    public function updateService(Request $request)
    {
        if ($request->hasFile('imagem')) {
            $fileNameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $fileName . "_" . time() . "." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai/icon', $nameStore);
            $nameStore = 'senai/icon/' . $nameStore;
        } else {
            $nameStore = $request->icon;
        }

        $db = Service::find($request->id);
        $db->title = $request->title;
        $db->description = $request->description;
        $db->icon = $nameStore;
        $db->save();
        return $this->getAllService();
    }
    public function deleteService(Request $request)
    {
        $db = Service::find($request->id);
        $db->delete();
        return $this->getAllService();
    }
    public function searchService(Request $request)
    {
        $db = Service::where('title', 'LIKE', '%'.$request->search.'%')
        ->get();
        return view('dashboard', ['x'=>"list",'type'=>"service", 'list'=> $db]);
    }
}
