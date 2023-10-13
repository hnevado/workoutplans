 <x-app-layout>
    <x-slot name="header">
     <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('NUEVO ENTRENADOR') }}
        </h2>
     </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center">
                <div class="p-6 bg-white border-b border-gray-200">
                <p class="mb-6"><span class="font-bold">{{$coach}}</span> quiere que ser tu entrenador a partir de ahora y llevar tu plan de entrenamiento.</p>
                <p>¿Estás seguro/a de que quieres cambiar tu entrenador? <span class="font-bold">esta acción es irreversible</span></p>

                    <form method="POST" action="{{route('changecoachaccepted',Auth::id())}}">
                      @method('PUT')  
                      @csrf
                      <input type="hidden" name="idUsuario" value="{{Auth::id()}}">
                      <input type="hidden" name="idCoach" value="{{$idCoach}}">
                      <input type="hidden" name="url" value="{{$url}}">
                      <x-button class="mt-6">
                            {{ __('ENTENDIDO. CAMBIAR DE ENTRENADOR') }}
                      </x-button>
                    </form> 
                      

                </div>
            </div>
        </div>
    </div>
 </x-app-layout>

