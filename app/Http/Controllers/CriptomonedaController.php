<?php

namespace App\Http\Controllers;

use App\Models\Criptomoneda;
use App\Models\LenguajeProgra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CriptomonedaController extends Controller
{
    //Listado de criptomoneda
    public function criptolist(){
        $criptos = DB::table('criptomoneda')
            // Relacion de Lenguaje
            ->join('lenguaje_programacion', 'criptomoneda.lenguaje_id', '=', 'lenguaje_programacion.id')
            ->select('criptomoneda.*', 'lenguaje_programacion.lenguaje')
            ->paginate(5);


        return view('criptomonedas.listcripto', compact('criptos'));
    }

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
        if($request ->hasfile('logotipo')){
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
