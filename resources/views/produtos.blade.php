@foreach ($produtos as $produto)
 <a href="{{route('deletar',['id'=>$produto->id]) }} {{$produto->nome}}">Produto</a>

@endforeach