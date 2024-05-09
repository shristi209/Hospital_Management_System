<footer>
        {{-- <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
        </div> --}}
 {{-- address ajax --}}
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

 <script src="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js" type="text/javascript"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 <!-- Bootstrap core JavaScript-->
 {{-- <script src="backend/vendor/jquery/jquery.min.js"></script> --}}
 <script src="backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 {{-- hideshowjs --}}
 <script src={{asset("backend/js/clientsideValidation.js")}}></script>
 <script src={{asset("backend/js/hideshowWidzard.js")}}></script>
 <script src={{asset("backend/js/notification.js")}}></script>
 {{-- nepalidate picker --}}
 <script src={{asset("backend/js/nepalidatePicker.js")}}></script>
 <script src={{asset("backend/js/educationRepeater.js")}}></script>
 <script src={{asset("backend/js/addressRepeater.js")}}></script>
 <script src={{asset("backend/js/experienceRepeater.js")}}></script>

 {{-- englishdate picker --}}
 <script src={{asset("backend/js/englishdatepicker.js")}}></script>

 <script src={{asset("backend/js/adressajax.js")}}></script>


 <!-- Core plugin JavaScript-->
 <script src="backend/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="backend/js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="backend/vendor/chart.js/Chart.min.js"></script>


 <!-- Page level custom scripts -->
 <script src="backend/js/demo/chart-area-demo.js"></script>
 <script src="backend/js/demo/chart-pie-demo.js"></script>

 <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
 <script src={{asset("backend/js/ckeditor.js")}}></script>

 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

 {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}

<script>
    @if (Session::has('message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('message') }}");
@endif

@if (Session::has('error'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error("{{ session('error') }}");
@endif

@if (Session::has('info'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.info("{{ session('info') }}");
@endif

@if (Session::has('warning'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.warning("{{ session('warning') }}");
@endif

    </script>


</footer>
