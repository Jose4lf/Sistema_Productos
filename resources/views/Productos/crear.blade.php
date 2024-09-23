<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Registrar un nuevo Producto') }}
        </h2>
    </x-slot>
    <div class='flex items-center justify-center min-h-screen from-teal-100 via-teal-300 to-teal-500 bg-gradient-to-br'>
        <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
            <div class='max-w-md mx-auto space-y-6'>

                <form action="{{route('producto.store')}}" method="POST">
                    @csrf
                    <h2 class="text-2xl font-bold ">Registrar Producto</h2>
                    <p class="my-4 opacity-70"></p>
                    <hr class="my-6">
                    <label class="uppercase text-sm font-bold opacity-70">Nombre</label>
                    <input type="text" name="nombre"class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                    <label class="uppercase text-sm font-bold opacity-70">Descripcion</label>
                    <input type="text" name="descripcion" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded">
                    <label class="uppercase text-sm font-bold opacity-70">Categotia</label>
                    <input type="text" name="categoria" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded">
                    <label class="uppercase text-sm font-bold opacity-70">Encargado</label>
                    <select name="user_id"
                        class="w-full p-3 mt-2 mb-4 bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                        <option selected="">Seleccione a un encargado</option>
                        @foreach ($usuario as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach

                    </select>

                    <input
                        type="submit"class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300" value="Guardar">

                </form>
                <a href="{{ route('producto.index') }}">
                    <button
                        class="py-3 px-6 my-2 bg-emerald-500 text-white fontmedium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration300">Cancelar</button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

