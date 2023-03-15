=======================================================================================
//PRINT//
=======================================================================================
@include('includes.header') //incluir archivos//
<h1>{{$titulo}}</h1> //imprime
<p>{{!! date('Y') !!}}</p> //codigo comentado//
{{ $director or 'No hay director' }} //mostrar si existe, sino msj//
=======================================================================================
//RUTAS// 
=======================================================================================
<a href="{{route('home')}}">Ir al home</a>
<a href="{{route('blog')}}">Ir al blog</a>
=======================================================================================
//IF//
=======================================================================================
@if($titulo && count(listado)>=5)
<h1>El titulo existe y es este: {{$titulo}} y el listado es mayor a 5</h1>
@elseif($titulo)
<h1>El titulo existe y es este: {{$titulo}} y el listado es menor a 5</h1>
@else
<h1>El titulo no existe</h1>
@endif
=======================================================================================
//FOR//
=======================================================================================
@for($i=0; $i
<=20; $i++) El numero es: {{$i}} <br />
@endfor
=======================================================================================
//FOREACH//
=======================================================================================
@foreach($listado as $pelicula)
<p>{{$pelicula}}</p>
@endforeach
=======================================================================================
//WHILE//
=======================================================================================
<?php $contador = 1; ?>
@while($contador<50) <?php $contador++; ?> 
@endwhile 
=======================================================================================
//SECCIONES//  https://platzi.com/clases/3039-laravel/49362-templates/
=======================================================================================
//PAGINA RECEPTORA +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<body>
    @extends('planilla') //trae el html del archivo

    @section('header')   //BLOQUE//
        CABECERA DE LA WEB (master)
    @show

    section('header')  //AGREGANDO AL BLOQUE//
        @parent() //TRAE LO QUE CONTIENE//
        <h2>hola</h2> //AGREGA//
    @stop

    section('titulo', 'master en PHP') //AGREGAR UN TITULO

    <div>
        @yield('content') //NO tiene un contenido predeterminado//
    </div>

    @section('footer')
        PIE DE PAGINA DE LA WEB
    @show
</body>
//PAGINA EMISORA +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

@section('content')         //modificando bloques//
    <h1>bloque modificado</h1>
@stop
 
section('titulo','JUAN CRUZ CORDONEDA') //modificando bloques por param//


