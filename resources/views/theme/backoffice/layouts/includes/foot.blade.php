<!-- jQuery Library -->
<script type="text/javascript" src="{{ asset('assets/plugins/jquery-3.4.1.js') }}"></script>
<!--materialize js-->
<script type="text/javascript" src="{{ asset('assets/backoffice/js/materialize.min.js') }}"></script>
<!--scrollbar-->
<script type="text/javascript" src="{{ asset('assets/backoffice/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{ asset('assets/backoffice/js/plugins.js') }}"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="{{ asset('assets/backoffice/js/custom-script.js') }}"></script>

@include('sweetalert::alert')

@yield('foot')


