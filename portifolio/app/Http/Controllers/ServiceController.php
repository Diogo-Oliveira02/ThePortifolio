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
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
        } else {
            $nameStore = "noicon.png";
        }

        $db = new Service;
        $db->title = $request->title;
        $db->description = $request->description;
        $db->icon = $nameStore;
        $db->save();       
        
        return view('dashboard', ['msg'=>'Item adicionado com sucesso !']);
    }
    public function getAllService(Request $request)
    {
        return Service::all();
    }
    public function getService(Request $request)
    {
        return Service::find($request->id);
    }
    public function updateService()
    {
        if ($request->hasFile('imagem')) {
            $fileNameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $fileName . "_" . time() . "." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
        } else {
            $nameStore = $request->patch;
        }

        $db = Service::find($request->id);
        $db->title = $request->title;
        $db->description = $request->description;
        $db->patch = $nameStore;
        $db->save();
    }
    public function deleteService(Request $request)
    {
        $db = Service::find($request->id);
        $db->delete();
    }
    public function search(Request $request)
    {
        About::where('description', 'LIKE', '%'.$request->search.'%')
        ->get();
    }
}
