<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Citas;


class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['citas']=Citas::paginate(5);

      return view('citas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('citas.create');
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
            'telefono' => 'required|string|max:100',
            'especie' => 'required|string|max:100',
            'edad' => 'required|string|max:100',
            'departamento' => 'required|string|max:100',
            'fecha' => 'required|string|max:100',
            'hora' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El : attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

           $datoscita=request()->except('_token');

           Citas::insert($datoscita);
           //return response()->json($datosadopcion);
           return redirect('citas')->with('Mensaje', 'citas agregado con exito');
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
        $citas= Citas::findOrFail($id);
        return view('citas.edit', compact('citas'));
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
            'telefono' => 'required|string|max:100',
            'especie' => 'required|string|max:100',
            'edad' => 'required|string|max:100',
            'departamento' => 'required|string|max:100',
            'fecha' => 'required|string|max:100',
            'hora' => 'required|string|max:100'
            
        ];
        $Mensaje=["required"=>'El : attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);



        $datoscita=request()->except(['_token','_method']);
        citas::where('id','=',$id)->update($datoscita);

        //$adopta= Adopta::findOrFail($id);
        //return view('adopta.edit', compact('adopta'));
        return redirect('citas')->with('Mensaje', 'Cita modificada con exito');
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
        citas::destroy($id);

        
         return redirect('citas')->with('Mensaje', 'Cita borrada con exito');

    }
}
