<x-app-layout>
    <x-slot name="header">
     <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CAMBIO DE ENTRENADOR') }}
        </h2>
        <a class="bg-gray-800 text-white rounded px-4 py-2" href="{{route('dashboard')}}">&lt; ATRÁS</a>
     </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                  <h2 class="font-bold text-2xl">¡Hola!</h2>
                  <p class="mt-8">
                    
                     <span class="font-bold">{{$name}}</span> ya estaba dado de alta en la plataforma con el email <span class="font-bold">{{$email}}</span>
                     Para que puedas empezar a entrenar con él, debe elegirte como entrenador, para ello, habrá recibido un email  
                     para aceptar este cambio. Si no lo ve en bandeja de entrada, deberá consultar su bandeja de <span class="font-bold">SPAM</span>
                  </p>

                  <p class="mt-8">
                    No obstante, si lo prefieres, pásale el siguiente enlace y podrá autorizar el cambio sin necesidad de revisar su correo:
                   </p>

                   <p class="mt-8">

                        <div class="relative mb-3 w-full">

                            <input
                            type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="copy-target"
                            placeholder="" value="http://localhost:8000/changecoach/{{base64_encode($email)}}/{{base64_encode($coach)}}/"/>
                            
                        </div>
            
            

                     
                   </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
