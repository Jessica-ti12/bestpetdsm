<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guarderia;


class GuarderiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['guarderia']=guarderia::paginate(5);

      return view('guarderia.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('guarderia.create');
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
            'nombre_p' => 'required|string|max:100',
            'telefono_p' => 'required|string|max:100',
            'especie_a' => 'required|string|max:100',
            'nombre_m' => 'required|string|max:100',
            'tiempo_estancia' => 'required|string|max:100',
            'fecha_ingreso' => 'required|string|max:100',
            'fecha_salida' => 'required|string|max:100',
            'total_pagar' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El : attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

           $datosguarderia=request()->except('_token');

           Guarderia::insert($datosguarderia);
           //return response()->json($datosadopcion);
           return redirect('guarderia')->with('Mensaje', 'Guarderia agregado con exito');
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
        $guarderia= Guarderia::findOrFail($id);
        return view('guarderia.edit', compact('guarderia'));
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
            'nombre_p' => 'required|string|max:100',
            'telefono_p' => 'required|string|max:100',
            'especie_a' => 'required|string|max:100',
            'nombre_m' => 'required|string|max:100',
            'tiempo_estancia' => 'required|string|max:100',
            'fecha_ingreso' => 'required|string|max:100',
            'fecha_salida' => 'required|string|max:100',
            'total_pagar' => 'required|string|max:100'
            
        ];
        $Mensaje=["required"=>'El : attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);



        $datosguarderia=request()->except(['_token','_method']);
        guarderia::where('id','=',$id)->update($datosguarderia);

        //$adopta= Adopta::findOrFail($id);
        //return view('adopta.edit', compact('adopta'));
        return redirect('guarderia')->with('Mensaje', 'guarderia modificada con exito');
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
        guarderia::destroy($id);

        
         return redirect('guarderia')->with('Mensaje', ' Guarderia borrada con exito');

    }
}

