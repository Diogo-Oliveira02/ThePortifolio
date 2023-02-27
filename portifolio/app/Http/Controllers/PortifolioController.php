<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portifolio;

class PortifolioController extends Controller
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
            $nameStore = "noImagem.png";
        }

        $db = new Portifolio;
        $db->title = $request->title;
        $db->description = $request->description;
        $db->patch = $nameStore;
        $db->url = $request->url;
        $db->type = $request->type;
        $db->save();       
        
        return view('dashboard', ['msg'=>'Item adicionado com sucesso !']);
    }
    public function getAllPortifolio()
    {
        return Portifolio::all();
    }
    public function getPortifolio(Request $request) 
    {
        return Portifolio::find($request->id);
    }
    public function updatePortifolio(Request $request) 
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

        $db = Portifolio::find($request->id);
        $db->title = $request->title;
        $db->description = $request->description;
        $db->patch = $nameStore;
        $db->url = $request->url;
        $db->type = $request->type;
        $db->save();
    }
    public function deletePortifolio(Request $request)
    {
        $db = Portifolio::find($request->id);
        $db->delete();
    }
    public function search(Request $request)
    {
        About::where('description', 'LIKE', '%'.$request->search.'%')
        ->get();
    }
}
