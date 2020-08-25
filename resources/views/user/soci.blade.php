@extends('layouts.app-dashboard')

@section('content')

<div class="dashboard-right-side">
    <main class="col">
        <div class="mt-3">
            <div class="float-right">
                <h2>Hola {{Auth::User()->first_name}}</h2>
                <h5>Benvingut/da a la teva àrea privada</h5>
            </div>
        </div>
    </main>
</div>

@endsection

<!-- Vendor JS Files -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="vendor/php-email-form/validate.js"></script>
<script src="vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="vendor/counterup/counterup.min.js"></script>
<script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="vendor/venobox/venobox.min.js"></script>

<!-- Template Main JS File -->
<script src="js/main.js"></script>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</html>