<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos']=Productos::paginate(5);

      return view('productos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('productos.create');
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
            'precio' => 'required|string|max:100',
            'existencias' => 'required|string|max:100',
            'categoria' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El : attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

           $datosproductos=request()->except('_token');

           Productos::insert($datosproductos);
           //return response()->json($datosadopcion);
           return redirect('productos')->with('Mensaje', 'Producto agregado con exito');
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
        $productos= Productos::findOrFail($id);
        return view('productos.edit', compact('productos'));
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
            'precio' => 'required|string|max:100',
            'existencias' => 'required|string|max:100',
            'categoria' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El : attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);



        $datosproductos=request()->except(['_token','_method']);
        productos::where('id','=',$id)->update($datosproductos);

        //$adopta= Adopta::findOrFail($id);
        //return view('adopta.edit', compact('adopta'));
        return redirect('productos')->with('Mensaje', 'Producto modificado con exito');
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
        productos::destroy($id);

        
         return redirect('productos')->with('Mensaje', 'Producto borrado con exito');

    }
}
