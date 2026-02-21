<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student QR Scanner</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        #video {
            width: 100%;
            max-width: 450px;
            border: 2px solid #0d6efd;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-light p-4">

<div class="container">
    <h3 class="text-center mb-4">Student QR Scanner</h3>

    <video id="video" autoplay></video>
    <canvas id="canvas" style="display:none;"></canvas>

    <div id="result" class="mt-4"></div>

    <div id="buttons" class="mt-3" style="display:none;">
        <button id="confirm" class="btn btn-success me-2">Confirm</button>
        <button id="change" class="btn btn-warning">Change</button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>

    @include('includes.ajaxCalls')
    @include('includes.script')

<script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>
<script>
    let scanned = "";
    const video = $("#video")[0];
    const canvas = $("#canvas")[0];
    const ctx = canvas.getContext("2d");

    // Start Camera
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } })
        .then(stream => {
            video.srcObject = stream;
            video.play();
            scanLoop();
        })
        .catch(() => alert("Camera permission denied!"));

    // Continuous scanner loop
    function scanLoop() {
        if (video.readyState === video.HAVE_ENOUGH_DATA) {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            let img = ctx.getImageData(0, 0, canvas.width, canvas.height);
            let code = jsQR(img.data, canvas.width, canvas.height);

            if (code) {
                scanned = code.data;
                showResult(scanned);
                return; // stop scanning
            }
        }
        requestAnimationFrame(scanLoop);
    }

    // Display Result in Bootstrap Alert
    function showResult(data) {
        $("#result").html(`
            <div class="alert alert-info">
                <strong>QR Found:</strong><br>${data}
            </div>
        `);

        $("#buttons").show();
    }

    // Confirm → Open new tab
    $("#confirm").on("click", function () {

        let student_id = scanned.split('/');
        student_id = student_id[student_id.length - 1];

        let data = {};
        data[student_id] = 1;

        callApi('post',"{{route('admin.post.createStudentAttendance')}}",{data:data,date:formatdate(new Date())},ajaxResponseModal);
        // window.open("view-student.php?id=" + encodeURIComponent(scanned), "_blank");
    });

    // Change → Reset everything
    $("#change").on("click", function () {
        $("#result").html("");
        $("#buttons").hide();
        scanned = "";
        scanLoop(); // restart scanning
    });
</script>

</body>
</html>
