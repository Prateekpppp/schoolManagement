<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <title>Laravel QR Code Example</title>
    </head>
    <body>

    <div class="text-center" style="margin-top: 50px;">
        <h3>Laravel QR Code Example</h3>
        <div>
            <img src="data:image/png;base64, {!! base64_encode($qr_code) !!} ">
        </div>
       <div> <a href="data:image/png;base64, {!! base64_encode($qr_code) !!} " download>Downloads</a></div>
        <p>My Qr Code</p>
    </div>

    </body>
    </html>