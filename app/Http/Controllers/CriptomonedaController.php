<?php

namespace App\Http\Controllers;

use App\Models\Criptomoneda;
use App\Models\LenguajeProgra;
use Illuminate\Http\Request;

class CriptomonedaController extends Controller
{
    //Formulario para crear Criptomoneda
    public function criptoform(){
        $lenguaje = LenguajeProgra::all();
        return view('criptomonedas.formcripto', compact('lenguaje'));
    }

    //Guardado de criptomoneda
    public function criptosave(Request $request){
        $validator = $this->validate($request, [
            'logotipo'=> 'required|image',
            'nombre'=> 'required|string|max:105',
            'precio'=> 'required|numeric',
            'descripcion'=> 'required|max:255',
            'lenguaje' => 'required'
        ]);
        if($request ->hasfile('foto')){
            $validator ['logotipo']=$request->file('logotipo')->store('imagenes', 'public');
        }
        Criptomoneda::create([
            'logotipo'=>$validator['logotipo'],
            'nombre'=>$validator['nombre'],
            'precio'=>$validator['precio'],
            'descripcion'=>$validator['descripcion'],
            'lenguaje_id'=>$validator['lenguaje']
        ]);

        return back()->with('criptomonedaGuardada','¡Criptomoneda Guardada con exito!');
    }
}
