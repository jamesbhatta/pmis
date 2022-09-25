@extends('user_app')
@section('content')
@include('navbar')
<div style="background-color: #edf2f8;width:100%">
    <div style="height: 150px;"></div>
    <div class="container">
        <h2 class="mt-2">
            जिल्ला कैलाली अंतर्गत परियोजनाहरु
        </h2>
        <div>
            <table class="table table-striped">
                <thead class="fontsize filterDev all">
                    <th scope="col">#</th>
                    <th scope="col">परियोजनाको नाम</th>
                    <th scope="col">Starting Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    @foreach($projects as $item)
                    <tr class="fontsize1">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->physicalProgress->project_start_date}}</td>
                        <td>Success</td>
                        <td><a class="btn btn-primary" href="{{route('view-details',$item->id)}}">View</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
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
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    function w3RemoveClass(element, name) {
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

    .btn button {
        border-radius: 300px;
    }
</style>