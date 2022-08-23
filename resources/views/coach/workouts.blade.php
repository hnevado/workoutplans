@if (is_null(Auth::user()->coach))
 <x-app-layout>
    <x-slot name="header">
     <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PLANES DE ENTRENAMIENTO') }}
        </h2>
        <a class="bg-gray-800 text-white rounded px-4 py-2" href="{{route('create-workout')}}">+ NUEVO</a>
     </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                  @foreach ($workouts as $workout)
                             <div>
                                <div class="text-gray-600 body-font">
                                    <div class="container px-5 mx-auto">
                                        <div class="p-5 pb-14 bg-white flex items-center mx-auto border-b  mb-10 border-gray-200 rounded-lg sm:flex-row flex-col">
                                        <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center flex-shrink-0">
                                          @if (is_null($workout->athlete) || is_null($workout->user->image))
                                            <img
                                            src="{{asset('img/default_profile.png')}}" 
                                            alt="Atleta corriendo en cinta"
                                            title="Atleta corriendo en cinta" />
                                          @else 

                                          <img
                                            src="{{ url('storage/'.$workout->user->image) }}" 
                                            alt="Fotografía de perfil de {{$workout->user->name}}"
                                            title="Fotografía de perfil de {{$workout->user->name}}" />
                                          


                                          @endif
                                        </div>
                                        <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                                            <h2 class="text-black text-2xl title-font font-bold mb-2 uppercase">
                                              @if (is_null($workout->athlete))
                                                <i class="text-red-400">- Atleta no asignado a este plan -</i> 
                                              @else 
                                                {{$workout->user->name}}
                                              @endif
                                              </h2>
                                            <p class="leading-relaxed text-base">Entrenamiento del {{date('d-m', strtotime($workout->start_date))}} al {{date('d-m', strtotime($workout->end_date))}} </p>
                                            @if ($workout->comments_athlete)
                                                <p class="leading-relaxed text-base mt-4 mb-4">
                                                    <span class="font-bold">Comentarios del atleta</span><br/> {{$workout->comments_athlete}}
                                                </p>
                                            @endif

                                            @if (
                                                !is_null($workout->feedback_monday) || 
                                                !is_null($workout->feedback_tuesday) ||
                                                !is_null($workout->feedback_wednesday) ||
                                                !is_null($workout->feedback_thursday) ||
                                                !is_null($workout->feedback_friday) ||
                                                !is_null($workout->feedback_saturday) ||
                                                !is_null($workout->feedback_sunday)

                                            )


                                            <p class="leading-relaxed text-base mt-4 mb-4 font-bold">
                                                Feedback del atleta
                                            </p>

                                            <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-7 gap-4">

                                             <!-- Feedback lunes -->   
                                              
                                             @if (!is_null($workout->feedback_monday))
                                              <div>
                                                <span class="uppercase">Lunes</span><br/>
                                                @if ($workout->feedback_monday == 0)
                                                   <x-happy-icon/>
                                                
                                                @elseif ($workout->feedback_monday == 1)
                                                    <x-normal-icon/>

                                                @elseif ($workout->feedback_monday == 2)
                                                    <x-sad-icon/>
                                                @endif
                                            </div>
                                              @endif
                                            <!-- fin feedback lunes -->

                                            <!-- Feedback martes -->
                                           
                                            @if (!is_null($workout->feedback_tuesday))
                                             <div>
                                              <span class="uppercase">Martes</span><br/>
                                               @if ($workout->feedback_tuesday == 0)
                                                 <x-happy-icon/>
                                               
                                               @elseif ($workout->feedback_tuesday == 1)
                                                 <x-normal-icon/>

                                               @elseif ($workout->feedback_tuesday == 2)
                                                 <x-sad-icon/>

                                              @endif

                                              </div>
                                            @endif
                                            
                                           <!-- fin feedback martes -->
                                        
                                           <!-- Feedback miercoles -->
                                           
                                           @if (!is_null($workout->feedback_wednesday))
                                             <div>
                                              <span class="uppercase">Miércoles</span><br/>
                                               @if ($workout->feedback_wednesday == 0)
                                                 <x-happy-icon/>
                                               
                                               @elseif ($workout->feedback_wednesday == 1)
                                                 <x-normal-icon/>

                                               @elseif ($workout->feedback_wednesday == 2)
                                                 <x-sad-icon/> 

                                              @endif

                                              </div>
                                            @endif
                                            
                                           <!-- fin feedback miercoles -->

                                           <!-- Feedback jueves -->
                                           
                                           @if (!is_null($workout->feedback_thursday))
                                             <div>
                                              <span class="uppercase">Jueves</span><br/>
                                               @if ($workout->feedback_thursday == 0)
                                                 <x-happy-icon/>
                                               
                                               @elseif ($workout->feedback_thursday == 1)
                                                 <x-normal-icon/>

                                               @elseif ($workout->feedback_thursday == 2)
                                                 <x-sad-icon/>

                                              @endif

                                              </div>
                                            @endif
                                            
                                           <!-- fin feedback jueves -->


                                           <!-- Feedback viernes -->
                                           
                                           @if (!is_null($workout->feedback_friday))
                                             <div>
                                               <span class="uppercase">Viernes</span><br/>
                                               @if ($workout->feedback_friday== 0)
                                                 <x-happy-icon/>
                                               
                                               @elseif ($workout->feedback_friday == 1)
                                                 <x-normal-icon/>

                                               @elseif ($workout->feedback_friday == 2)
                                                 <x-sad-icon/>

                                              @endif

                                              </div>
                                            @endif
                                            
                                           <!-- fin feedback viernes -->


                                           <!-- Feedback sábado -->
                                           
                                           @if (!is_null($workout->feedback_saturday))
                                             <div>
                                               <span class="uppercase">Sábado</span><br/>
                                               @if ($workout->feedback_saturday == 0)
                                                 <x-happy-icon/>
                                               
                                               @elseif ($workout->feedback_saturday == 1)
                                                 <x-normal-icon/>

                                               @elseif ($workout->feedback_saturday == 2)
                                                 <x-sad-icon/>

                                              @endif

                                              </div>
                                            @endif
                                            
                                           <!-- fin feedback sábado -->


                                           <!-- Feedback domingo -->
                                           
                                           @if (!is_null($workout->feedback_sunday))
                                             <div>
                                               <span class="uppercase">Domingo</span><br/>
                                               @if ($workout->feedback_sunday == 0)
                                                 <x-happy-icon/>
                                               
                                               @elseif ($workout->feedback_sunday == 1)
                                                 <x-normal-icon/>

                                               @elseif ($workout->feedback_sunday == 2)
                                                 <x-sad-icon/>

                                              @endif

                                              </div>
                                            @endif
                                            
                                           <!-- fin feedback domingo -->

                                            </div>

                                            @endif
                                            
                                            <div class="mt-6">
                                              <a href="{{route('workout',$workout)}}" class="bg-gray-800 text-white rounded px-4 py-2">Ver plan</a> 
                                              <a href="{{route('edit-workout',$workout)}}" class="bg-gray-800 text-white rounded px-4 py-2">Editar plan</a> 
                                              <a onclick="return confirm('¿Crear un nuevo plan de entrenamiento partiendo de este?')"
                                               href="{{route('duplicate',$workout)}}" 
                                               class="bg-gray-800 text-white rounded px-4 py-2">Duplicar plan</a>
                                            
                                              <form class="inline-block"
                                                    method="POST"
                                                    action="{{route('delete-workout',$workout)}}">
                                                    @csrf  
                                                    @method('DELETE')
                                                    <button
                                                     class="bg-gray-800 text-white rounded px-4 py-2" 
                                                     onclick="return confirm('Seguro que quieres eliminar el plan de entrenamiento?')">
                                                      Eliminar
                                                    </button>
                                              </form>
                                            </div>
                                        </div>

                                        

                                        </div>
                                    </div>
                                </div>
                            </div>

                  @endforeach
                </div>
            </div>
        </div>
    </div>
 </x-app-layout>
@endif 
