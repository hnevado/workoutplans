            @csrf
          <div class="mb-12">
            <input class="bg-gray-800 text-white rounded px-4 py-2 cursor-pointer" type="reset" value="LIMPIAR PANTALLA">
          </div>
                <!-- 
                  'sm': '640px'
                  'md': '768px'
                  'lg': '1024px'
                  'xl': '1280px'
                  '2xl': '1536px'
                 -->

                @if (old('start_date', $workout->start_date))
                  @php $date_start=$workout->start_date; @endphp
                @else
                  @php $date_start=date('Y-m-d', strtotime('monday next week')); @endphp
                @endif


                @if (old('end_date', $workout->end_date))
                  @php $date_end=$workout->end_date; @endphp
                @else
                  @php $date_end=date('Y-m-d', strtotime('sunday next week')); @endphp
                @endif

                <div class="mb-12 border p-2 text-center">
                  
                  <p class="mb-2 mt-2">
                    <span title="Semana anterior" id="btn_last_week" class="text-2xl align-middle bg-black rounded text-white p-2 cursor-pointer mr-5">&lt;</span> 

                    Entrenamiento del 
                    <input readonly type="date" name="start_date" value="{{$date_start}}"> 
                    <span class="text-xs text-red-600">@error('start_date') {{ $message }} @enderror</span>
                    al 
                    <input readonly type="date" name="end_date" value="{{$date_end}}">
                    <span class="text-xs text-red-600">@error('end_date') {{ $message }} @enderror</span> 
                    para 
                    <select name="athlete">
                      <option value="">- Selecciona un atleta - </option>
                      @foreach ($atletas as $atleta)
                      <option value="{{$atleta->id}}" {{$atleta->id == $workout->athlete ? 'selected' : ''}} >{{$atleta->name}}</option>

                      @endforeach
                    </select>
                    <span class="text-xs text-red-600">@error('athlete') {{ $message }} @enderror </span>
                    <span title="Semana Siguiente" id="btn_next_week" class="ml-5 text-2xl align-middle bg-black rounded text-white p-2 cursor-pointer">&gt;</span>
                  </p>
                
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <div> 
                       <h2 class="uppercase font-bold text-xl">Lunes</h2>
                       <hr class="mb-4"/>
                       <textarea
                         name="training_monday"
                         placeholder="Escribe el entrenamiento del lunes para tu atleta. Si no rellenas nada, este día se marcara como descanso"
                         rows="10" 
                         class="w-full 
                              block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 
                              focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('training_monday', $workout->training_monday) }}</textarea>
                              <span class="text-xs text-red-600">@error('training_monday') {{ $message }} @enderror</span>
                     </div>
                    
                     <div> 
                       <h2 class="uppercase font-bold text-xl">Martes</h2>
                       <hr class="mb-4"/>
                       <textarea 
                         name="training_tuesday"
                         placeholder="Escribe el entrenamiento del martes para tu atleta. Si no rellenas nada, este día se marcara como descanso"
                         rows="10"
                         class="w-full 
                              block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 
                              focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('training_tuesday', $workout->training_tuesday) }}</textarea>
                              <span class="text-xs text-red-600">@error('training_tuesday') {{ $message }} @enderror</span>
                     </div>

                     <div> 
                       <h2 class="uppercase font-bold text-xl">Miércoles</h2>
                       <hr class="mb-4"/>
                       <textarea 
                         name="training_wednesday"
                         placeholder="Escribe el entrenamiento del miércoles para tu atleta. Si no rellenas nada, este día se marcara como descanso"
                         rows="10"
                         class="w-full 
                              block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 
                              focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('training_wednesday', $workout->training_wednesday) }}</textarea>
                              <span class="text-xs text-red-600">@error('training_wednesday') {{ $message }} @enderror</span>
                     </div>

                     <div> 
                       <h2 class="uppercase font-bold text-xl">Jueves</h2>
                       <hr class="mb-4"/>
                       <textarea 
                         name="training_thursday"
                         placeholder="Escribe el entrenamiento del jueves para tu atleta. Si no rellenas nada, este día se marcara como descanso"
                         rows="10"
                         class="w-full 
                              block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 
                              focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('training_thursday', $workout->training_thursday) }}</textarea>
                              <span class="text-xs text-red-600">@error('training_thursday') {{ $message }} @enderror</span>
                     </div>


                     <div> 
                       <h2 class="uppercase font-bold text-xl">Viernes</h2>
                       <hr class="mb-4"/>
                       <textarea 
                         name="training_friday"
                         placeholder="Escribe el entrenamiento del viernes para tu atleta. Si no rellenas nada, este día se marcara como descanso"
                         rows="10"
                         class="w-full 
                              block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 
                              focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('training_friday', $workout->training_friday) }}</textarea>
                              <span class="text-xs text-red-600">@error('training_friday') {{ $message }} @enderror</span>
                     </div>


                     <div> 
                       <h2 class="uppercase font-bold text-xl">Sábado</h2>
                       <hr class="mb-4"/>
                       <textarea 
                         name="training_saturday"
                         placeholder="Escribe el entrenamiento del sábado para tu atleta. Si no rellenas nada, este día se marcara como descanso"
                         rows="10"
                         class="w-full 
                              block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 
                              focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('training_saturday', $workout->training_saturday) }}</textarea>
                              <span class="text-xs text-red-600">@error('training_saturday') {{ $message }} @enderror</span>
                     </div>




                     <div> 
                       <h2 class="uppercase font-bold text-xl">Domingo</h2>
                       <hr class="mb-4"/>
                       <textarea
                         name="training_sunday"
                         placeholder="Escribe el entrenamiento del domingo para tu atleta. Si no rellenas nada, este día se marcara como descanso"
                         rows="10" 
                         class="w-full 
                              block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 
                              focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('training_sunday', $workout->training_sunday) }}</textarea>
                              <span class="text-xs text-red-600">@error('training_sunday') {{ $message }} @enderror</span>
                     </div>

                     <div> 
                       <h2 class="uppercase font-bold text-xl text-red-700">Observaciones</h2>
                       <hr class="mb-4"/>
                       <textarea
                         name="comments_coach"
                         placeholder="¿Algún comentario que quieras hacer a tu atleta sobre la semana de entrenamiento?"
                         rows="10" 
                         class="w-full 
                              block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 
                              focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('comments_coach', $workout->comments_coach) }}</textarea>
                              <span class="text-xs text-red-600">@error('comments_coach') {{ $message }} @enderror</span>
                     </div>


                </div>

                <input class="mt-8 bg-gray-800 text-white rounded px-4 py-2" type="submit" value="GUARDAR">