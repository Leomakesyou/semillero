@extends('layouts.master')

@section('title', 'Cargar tabla - ' . $project->display_name)

@section('content')

<p>Por favor seleccione para cada columna necesaria la columna
    del archivo que contiene la información requerida</p>
<form action="/{{ $project->name }}/table_upload/{{ $table_name }}"
    method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    @foreach ($columns as $i => $column)
        <label for="{{ $column['name'] }}">{{  $column['display_name']  }}</label>
        <select name="columns[{{ $column['name'] }}]" autocomplete="off">
            @foreach ($uploaded_columns->toArray() as $j => $ucolumn)

            <option value="{{ $ucolumn }}" 
                @if ($i < count($uploaded_columns) and $j == $i)
                    selected
                @endif
            >{{ $ucolumn }}</option>
            @endforeach
        </select>
        {{-- TODO: Proper form layout, not this <br> --}}
        <br>
    @endforeach
    <input type="submit" name="submit" value="Cargar">
</form>

@endsection