@extends('user_app')
@section('content')
<nav id="navbar" class="navbar navbar-expand-lg navbar-dark py-3" style=" z-index:1">
  <div class="container">
    <!-- Navbar brand -->
    <router-link class="d-flex align-items-center" to="/">
      <img src="https://fra.mofaga.gov.np/static/media/logo.940ff832.svg" height="50px" />
      <div class="ml-3 navbar-brand text-main">
        <div class="font-weight-bold">सुदूरपश्चिम प्रदेश</div>
        <div class="font-weight-bold">परियोजना व्यवस्थापन सूचना प्रणाली</div>
      </div>
    </router-link>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">
      <!-- Links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <router-link class="nav-link" to="/">गृह पृष्ठ</router-link>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">डाटासेटहरु</a>
          <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <router-link class="dropdown-item">
              <span></span>
            </router-link>
          </div>
        </li>
        <img src="/assets/img/nepalflag.gif" alt="flag" height="60px">
      </ul>
      <!-- Links -->
    </div>
    <!-- Collapsible content -->
  </div>
</nav>
<div style="background-color:#edf2f8; height: 120px;"></div>

<div style="background-color: #edf2f8;width:100%;height:100vh;">
  <div class="container">

    <div class="row">
      <div class="col-lg-3 mt-3">
        <div class="">
          <div class="p-3 h4 font-weight-bold text-white" style="background-color:#1e78de;">
            <span>डाटासेटहरु</span>
          </div>
          <div class=" bg-white text-left text-dark h5 card1">
            <div class=" p-3 mt-1">
              <span><a href="#">@lang('navigation.Ministry_of_Physical_Transport')</a> </span>
            </div>
            <div class="p-3 mt-1">
              <span><a href="#">@lang('navigation.water_irrigation')</a></span>
            </div>
            <div class="p-3 mt-1">
              <span><a href="#">@lang('navigation.Drinking_Water_Office')</a></span>
            </div>
            <div class="p-3 mt-1">
              <span><a href="#">@lang('navigation.patharaiya_mohna_sichaiya')</a></span>
            </div>
            <div class="p-3 mt-1">
              <span><a href="#">@lang('navigation.urban_development')</a></span>
            </div>
            <div class="p-3 mt-1">
              <span><a href="#">@lang('navigation.traffic_management')</a></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="row p-3" style="border-radius: 10px;">
          <div class="col-lg-4">
            <a href="#" class="card p-3" style="background-color: #ff9900; height:100%;">
              <span class="text-white row">
                <i class="fa fa-address-card fa-3x col-lg-3" aria-hidden="true"></i>
                <label for="" class="ml-2 col-lg-8">10/25 COMPLETED</label>
                </span>
                <h4 class="text-white mt-4">@lang('navigation.Ministry_of_Physical_Transport')</h4>

            </a>
          </div>
          <div class="col-lg-4">
            <div class="card" style="background-color:#000099; height:100%;">
              <a href="#" class="p-3">
                <span class="text-white row">
                  <i class="fa fa-address-card fa-3x col-lg-3" aria-hidden="true"></i>
                  <label class="ml-2 col-lg-8">10/25 COMPLETED</label>
                  </span>
                  <h4 class="text-white mt-4">@lang('navigation.water_irrigation')</h4>

              </a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <a href="#" class="card p-3" style="background-color: #004d00; height:100%;">
                <span class="text-white row">
                  <i class="fa fa-address-card fa-3x col-lg-3" aria-hidden="true"></i>
                 <label for="" class="ml-2 col-lg-8">10/25 COMPLETED </label>
                  <h4 class="text-white mt-4">@lang('navigation.Drinking_Water_Office')</h4>
                </span>
              </a>
            </div>
          </div>
          <div class="col-lg-4 mt-4">
            <div class="card">
              <a href="#" class="card p-3" style="background-color: #660000; height:100%;">
                <span class="text-white">
                  <i class="fa fa-address-card fa-3x" aria-hidden="true"></i>
                  10/25 COMPLETED
                  <h4 class="text-white mt-4">@lang('navigation.patharaiya_mohna_sichaiya')</h4>
                </span>
              </a>
            </div>
          </div>
          <div class="col-lg-4 mt-4" >
            <div class="card" style="background-color:#edf2f8;">
              <a href="#" class="p-3" style="background-color: #333300; height:100%;border-radius: 4px;">
                <span class="text-white">
                  <i class="fa fa-address-card fa-3x" aria-hidden="true"></i>
                  10/25 COMPLETED
                  <h4 class="mt-4">@lang('navigation.urban_development')</h4>
                </span>
              </a>
            </div>
          </div>
          <div class="col-lg-4 mt-4">
            <div class="card" style="height:100%; background-color:  #000033; height:100%;" >
              <a href="#" class="p-3" >
                <span class="text-white">
                  <i class="fa fa-address-card fa-3x " aria-hidden="true"></i>
                  10/25 COMPLETED
                  <h4 class="mt-4">@lang('navigation.traffic_management')</h4>
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

  .card1{
    border-radius:10px;
  }
  .card1 div span a {
    color: black;

  }

  .card1 div:hover {
    background-color:#fc6e23;
    color: #fff;
  }
  .card1 div:hover span a {
    color: #fff;
  }
</style>