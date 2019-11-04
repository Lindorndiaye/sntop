@if($marques)
    <option value="">--Selectionner--</option>
    @foreach($marques as $marque)
        <option value="{{$marque->id}}" >{{$marque->title}}</option>
    @endforeach
@else
    pas de marque
@endif
