<!-- JAVASCRIPT -->
<script src="{{ URL::asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ URL::asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ URL::asset('') }}assets/libs/node-waves/waves.min.js"></script>
<script src="{{ URL::asset('') }}assets/libs/feather-icons/feather.min.js"></script>
<script src="{{ URL::asset('') }}assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="{{ URL::asset('') }}assets/js/plugins.js"></script>

<!-- apexcharts -->
<script src="{{ URL::asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="{{ URL::asset('') }}assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="{{ URL::asset('') }}assets/libs/jsvectormap/maps/world-merc.js"></script>

<!--Swiper slider js-->
<script src="{{ URL::asset('') }}assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- Dashboard init -->
<script src="{{ URL::asset('') }}assets/js/pages/dashboard-ecommerce.init.js"></script>

<!-- App js -->
<script src="{{ URL::asset('') }}assets/js/app.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{ URL::asset('') }}assets/js/pages/datatables.init.js"></script>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>

<!--select2 cdn-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('') }}assets/js/pages/select2.init.js"></script>


<!-- apexcharts -->
<script src="{{ URL::asset('') }}assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Dashboard init -->
<script src="{{ URL::asset('') }}assets/js/pages/dashboard-crm.init.js"></script>


<!-- ckeditor -->
<script src="{{ URL::asset('') }}assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<!-- quill js -->
<script src="{{ URL::asset('') }}assets/libs/quill/quill.min.js"></script>
<!-- init js -->
<script src="{{ URL::asset('') }}assets/js/pages/form-editor.init.js"></script>


<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editor1'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
        });
</script>
