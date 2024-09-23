<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {

        // $producto = Producto::all();
        // return view('productos.index', ['producto'=>$producto]);
        //return view('productos.index');
        $producto = Producto::paginate(); //Para paginar los registros
        return view('Productos.index', ['producto' => $producto]);
    }
    public function crear()
    {
        $usuario = User::all();
        return view("Productos.crear", compact('usuario'));
    }

    public function show($producto)
    {

         $producto = Producto::find($producto);
         $iduser = $producto->user_id;
         $usuario = User::find($iduser);
         return view("Productos.show", compact('producto', 'usuario'));

        // $producto = Producto::find($producto);
        // return $producto;
        // return view('productos.show', compact('producto'));
        //return view('productos.show', ['producto' => $producto]);


    }
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->user_id = $request->user_id;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->categoria = $request->categoria;
        //return $request->all(); // para ver todo el Request llenado desde el formulario mas el token asignado automaticamente
        $producto->save();
        //return redirect()->route('producto.index'); //para redireccionar a lapágina anterior de registro
        return redirect()->route('producto.show', $producto->id); //pararedireccionar a la ruta "producto/{id}" para q nos muestre el producto recien creado, tambien podemos usar solo $producto"

    }
    // public function edit($id)
    // {
    //     $producto = Producto::find($id);
    //     return $producto;
    //     //return $id;
    //     //return view('Productos.edit', compact('producto'));
    // }


    public function editar(Producto $producto)
    {

        $usuario = User::all();
        //$producto = $id;
        //la variable $u llevara el usuario correspondiente al producto indicado;
        $u = User::find($producto->user_id);
        //la variable $usuario llevara todos los registros usuarios
        //se enviaran a la vista EDITAR las variables:
        return view("Productos.editar", compact('producto', 'usuario','u'));
    }
    public function update(Request $request, Producto $producto)
    {
        //return $producto;
        //return $request->all(); //mostramos todo los datos del formulario mediante la variable $request
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->categoria = $request->categoria;
        $producto->user_id=$request->user_id;
        //return $request->all();
        $producto->save(); //guarda los cambios en la base de datos
        return redirect()->route('producto.show', $producto->id); //redirige a la vista anterior
    }

    public function destroy(Producto $id)
    {
        //forceDelet para leminar de la bvase de datos
        $id->delete(); //usamos el metodo delete para eliminar el objeto de la vista no de
        return redirect()->Route('producto.index'); //redireccionamos a lavista in
    }
}
