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
      document.getElementById('chk').style.display="none";
    }else{
    document.getElementById('chk').style.display="inline-flex";

  }
});
</script>
<script>
    var survey_options = document.getElementById('survey_options');
    var add_more_fields = document.getElementById('add_more_fields');
    var remove_fields = document.getElementById('remove_fields');

    add_more_fields.onclick = function() {

        var newField = document.createElement('input');
        newField.setAttribute('type', 'file');
        newField.setAttribute('name', 'image[]');
        newField.setAttribute('class', 'form-control form-control-lg mt-3');
        newField.setAttribute('siz', 50);
        newField.setAttribute('id', 'documents');
        survey_options.appendChild(newField);
    }

    remove_fields.onclick = function() {

        var input_tags = survey_options.getElementsByTagName('input');

        if (input_tags.length > 1) {
            survey_options.removeChild(input_tags[(input_tags.length) - 1]);
        }
    }</script>


<script >
    var checkbox1 = document.getElementById("work");

checkbox1.addEventListener('change', function () {
  if(checkbox1.checked){
    // alert('sds');
      document.getElementById('complete_date').style.display="none";
    }else{
    document.getElementById('complete_date').style.display="block";

  }
});
</script>
