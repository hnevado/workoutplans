<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 <div class="grid grid-cols-2 gap-4 mb-8">
                  <div class="text-left">
                    <a href="{{route('export',$workout)}}"><img 
                    src="{{asset('img/icon_pdf.png')}}"
                    alt="Descargar plan de entrenamiento en PDF"
                    title="Descargar plan de entrenamiento en PDF"
                    class="inline-block"> Descargar </a>
                  </div>

                  @if (is_null(Auth::user()->coach))
                    <div class="mt-2 text-right"><a href="{{route('duplicate',$workout)}}" class="bg-gray-800 text-white rounded px-4 py-2">Duplicar plan</a></div>
                    @endif
                </div>
                
                 <div class="mb-12 border p-2 text-center bg-slate-50">
                  
                  <p class="mb-2 mt-2 font-bold">
                    Entrenamiento del {{date("d-m-Y",strtotime($workout->start_date))}} al {{date("d-m-Y",strtotime($workout->end_date))}}
                  </p>
                
                  <p class="mt-4 mb-2"> {{$workout->comments_coach}} </p>

                </div>

                

                  <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-7 gap-2">
                    <div class="bg-orange-100 p-2 mb-8"> 
                       <h2 class="uppercase font-bold text-xl">Lunes</h2>
                       <hr class="mb-4"/>
                       <!-- !! para interpretar los saltos de linea -->
                       {!! nl2br(e($workout->training_monday)) !!}
                  
                       @if (is_null($workout->feedback_monday))
                        
                       <p class="mt-10 mb-4"><hr class="pt-4" />¿Qué tal el entrenamiento?</p>
                         
                         <x-happy-icon/>
                         <x-normal-icon/> 
                         <x-sad-icon/>
                          
                       @else 
                        <p class="mt-10 mb-4">
                         @if ($workout->feedback_monday == 0)
                          <x-happy-icon/>
                                                
                         @elseif ($workout->feedback_monday == 1)
                          <x-normal-icon/>

                         @elseif ($workout->feedback_monday == 2)
                          <x-sad-icon/>
                        @endif
                        </p>
                       @endif
                     </div>
                    
                     <div class="mb-8 p-2 bg-gray-100"> 
                       <h2 class="uppercase font-bold text-xl">Martes</h2>
                       <hr class="mb-4"/>

                       {!! nl2br(e($workout->training_tuesday)) !!}

                       @if (is_null($workout->feedback_tuesday))
                        
                       <p class="mt-10 mb-4"><hr class="pt-4" />¿Qué tal el entrenamiento?</p>
                         
                         <x-happy-icon/>
                         <x-normal-icon/> 
                         <x-sad-icon/>
                          
                       @else 
                        <p class="mt-10 mb-4">
                         @if ($workout->feedback_tuesday == 0)
                          <x-happy-icon/>
                                                
                         @elseif ($workout->feedback_tuesday == 1)
                          <x-normal-icon/>

                         @elseif ($workout->feedback_tuesday == 2)
                          <x-sad-icon/>
                        @endif
                        </p>
                       @endif

                     </div>

                     <div class="mb-8 p-2 bg-orange-100"> 
                       <h2 class="uppercase font-bold text-xl">Miércoles</h2>
                       <hr class="mb-4"/>
                       {!! nl2br(e($workout->training_wednesday)) !!}
                       @if (is_null($workout->feedback_wednesday))
                        
                       <p class="mt-10 mb-4"><hr class="pt-4" />¿Qué tal el entrenamiento?</p>
                         
                         <x-happy-icon/>
                         <x-normal-icon/> 
                         <x-sad-icon/>
                          
                       @else 
                        <p class="mt-10 mb-4">
                         @if ($workout->feedback_wednesday == 0)
                          <x-happy-icon/>
                                                
                         @elseif ($workout->feedback_wednesday == 1)
                          <x-normal-icon/>

                         @elseif ($workout->feedback_wednesday == 2)
                          <x-sad-icon/>
                        @endif
                        </p>
                       @endif
                     </div>

                     <div class="mb-8 p-2 bg-gray-100"> 
                       <h2 class="uppercase font-bold text-xl">Jueves</h2>
                       <hr class="mb-4"/>
                       {!! nl2br(e($workout->training_thursday)) !!}
                       @if (is_null($workout->feedback_thursday))
                        
                       <p class="mt-10 mb-4"><hr class="pt-4" />¿Qué tal el entrenamiento?</p>
                         
                         <x-happy-icon/>
                         <x-normal-icon/> 
                         <x-sad-icon/>
                          
                       @else 
                        <p class="mt-10 mb-4">
                         @if ($workout->feedback_thursday == 0)
                          <x-happy-icon/>
                                                
                         @elseif ($workout->feedback_thursday == 1)
                          <x-normal-icon/>

                         @elseif ($workout->feedback_thursday == 2)
                          <x-sad-icon/>
                        @endif
                        </p>
                       @endif
                     </div>


                     <div class="mb-8 p-2 bg-orange-100"> 
                       <h2 class="uppercase font-bold text-xl">Viernes</h2>
                       <hr class="mb-4"/>
                       {!! nl2br(e($workout->training_friday)) !!}
                       @if (is_null($workout->feedback_friday))
                        
                       <p class="mt-10 mb-4"><hr class="pt-4" />¿Qué tal el entrenamiento?</p>
                         
                         <x-happy-icon/>
                         <x-normal-icon/> 
                         <x-sad-icon/>
                          
                       @else 
                        <p class="mt-10 mb-4">
                         @if ($workout->feedback_friday == 0)
                          <x-happy-icon/>
                                                
                         @elseif ($workout->feedback_friday == 1)
                          <x-normal-icon/>

                         @elseif ($workout->feedback_friday == 2)
                          <x-sad-icon/>
                        @endif
                        </p>
                       @endif
                     </div>


                     <div class="mb-8 p-2 bg-gray-100"> 
                       <h2 class="uppercase font-bold text-xl">Sábado</h2>
                       <hr class="mb-4"/>
                       {!! nl2br(e($workout->training_saturday)) !!}
                       @if (is_null($workout->feedback_saturday))
                        
                       <p class="mt-10 mb-4"><hr class="pt-4" />¿Qué tal el entrenamiento?</p>
                         
                         <x-happy-icon/>
                         <x-normal-icon/> 
                         <x-sad-icon/>
                          
                       @else 
                        <p class="mt-10 mb-4">
                         @if ($workout->feedback_saturday == 0)
                          <x-happy-icon/>
                                                
                         @elseif ($workout->feedback_saturday == 1)
                          <x-normal-icon/>

                         @elseif ($workout->feedback_saturday == 2)
                          <x-sad-icon/>
                        @endif
                        </p>
                       @endif
                     </div>




                     <div class="mb-8 p-2 bg-orange-100"> 
                       <h2 class="uppercase font-bold text-xl">Domingo</h2>
                       <hr class="mb-4"/>
                       {!! nl2br(e($workout->training_sunday)) !!}
                       @if (is_null($workout->feedback_sunday))
                        
                       <p class="mt-10 mb-4"> <hr class="pt-4" />¿Qué tal el entrenamiento?</p>
                         
                         <x-happy-icon/>
                         <x-normal-icon/> 
                         <x-sad-icon/>
                          
                       @else 
                        <p class="mt-10 mb-4">
                         @if ($workout->feedback_sunday == 0)
                          <x-happy-icon/>
                                                
                         @elseif ($workout->feedback_sunday == 1)
                          <x-normal-icon/>

                         @elseif ($workout->feedback_sunday == 2)
                          <x-sad-icon/>
                        @endif
                        </p>
                       @endif
                     </div>



                    </div>



                    <div class="mt-12 border p-2 text-center bg-slate-50">
                  
                        <h2 class="mb-2 mt-2 font-bold text-2xl">
                            ¿Qué tal ha ido la semana? 
                        </h2>
                        
                        <p class="mt-4 mb-8">
                          Puedes dejar comentarios aquí para tu entrenador indicándole como te has encontrado durante la semana, para que así 
                          lo tenga en cuenta para futuros planes de entrenamiento.
                        </p>

                        <form name="comments" method="POST" action="{{route('storecomment',$workout)}}">
                            @method('PUT')
                            @csrf 
                            <textarea
                             name="comments_athlete"
                             placeholder="Por ejemplo: En general me he encontrado con muy buenas sensaciones durante la semana."
                             rows="5" 
                             class="w-full 
                              block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 
                              focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              @if (is_null(Auth::user()->coach))
                               readonly
                              @endif
                              
                              >{{$workout->comments_athlete}}</textarea>
                              <span class="text-xs text-red-600">@error('comments_athlete') {{ $message }} @enderror</span>
                              @if (!is_null(Auth::user()->coach))
                               <input class="mt-8 bg-gray-800 text-white rounded px-4 py-2" type="submit" value="GUARDAR">
                              @endif
                        </form>
                    </div>

                    





                </div>
            </div>
        </div>
    </div>
</x-app-layout>