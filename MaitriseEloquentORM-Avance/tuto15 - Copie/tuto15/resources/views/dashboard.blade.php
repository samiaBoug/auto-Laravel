@extends('layouts.app')

@section('content')
    <table class="table">
       <tr>
        <td>Nom</td>
        <td>Email</td>
       </tr>
       <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
       </tr>
</table>
@endsection
