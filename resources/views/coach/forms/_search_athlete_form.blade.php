<form autocomplete="off" action="{{route('search')}}">
    @csrf
    <div class="mb-4 text-center">
      <input 
       class="shadow appearance-none border rounded w-2/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
       name="search" 
       type="text" 
       placeholder="Nombre del atleta"
       value="{{$search}}">
      <button 
       class="bg-gray-800 text-white rounded px-4 py-2" 
        type="submit">
        Buscar
      </button>
      <a 
       href="{{route('dashboard')}}"
       class="bg-gray-800 text-white rounded px-4 py-2">
        Reiniciar
      </a>
    </div>
    <hr/>
</form>