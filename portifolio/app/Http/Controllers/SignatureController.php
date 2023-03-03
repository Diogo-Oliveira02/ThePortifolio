<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signature;

class SignatureController extends Controller
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

        $db = new Signature;
        $db->type = $request->type;
        $db->description = $request->description;
        $db->payament_type = $request->payamentType;
        $db->price = $request->price;
        $db->icon =  'senai/icon/' . $nameStore;;
        $db->save();       
        
        return view('dashboard', ['x'=>"", 'msg'=>'Item adicionado com sucesso !']);
    }
}
