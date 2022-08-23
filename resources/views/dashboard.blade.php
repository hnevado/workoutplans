<x-app-layout>
    <x-slot name="header">
     <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TUS ATLETAS') }}
        </h2>
        <a class="bg-gray-800 text-white rounded px-4 py-2" href="{{route('create-athlete')}}">+ NUEVO</a>
     </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @include("coach/forms/_search_athlete_form")

                @if(is_null($usuario->coach))

                  @foreach ($atletas as $atleta)
                            <div>
                                <div class="text-gray-600 body-font">
                                    <div class="container px-5 mx-auto">
                                        <div class="p-5 pb-14 bg-white flex items-center mx-auto border-b  mb-10 border-gray-200 rounded-lg sm:flex-row flex-col">
                                        <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center flex-shrink-0">
                                          @if (is_null($atleta->image))
                                            <img
                                            src="{{asset('img/default_profile.png')}}" 
                                            alt="Atleta corriendo en cinta"
                                            title="Atleta corriendo en cinta" />
                                          @else 

                                          <img
                                            src="{{ url('storage/'.$atleta->image) }}" 
                                            alt="Fotografía de perfil de {{$atleta->name}}"
                                            title="Fotografía de perfil de {{$atleta->name}}" />
                                          


                                          @endif
                                        </div>
                                        <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                                            <h2 class="text-black text-2xl title-font font-bold mb-2 uppercase">{{$atleta->name}}</h2>
                                            <p class="leading-relaxed text-base">{{$atleta->excerpt}}</p>
                                            
                                            <div class="mt-6">
                                              <a href="{{route('edit-athlete',$atleta)}}" class="bg-gray-800 text-white rounded px-4 py-2">Ver atleta</a> 
                                              <a href="{{route('workouts',$atleta)}}" class="bg-gray-800 text-white rounded px-4 py-2">Ver entrenamientos</a>
                                              <form class="inline-block" method="POST" action="{{route('delete-athlete',$atleta)}}"> 
                                                 @csrf
                                                 @method('DELETE')
                                                <button onclick="return confirm('Estás seguro de eliminar el atleta? Se eliminarán todos sus planes de entrenamiento')"
                                                class="bg-gray-800 text-white rounded px-4 py-2">Eliminar</button>
                                              </form>
                           
                                            </div>
                                            

                                        </div>

                                        

                                        </div>
                                    </div>
                                </div>
                            </div>
                @endforeach

                    
                @else
                  No tienes permisos para ver esta página
                @endif

                    {{$usuario->coach}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
