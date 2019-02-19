<div class="form-group">
    {!! Form::label('name', 'Foto del personaje *') !!}<br> {!! Form::file('foto',['required'=>true]) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Título del personaje') !!} {!! Form::text('titulo', null, ['class'=> 'form-control', 'placeholder'=>
    'Título del personaje', 'autofocus'=> true, 'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Nombre del personaje *') !!} {!! Form::text('nombre', null, ['class'=> 'form-control', 'placeholder'=>
    'nombre del personaje', 'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Número apartamento') !!} {!! Form::text('apartamento', null, ['class'=> 'form-control', 'placeholder'=>
    '# apartamento', 'autocomplete'=>'off']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Descripción *') !!} {!! Form::textarea('descripcion', null, ['class'=> 'form-control', 'rows' =>
    4, 'cols', 'placeholder'=> 'Escribir alguna descripción...', 'style' => 'resize:none']) !!}
</div>