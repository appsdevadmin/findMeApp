<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>How to Generate QR Code in Laravel 8</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h2>Simple QR Code</h2>
            </div>
            <div class="card-body">
               <!-- {!! QrCode::size(300)->format('svg')->color(34,104,69)->style('square')->margin(5)
				->eye('square')->eyecolor(0,244,238,0,255,0,0)->eyecolor(1,244,238,0,255,0,0)
				->eyecolor(2,244,238,0,255,0,0)->errorCorrection('H')->merge('../public/nnpc_ltd_logo.png',.3, false)
				->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8', '../public/QRCode/Qrcode.svg') !!} -->
            </div>
        </div>

    </div>
</body>
</html>