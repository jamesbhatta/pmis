@extends('user_app')
@section('content')
@include('navbar')
<div style="background-color:#edf2f8; height: 120px;"></div>
<div style="background-color: #edf2f8;width:100%;">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 mt-3">
        <div class="">
          <div class="p-3 h4 font-weight-bold text-white text-center" style="background-color:#0603ab; border-radius: 4px;">
            <span>डाटासेटहरु</span>
          </div>
          <div class="text-left text-dark h5 card1" style="background-color: #c68c53; overflow:scroll; height:65vh;">
            @foreach ($organizations as $organization)
            <div class=" p-3 mb-1">
              <span><a href="{{route('physical-infrastruture.all-offices',$organization)}}">{{$organization->name}}</a> </span>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="row p-3" style="border-radius: 10px;">
          @foreach($organizations as $organization)
          <div class="col-lg-4 mb-3">
            <a href="{{route('physical-infrastruture.all-offices',$organization)}}" class="card p-3 ripple" style="background-color: #004d00; height:100%;">
              <span class="row">
                <h4 class="text-white m-4 text-center h5">{{$organization->name}}</h4>
              </span>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<style>
  #navbar {
    background: linear-gradient(to right, #3f0fb7, #1e78de);
    box-shadow: 0 3px 6px 0 rgb(0 0 0 / 12%) !important;
    font-family: "Roboto", sans-serif;
    position: fixed;
    width: 100vw;
  }

  .card1 {
    border-radius: 4px;
  }

  .card1 div span a {
    color: black;

  }

  .card1 div:hover {
    background-color: #4d3300;
    color: #fff;
    border-radius: 4px;
  }

  .card1 div:hover span a {
    color: #fff;
  }

  .card1::-webkit-scrollbar {
    display: none;
    /* Safari and Chrome */
  }
</style>