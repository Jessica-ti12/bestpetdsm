<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adopta;


class AdoptaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['adopta']=Adopta::paginate(5);

      return view('adopta.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('adopta.create');
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
            'apellidos' => 'required|string|max:100',
            'status' => 'required|string|max:100',
            'telefono' => 'required|string|max:100',
            'email' => 'required|email'
        ];
        $Mensaje=["required"=>'El : attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

           $datosadopcion=request()->except('_token');

           Adopta::insert($datosadopcion);
           //return response()->json($datosadopcion);
           return redirect('adopta')->with('Mensaje', 'Empleado agregado con exito');
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
        $adopta= Adopta::findOrFail($id);
        return view('adopta.edit', compact('adopta'));
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
            'apellidos' => 'required|string|max:100',
            'status' => 'required|string|max:100',
            'telefono' => 'required|string|max:100',
            'email' => 'required|email'
        ];
        $Mensaje=["required"=>'El : attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);



        $datosadopcion=request()->except(['_token','_method']);
        adopta::where('id','=',$id)->update($datosadopcion);

        //$adopta= Adopta::findOrFail($id);
        //return view('adopta.edit', compact('adopta'));
        return redirect('adopta')->with('Mensaje', 'Adopta modificado con exito');
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
        adopta::destroy($id);

        
         return redirect('adopta')->with('Mensaje', 'Adopta borrado con exito');

    }
}
