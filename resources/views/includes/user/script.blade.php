<!-- latest jquery-->
<script src="{{url("cuba/assets/js/jquery-3.5.1.min.js")}}"></script>
<!-- Bootstrap js-->
<script src="{{url("cuba/assets/js/bootstrap/popper.min.js")}}"></script>
<script src="{{url("cuba/assets/js/bootstrap/bootstrap.js")}}"></script>
<!-- feather icon js-->
<script src="{{url("cuba/assets/js/icons/feather-icon/feather.min.js")}}"></script>
<script src="{{url("cuba/assets/js/icons/feather-icon/feather-icon.js")}}"></script>
<!-- Sidebar jquery-->
<script src="{{url("cuba/assets/js/config.js")}}"></script>
<!-- Plugins JS start-->
<script src="{{url("cuba/assets/js/chart/chartist/chartist-plugin-tooltip.js")}}"></script>
<script src="{{url("cuba/assets/js/chart/knob/knob.min.js")}}"></script>
<script src="{{url("cuba/assets/js/chart/chartist/chartist.js")}}"></script>
<script src="{{url("cuba/assets/js/chart/knob/knob-chart.js")}}"></script>
<script src="{{url("cuba/assets/js/sidebar-menu.js")}}"></script>
<script src="{{url("cuba/assets/js/chart/apex-chart/apex-chart.js")}}"></script>
<script src="{{url("cuba/assets/js/chart/apex-chart/stock-prices.js")}}"></script>
<script src="{{url("cuba/assets/js/dashboard/default.js")}}"></script>
<script src="{{url("cuba/assets/js/datepicker/date-picker/datepicker.js")}}"></script>
<script src="{{url("cuba/assets/js/datepicker/date-picker/datepicker.en.js")}}"></script>
<script src="{{url("cuba/assets/js/datepicker/date-picker/datepicker.custom.js")}}"></script>
<script src="{{url("cuba/assets/js/typeahead/handlebars.js")}}"></script>
<script src="{{url("cuba/assets/js/typeahead/typeahead.bundle.js")}}"></script>
<script src="{{url("cuba/assets/js/typeahead/typeahead.custom.js")}}"></script>
<script src="{{url("cuba/assets/js/typeahead-search/handlebars.js")}}"></script>
<script src="{{url("cuba/assets/js/typeahead-search/typeahead-custom.js")}}"></script>
<script src="{{url("cuba/assets/js/tooltip-init.js")}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '#select', function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var classname = $(this).data('classname');
            $('#userId').val(id);
            $('#selectedName').val(name);
            $('#selectedClassname').val(classname);
        })
    })

</script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });


    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@stack('galleries-scripts')
@stack('timepicker-scripts')
@stack('calendar-scripts')
@stack('todo-scripts')
@stack('carousel-scripts')
@stack('ckeditor-scripts')
@stack('journal-scripts')
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{url("cuba/assets/js/script.js")}}"></script>
<!-- login js-->
<!-- Plugin used-->