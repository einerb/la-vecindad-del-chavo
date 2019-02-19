{!! Form::open(['route'=>['personajes.destroy',$persona->slug], 'method'=>'DELETE']) !!} {!! Form::submit('Eliminar', ['class'=>'btn btn-sm btn-danger']) !!}
{!! Form::close() !!}