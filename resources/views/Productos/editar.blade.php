<x-app-layout>
<div class='flex items-center justify-center min-h-screen from-teal-100 via-teal-300 to-teal-500 bg-gradient-to-br'>
    <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
        <div class='max-w-md mx-auto space-y-6'>
            <form action="{{ route('producto.update', $producto->id) }}" method="POST"> <!-- Definimos la ruta del formulario y el método POST -->
                @csrf <!-- Añadimos un token de seguridad al formulario -->
                @method('put') <!-- Para especificar que el método que se usará es PUT -->

                <h2 class="text-2xl font-bold">Actualizar datos del producto {{ $producto->id }}</h2>
                <hr class="my-6">

                <label class="uppercase text-sm font-bold opacity-70">Nombre</label>
                <input type="text" name="nombre" value="{{ $producto->nombre }}" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">

                <label class="uppercase text-sm font-bold opacity-70">Descripción</label>
                <input type="text" name="descripcion" value="{{ $producto->descripcion }}" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded">

                <label class="uppercase text-sm font-bold opacity-70">Categoría</label>
                <input type="text" name="categoria" value="{{ $producto->categoria }}" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded">

                <!-- Designamos el campo user_id para que reciba los datos -->
                <select name="user_id" class="w-full p-3 mt-2 mb-4 bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                    <option  value="">{{ $u->name }}</option> <!-- Mostramos el usuario actual -->
                    @foreach ($usuario as $user) <!-- Recorremos el arreglo -->
                        <option value="{{ $user->id }}">{{ $user->name }}</option> <!-- El valor mostrado será en cada opción, y mandamos su respectivo id a la base de datos -->
                    @endforeach
                </select>

                <input type="submit" class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300" value="Actualizar">
            </form>

            <a href="{{ route('producto.index') }}">
                <button class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300">Cancelar</button>
            </a>
        </div>
    </div>
</div>
</x-app-layout>

