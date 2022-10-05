<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

    <title>NNPC Limited</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
<!--link href="{{ asset('auto_assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('auto_assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"-->

    <!-- Google Fonts -->
    <!--link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" -->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Vendor CSS Files -->
    <link href="{{ asset('auto_assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('auto_assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('auto_assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{ asset('auto_assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Maxim - v4.1.0
    * Template URL: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->

	  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/adminlte.min.css') }}">

    <script>
        function goBack() {
            window.history.back();
        }

    </script>
    <style type="text/css">
        @media print
        {
            body{font-size:14px;}
            #print_div{display:block;}
            #no_print{display:none;}
        }

        @media print
        {
            head{font-size:12px;}
            #print_div{display:block;}
            #no_print{display:none;}
        }


        @media screen
        {
            body{font-size:12px;}
            #print_div{display:block;margin:20px;}
            #no_print{display:block;margin:20px;}
        }

		.table > thead > tr > th {
			font-size: 14px;
		}
		.table > thead > tr > td {
			font-size: 14px;
		}
    </style>

	 <style>
        * {
            box-sizing: border-box;
        }
        .column {
            float: left;
        }

        .left {
            width: 45%;
        }
        .right {
            width: 15%;
        }

        .middle {
            width: 40%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .bold{
            font-weight:700;
        }
            .center p {
                display: inline-block;
                line-height: normal;
                vertical-align: middle;
                margin: 0;
            }

        .signature-wrapper {
            border: solid 1px #6F6F6F;
            font-family: Montserrat, Helvetica, Arial, sans-serif;
            width: 600px;
            height: 180px;
            font-size:10px;
            color:#6F6F6F;
        }
        .sig-person {
            margin: 0px;
            font-size: 14px;
            vertical-align: middle;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 160px;
        }
        .sig-company {
            vertical-align: middle;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 160px;
        }

        .sig-logo {
        }
        .div-wrapper {
            position: relative;
            height: 140px;
        }

            .div-wrapper img {
                position: absolute;
                left: 0;
                bottom: 0;
            }
            #sig-person h4{
                margin:0;
                font-size:16px;
                font-weight:800;
                color:#000000;
            }
        #sig-company ul {
            margin: 0;
            list-style-image: none;
            list-style-type:none;
            padding-inline-start:0;
        }
        .module {
            max-width: 250px;
            height:120px;
            padding: 1rem;
            border-width: 2px;
            border-style: solid;
            border-color:  #FFFFFF;
            background: linear-gradient(180deg, #769C1D, #FDF085, transparent);
            background-repeat: repeat-y;
            background-size: 1px auto;
        }
        .left-icon {
            width: 10%;
        }
        .right-icon {
            width: 90%;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">




</head>

<body onload="myFunction();">

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center" style="background-color: #1A2F3E">
    <div class="container d-flex justify-content-between" style="margin-left: 10px">
        <div class="logo">
            <h1><a href="/id"></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <h4 class="animate__animated animate__headShake"><a href="/"><img src="{{asset('/img/NNPC_S2.png') }}" width="100" height="80" alt="" class="img-fluid"> <!-- NNPC Limited --></a></h4>
        </div>
    </div>
</header><!-- End Header -->


<main id="main">

    @yield('content')

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" style="background-color: #1A2F3E">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>NNPC Limited</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>	<br/>
					<!-- a href="/login"><b>🔐 Login</b></a -->
                </div>
            </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('auto_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('auto_assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('auto_assets/js/main.js') }}"></script>
<!-- Vendor JS Files -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{ asset('auto_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('admin_assets//plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin_assets//plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_assets//dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin_assets/dist/js/demo.js') }}"></script>

<script type="text/javascript">

// Enable button
function enable_submit() {
  $('button.submit').disabled = false;
  $('button.submit').addClass('not-disabled');
}

// Disable button
function disable_submit() {
  $('button.submit').disabled = true;
  $('button.submit').removeClass('not-disabled');
}

// Display feedback after rating
$('.rating__input').on('click', function () {
  var rating = this['value'];
  $('.rating__label').removeClass('active');
  $(this).siblings('.rating__label').addClass('active');
  $('.feedback').css('display', "block");

  $('.rating__text').removeClass('rating__text-fade-in');
  $(this).siblings('.rating__text').addClass('rating__text-fade-in');

});

</script>
</body>

</html>
