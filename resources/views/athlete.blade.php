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
                    @foreach ($workouts as $workout)

                      <div>
                                <div class="text-gray-600 body-font">
                                    <div class="container px-5 mx-auto">
                                        <div class="p-5 pb-14 bg-white flex items-center mx-auto border-b  mb-10 border-gray-200 rounded-lg sm:flex-row flex-col">
                                        <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center flex-shrink-0">
                                            <img
                                            src="{{asset('img/default_profile.png')}}" 
                                            alt="Atleta corriendo en cinta"
                                            title="Atleta corriendo en cinta" />
                                        </div>
                                        <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                                          <h2 class="text-black text-2xl title-font font-bold mb-2 uppercase">
                                            Entrenamiento del {{date('d-m', strtotime($workout->start_date))}} al {{date('d-m', strtotime($workout->end_date))}} 
                                          </h2>
                                            
                                            @if (!is_null($workout->comments_athlete))

                                             <p class="leading-relaxed text-base">
                                                {{$workout->comments_coach}}
                                             </p>

                                            @endif
                                            <a class="mt-3 text-indigo-500 inline-flex items-center" href="{{route('workout',$workout)}}">Ver entrenamiento</a>

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
