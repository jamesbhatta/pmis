@extends('user_app')
@section('content')
@include('navbar')
<div style="background-color:#edf2f8; height: 120px;"></div>
<div style="background-color: #edf2f8;width:100%;height:100vh;">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 mt-3">
        <div class="">
          <div class="p-3 h4 font-weight-bold text-white text-center" style="background-color:#0603ab; border-radius: 4px;">
            <span>डाटासेटहरु</span>
          </div>
          <div class="text-left text-dark h5 card1" style="background-color: #c68c53;">
            <div class=" p-3 mt-1">
              <span><a href="{{route('physical-infrastruture','1')}}">@lang('navigation.Ministry_of_Physical_Transport')</a> </span>
            </div>
            <div class="p-3 mt-1">
              <span><a href="{{route('physical-infrastruture','2')}}">@lang('navigation.water_irrigation')</a></span>
            </div>
            <div class="p-3 mt-1">
              <span><a href="{{route('physical-infrastruture','3')}}">@lang('navigation.Drinking_Water_Office')</a></span>
            </div>
            <div class="p-3 mt-1">
              <span><a href="{{route('physical-infrastruture','4')}}">@lang('navigation.patharaiya_mohna_sichaiya')</a></span>
            </div>
            <div class="p-3 mt-1">
              <span><a href="{{route('physical-infrastruture','5')}}">@lang('navigation.urban_development')</a></span>
            </div>
            <div class="p-3 mt-1">
              <span><a href="{{route('physical-infrastruture','6')}}">@lang('navigation.urban_development')</a></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="row p-3" style="border-radius: 10px;">
          <div class="col-lg-4">
            <a href="{{route('physical-infrastruture','1')}}" class="card p-3" style="background-color: #4d4d33; height:100%;">
              <span class="text-white row">
                <i class="fa fa-address-card fa-3x col-lg-3" aria-hidden="true"></i>
                <label class="ml-2 col-lg-8">{{$complete_vautik}}/{{$total_vautik}} COMPLETED</label>
                </span>
                <h4 class="text-white mt-4 text-center h5">@lang('navigation.Ministry_of_Physical_Transport')</h4>
            </a>
          </div>
          <div class="col-lg-4">
            <div class="card" style="background-color:#000099; height:100%;">
              <a href="{{route('physical-infrastruture','2')}}" class="p-3">
                <span class="text-white row">
                  <i class="fa fa-address-card fa-3x col-lg-3" aria-hidden="true"></i>
                  <label class="ml-2 col-lg-8">{{$complete_jalsrot}}/{{$total_jalsrot}} COMPLETED</label>
                  </span>
                  <h4 class="text-white mt-4 text-center h5">@lang('navigation.water_irrigation')</h4>
              </a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card" style="background-color: #004d00; height:100%;">
              <a href="{{route('physical-infrastruture','3')}}" class="p-3">
                <span class="text-white row">
                  <i class="fa fa-address-card fa-3x col-lg-3" aria-hidden="true"></i>
                 <label for="" class="ml-2 col-lg-8">{{$complete_kahenpani}}/{{$total_kahenpani}} COMPLETED </label>
                  <h4 class="mt-4 text-center h5">@lang('navigation.Drinking_Water_Office')</h4>
                </span>
              </a>
            </div>
          </div>
          <div class="col-lg-4 mt-4">
            <div class="card" style="background-color: #660000; height:100%;">
              <a href="{{route('physical-infrastruture','4')}}" class="p-3">
                <span class="text-white row">
                  <i class="fa fa-address-card fa-3x col-lg-3" aria-hidden="true"></i>
                  <label for="" class="ml-2 col-lg-8">{{$complete_pathrahiya}}/{{$total_pathrahiya}} COMPLETED </label>
                  <h4 class="text-white mt-4 text-center h5">@lang('navigation.patharaiya_mohna_sichaiya')</h4>
                </span>
              </a>
            </div>
          </div>
          <div class="col-lg-4 mt-4">
            <div class="card" style="background-color: #333300; height:100%; border-radius: 4px;">
              <a href="{{route('physical-infrastruture','5')}}" class="p-3">
                <span class="text-white row">
                  <i class="fa fa-address-card fa-3x col-lg-3" aria-hidden="true"></i>
                  <label for="" class="mh5l-2 col-lg-8">{{$complete_sahari}}/{{$total_sahari}} COMPLETED </label>
                  <h4 class="mt-4 text-center h5">@lang('navigation.urban_development')</h4>
                </span>
              </a>
            </div>
          </div>
          <div class="col-lg-4 mt-4">
            <div class="card" style="height:100%; background-color:  #000033; height:100%;">
              <a href="{{route('physical-infrastruture','6')}}" class="p-3">
                <span class="text-white row">
                  <i class="fa fa-address-card fa-3x col-lg-3" aria-hidden="true"></i>
                  <label for="" class="ml-2 col-lg-8">{{$complete_yatayat}}/{{$total_yatayat}} COMPLETED </label>
                  <h4 class="mt-4 text-center pl-3 h5">@lang('navigation.transport_management')</h4>
                </span>
              </a>
            </div>
          </div>
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
</style>