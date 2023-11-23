<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Bici') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('bicicletas.modificar', ['bicicleta'=>$bicicleta])}}" method="POST">
                        @csrf
                        <label for="">Marca</label>
                        <input type="text" name="marca" value="{{$bicicleta->marca}}">
                        <br>
                        <br>
                        <label for="">Ruedas</label>
                        <input type="text" name="ruedas" value="{{$bicicleta->ruedas}}">
                        <br>
                        <br>
                        <input type="submit" value="Enviar">
                    </form>
                    <br><br>
                    <a href="{{ route('dashboard') }}">Volver</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
