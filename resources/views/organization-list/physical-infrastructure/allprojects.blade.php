@extends('user_app')
@section('content')
@include('navbar')
<div style="background-color: #edf2f8;width:100%;height:100vh;">
    <div style="height: 150px;"></div>
    <div class="container">
        <h2 class="mt-2">
            कैलाली जिल्ला अंतर्गत परियोजनाहरु
        </h2>
        <div class="row d-flex flex-row">
            <div class="row col-6">
                <table class="table table-striped">
                    <thead class="fontsize filterDev all">
                        <th scope="col">#</th>
                        <th scope="col">जिल्लागत परियोजना</th>
                        <th scope="col">कुल परियोजना</th>
                    </thead>
                    <tbody>
                        <tr class="fontsize1">
                            <td><a href="{{route('all-projects')}}">1</a></td>
                            <td><a href="{{route('all-projects')}}">Kailali</a></td>
                            <td><a href="{{route('all-projects')}}">10</a></td>
                        </tr>
                        <tr class="fontsize1">
                            <td><a href="{{route('view-details')}}">2</a></td>
                            <td><a href="{{route('view-details')}}">Kanchanpur</a></td>
                            <td><a href="{{route('view-details')}}">12</a></td>
                        </tr>
                        <tr class="fontsize1">
                            <td><a href="{{route('view-details')}}">3</a></td>
                            <td><a href="{{route('view-details')}}">Doti</a></td>
                            <td><a href="{{route('view-details')}}">20</a></td>
                        </tr>
                        <tr class="fontsize1">
                            <td><a href="{{route('all-projects')}}">1</a></td>
                            <td><a href="{{route('all-projects')}}">Kailali</a></td>
                            <td><a href="{{route('all-projects')}}">10</a></td>
                        </tr>
                        <tr class="fontsize1">
                            <td><a href="{{route('view-details')}}">2</a></td>
                            <td><a href="{{route('view-details')}}">Kanchanpur</a></td>
                            <td><a href="{{route('view-details')}}">12</a></td>
                        </tr>
                        <tr class="fontsize1">
                            <td><a href="{{route('view-details')}}">3</a></td>
                            <td><a href="{{route('view-details')}}">Doti</a></td>
                            <td><a href="{{route('view-details')}}">20</a></td>
                        </tr>
                        <tr class="fontsize1">
                            <td><a href="{{route('all-projects')}}">1</a></td>
                            <td><a href="{{route('all-projects')}}">Kailali</a></td>
                            <td><a href="{{route('all-projects')}}">10</a></td>
                        </tr>
                        <tr class="fontsize1">
                            <td><a href="{{route('view-details')}}">2</a></td>
                            <td><a href="{{route('view-details')}}">Kanchanpur</a></td>
                            <td><a href="{{route('view-details')}}">12</a></td>
                        </tr>
                        <tr class="fontsize1">
                            <td><a href="{{route('view-details')}}">3</a></td>
                            <td><a href="{{route('view-details')}}">Doti</a></td>
                            <td><a href="{{route('view-details')}}">20</a></td>
                        </tr>
                        <tr class="fontsize1">
                            <td><a href="{{route('all-projects')}}">1</a></td>
                            <td><a href="{{route('all-projects')}}">Kailali</a></td>
                            <td><a href="{{route('all-projects')}}">10</a></td>
                        </tr>
                        <tr class="fontsize1">
                            <td><a href="{{route('view-details')}}">2</a></td>
                            <td><a href="{{route('view-details')}}">Kanchanpur</a></td>
                            <td><a href="{{route('view-details')}}">12</a></td>
                        </tr>
                        <tr class="fontsize1">
                            <td><a href="{{route('view-details')}}">3</a></td>
                            <td><a href="{{route('view-details')}}">Doti</a></td>
                            <td><a href="{{route('view-details')}}">20</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="myBtnContainer" style="height: 20px;" class="row col-5 ml-5 form-select" aria-label="Default select example">
                <button class="btn active" onclick="filterSelection('all')">All Projects</button>
                <button class="btn" onclick="filterSelection('ongoing')">On Going</button>
                <button class="btn" onclick="filterSelection('completed')">Completed</button>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    filterSelection("all")

    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) AddClass(x[i], "show");
        }
    }

    function AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    function RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>
<style>
    #myBtnContainer {
        float: right;
        height: 20px;
    }


    /* Style the buttons */
    .btn {
        border: none;
        outline: none;
        padding: 12px 16px;
        background-color: #f1f1f1;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #ddd;
    }

    .btn.active {
        background-color: #666;
        color: white;
    }
</style>