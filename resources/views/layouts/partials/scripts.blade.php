<script type="text/javascript" src="{{ asset('assets/mdb/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/mdb/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/mdb/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/mdb/js/mdb.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
<script type="text/javascript" src="{{ asset('assets/mdb/js/addons/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/nepali.datepicker.v3.min.js') }}" type="text/javascript"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script >
    var checkbox = document.getElementById("chk_box");

checkbox.addEventListener('change', function () {
  if(checkbox.checked){
      document.getElementById('chk').style.display="inline-flex";
    }else{
    document.getElementById('chk').style.display="none";

  }
});
</script>