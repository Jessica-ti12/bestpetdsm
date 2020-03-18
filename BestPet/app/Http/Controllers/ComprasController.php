<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compras;


class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['compras']=Compras::paginate(5);

      return view('compras.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('compras.create');
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
            'nombre_com' => 'required|string|max:100',
            'apellidos_com' => 'required|string|max:100',
            'direccion' => 'required|string|max:100',
            'tipo' => 'required|string|max:100',
            'forma_pago' => 'required|string|max:100',
            'total' => 'required|string|max:100',
        ];
        $Mensaje=["required"=>'El : attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

           $datoscompra=request()->except('_token');

           Compras::insert($datoscompra);
           //return response()->json($datosadopcion);
           return redirect('compras')->with('Mensaje', 'citas agregado con exito');
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
        $compras= Compras::findOrFail($id);
        return view('compras.edit', compact('compras'));
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
             'nombre_com' => 'required|string|max:100',
            'apellidos_com' => 'required|string|max:100',
            'direccion' => 'required|string|max:100',
            'tipo' => 'required|string|max:100',
            'forma_pago' => 'required|string|max:100',
            'total' => 'required|string|max:100',
            
        ];
        $Mensaje=["required"=>'El : attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);



        $datoscompra=request()->except(['_token','_method']);
        compras::where('id','=',$id)->update($datoscompra);

        //$adopta= Adopta::findOrFail($id);
        //return view('adopta.edit', compact('adopta'));
        return redirect('compras')->with('Mensaje', 'Compra modificada con exito');
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
        compras::destroy($id);

        
         return redirect('compras')->with('Mensaje', 'Compra borrada con exito');

    }
}

