@extends('layouts.admin')


@section('styles')
<style>
  body {
    background: steelblue;
  }

  .card {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    cursor: default;
    width: 200px;
    height: 350px;
    background: white;
    border-radius: 15px;
    text-align: center;
    line-height: 350px;
    font-size: 100px;
    -webkit-animation: rotate 7s linear infinite;
    -moz-animation: rotate 7s linear infinite;
    animation: rotate 7s linear infinite;
    margin: 0 auto;
    position: relative;
    top: 70px;
  }

  .ace1 {
    position: relative;
    font-size: 30px;
    top: -340px;
    left: -80px;
    line-height: 20px;
  }

  .ace_club1 {
    position: relative;
    left: -5px;
    top: 5px;
  }

  .ace2 {
    position: relative;
    font-size: 30px;
    top: 250px;
    left: 155px;
    line-height: 20px;
    -webkit-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -o-transform: rotate(180deg);
    transform: rotate(180deg);
  }

  .ace_club2 {
    position: relative;
    left: -5px;
    top: 5px;
  }

  .wrapper {
    -webkit-perspective: 25em;
    -moz-perspective: 25em;
    perspective: 25em;
  }

  @-webkit-keyframes rotate {
    100% {
      -webkit-transform: rotatey(360deg);
    }
  }

  @-moz-keyframes rotate {
    100% {
      -moz-transform: rotatey(360deg);
    }
  }

  @keyframes rotate {
    100% {
      transform: rotatey(360deg);
    }
  }
</style>
@endsection

@section('content')



<div class="container">
  <div class="row">
    <div class="col text-center">
      <img src="{{asset('logos/logo.png')}}" class="img-fluid rounded-circle" alt="">
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="container">
        <div class="card" data-label="In Progress">
          <div class="card2" data-label="In Progress">
            <div class="card__container">
              <h1 class="card__header"> {{$estu}}</h1>
              <p class="card__body">
                ESTUDIANTES REGISTRADOS
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-4">
      <div class="container">
        <div class="card" data-label="In Progress">
          <div class="card2" data-label="In Progress">
            <div class="card__container">
              <h1 class="card__header">
                {{$profe}}
              </h1>
              <p class="card__body">
                PROFESORES REGISTRADOS
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="container">
        <div class="card" data-label="In Progress">
          <div class="card2" data-label="In Progress">
            <div class="card__container">
              <h1 class="card__header">
                {{$user}}
              </h1>
              <p class="card__body">
                MAESTROS REGISTRADOS
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


@endsection