@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Form Details</h3>
        </div>
        <div class="card-body">
            <p><strong>First Name:</strong> {{$data1->first_name}}</p>
            <p><strong>Last Name:</strong> {{$data1->last_name}}</p>
            <p><strong>Email:</strong> {{$data1->email}}</p>
            <p><strong>Gender:</strong> {{$data1->gender}}</p>
        </div>
    </div>
</div> 
            @endsection