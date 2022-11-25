<script src="{{ asset('frontend/assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/grid-gallery/js/grid-gallery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/script.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    setTimeout(function() {
        $('#alert').slideUp();
    }, 4000);
</script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
</script>