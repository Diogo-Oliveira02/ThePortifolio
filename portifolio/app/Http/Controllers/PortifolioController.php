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
        $db->patch = 'senai/' . $nameStore;
        $db->url = $request->url;
        $db->type = $request->type;
        $db->save();       
        
        return view('dashboard', ['x'=>"", 'msg'=>'Item adicionado com sucesso !']);
    }
    public function getAllPortifolio()
    {
        return view('dashboard', ['x'=>"list",'type'=>"portifolio", 'list'=>Portifolio::all()]);
    }
    public function getPortifolio(Request $request) 
    {
        return view('editPortifolio',['list'=>Portifolio::find($request->id)]);
    }
    public function updatePortifolio(Request $request) 
    {

        if ($request->hasFile('imagem')) {
            $fileNameWithExt = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $nameStore = $fileName . "_" . time() . "." . $extension;
            $path = $request->file('imagem')->storeAs('public/senai', $nameStore);
            $nameStore = 'senai/' . $nameStore;
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

        return $this->getAllPortifolio();
    }
    public function deletePortifolio(Request $request)
    {
        $db = Portifolio::find($request->id);
        $db->delete();

        return $this->getAllPortifolio();
    }
    public function searchPortifolio(Request $request)
    {
        $db = Portifolio::where('title', 'LIKE', '%'.$request->search.'%')
        ->get();

        return view('dashboard', ['x'=>"list",'type'=>"portifolio", 'list'=> $db]);
    }
}
