@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
    <form method="post" action="{{action('TicketController@update', $id)}}" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">Ticket Title:</label>
            <input type="text" class="form-control" name="title" value={{$ticket->title}} />
        </div>
        <div class="form-group">
            <label for="description">Ticket Description:</label>
            <textarea cols="5" rows="5" class="form-control" name="description">{{$ticket->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection