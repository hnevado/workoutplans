@csrf 

<p>
    <label class="uppercase text-gray-700 text-xs">Nombre</label>
    <span class="text-xs text-red-600">@error('name') {{ $message }} @enderror</span>
</p>

<p>
    <input type="text" name="name" class="rounded border-gray-200 w-full mb-4" value="{{ old('name', $user->name) }}">
</p>

<p>
    <label class="uppercase text-gray-700 text-xs">Email</label>
    <span class="text-xs text-red-600">@error('email') {{ $message }} @enderror</span>
</p>

<p>
    <input type="email" name="email" class="rounded border-gray-200 w-full mb-4" value="{{ old('email', $user->email) }}">
</p>

<p>
    <label class="uppercase text-gray-700 text-xs">Contraseña de acceso</label>
    <span class="text-xs text-red-600">@error('password') {{ $message }} @enderror</span>
</p>

<p>
    <input type="text" name="password" class="rounded border-gray-200 w-full mb-4">
</p>

@if ($user->image != "")
 <p class="mt-4 mb-4"><img class="w-28" src="{{ url('storage/'.$user->image) }}"></p>
@endif


<div class="flex justify-between items-center">

  <a href="{{ route('dashboard') }}" class="text-indigo-600">&lt; Volver</a>

  <input type="submit" value="Guardar" class="bg-gray-800 text-white rounded px-4 py-2">

</div>