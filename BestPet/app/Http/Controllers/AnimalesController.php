<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animales;


class AnimalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['animales']=Animales::paginate(5);

      return view('animales.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('animales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
          $campos=[
            'nombre' => 'required|string|max:100',
            'especie_a' => 'required|string|max:100',
            'edad_a' => 'required|string|max:100',
            'status_a' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El : attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

           $datosanimal=request()->except('_token');

           Animales::insert($datosanimal);
           //return response()->json($datosadopcion);
           return redirect('animales')->with('Mensaje', 'Animale agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $animales= Animales::findOrFail($id);
        return view('animales.edit', compact('animales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
           'nombre' => 'required|string|max:100',
        	'especie_a' => 'required|string|max:100',
            'edad_a' => 'required|string|max:100',
            'status_a' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El : attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);



        $datosanimal=request()->except(['_token','_method']);
        animales::where('id','=',$id)->update($datosanimal);

        //$adopta= Adopta::findOrFail($id);
        //return view('adopta.edit', compact('adopta'));
        return redirect('animales')->with('Mensaje', 'Animal modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        animales::destroy($id);

        
         return redirect('animales')->with('Mensaje', 'Animal borrado con exito');

    }
}

