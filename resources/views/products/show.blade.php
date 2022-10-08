@extends('layouts.admin')

@section('content')

<div class="card">
   <div class="card-header">{{ __('View Product') }}</div>

   <div class="card-body">



      <br /><br />


      <div class="card">
         <div class="card-body">
            <h4 class="card-title">{{$data->name}}</h4>
            <p class="card-text">{{$data->description}}</p>
            <p class="card-text">{{$data->price}}</p>
         </div>
      </div>

    



   </div>
</div>

@endsection