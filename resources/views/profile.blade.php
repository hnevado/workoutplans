<x-app-layout>
    <x-slot name="header">
     <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MI PERFIL') }}
        </h2>
        <a class="bg-gray-800 text-white rounded px-4 py-2" href="{{route('dashboard')}}">&lt; ATRÁS</a>
     </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 @if (Auth::user()->id === $user->id)
                 <form method="POST" 
                       enctype="multipart/form-data" 
                       action="{{route('updateathlete', $user)}}" 
                       autocomplete="off">
                       @method('PUT')
                       @include("athlete/forms/_athlete_form")
                  </form>
                 @else 
                  <p>No tienes permisos para editar este perfil</p>
                 @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
