<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @isset($title) {{ $title }} | @endisset {{ config('app.name', __('appname')) }}
    </title>

    @include('layouts.partials.styles')
    <style>
        :root {
            --color-main: #2572bc;
        }

        .text-main {
            color: var(--color-main);
        }

        .page-title {
            color: var(--color-main);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-align: center
        }
    </style>
</head>

<body class="sidebar-opened">
    <div id="app">
        <!--Navbar-->
        <navbar></navbar>
        <!--/.Navbar-->

        <router-view></router-view>
    </div>

    {{-- <script src="{{ asset('/js/app.js') }}"></script> --}}
    @include('layouts.partials.scripts')
</body>
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<!-- <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script> -->
<!-- Chartisan -->
<!-- <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script> -->

<script src="{{ asset('assets/table2excel/dist/jquery.table2excel.js') }}"></script>
<!-- <script src="{{ asset('/assets/js/canvasjs.min.js') }}"></script> -->
@stack('scripts')
</html>