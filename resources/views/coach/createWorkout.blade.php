<x-app-layout>
    <x-slot name="header">
     <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('NUEVO PLAN DE ENTRENAMIENTO') }}
        </h2>
        <a class="bg-gray-800 text-white rounded px-4 py-2" href="{{route('dashboard')}}">&lt; ATRÁS</a>
     </div>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white mx-auto sm:px-6 lg:px-8 p-8">
        <form name="entrenamiento" method="POST" action="{{route('storeworkout')}}" autocomplete="off">
            @include("coach/forms/_create_workout_form")
        </form>
        </div>
      </div>
    </div>
</x-app-layout>
