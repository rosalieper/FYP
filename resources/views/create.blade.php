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
    <form method="post" action="{{url('/create/ticket')}}">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="name">Student name:</label>
            <input type="text" class="form-control" name="name"/>
        </div>
        <div class="form-group">
            <label for="option">Description:</label>
            <textarea cols="5" rows="5" class="form-control" name="option"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection