<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>School ID Card</title>

<style>
    body {
        background: #eee;
        font-family: Arial, sans-serif;
    }

    .container {
        width: 700px;
        margin: 40px auto;
        text-align: center;
    }

    .print-btn {
        background: #28a745;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
        margin-bottom: 15px;
    }
    .id-card {
        width: 320px;
        background: #fff;
        margin: 40px auto;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 16px rgba(0,0,0,0.2);
    }

    .header {
        background: #f57c00;
        color: #fff;
        text-align: center;
        padding: 25px 10px 65px;
        /* clip-path: polygon(0 0, 100% 0, 100% 70%, 50% 100%, 0 70%); */
    }

    .header h2 {
        margin: 0;
        font-size: 18px;
        letter-spacing: 0.5px;
    }

    .header p {
        margin: 5px 0 0;
        font-size: 12px;
    }

    .photo {
        width: 95px;
        height: 95px;
        border-radius: 50%;
        border: 5px solid #f57c00;
        overflow: hidden;
        margin: -48px auto 10px;
        background: #fff;
    }

    .photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .details {
        padding: 10px 20px;
        font-size: 13px;
        text-align: start;
    }

    .detail-row {
        display: grid;
        grid-template-columns: 130px 1fr;
        margin-bottom: 6px;
    }

    .detail-row .label {
        font-weight: bold;
        color: #333;
    }

    .detail-row .value {
        color: #555;
    }

    .codes {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px 20px 15px;
    }

    .qr img {
        width: 70px;
        height: 70px;
    }

    .barcode svg {
        width: 150px;
        height: 40px;
    }

    .footer {
        background: #f57c00;
        color: #fff;
        text-align: center;
        font-size: 12px;
        padding: 10px;
    }
</style>
</head>
<body>

<div class="container">
    <button class="print-btn" onclick="window.print()">Print ID Cards</button>
<div class="id-card">
    <div class="header">
            <h2>{{$appdata->title}}</h2>
    </div>

    <div class="photo">
        <img src="{{asset('/')}}{{$data->photo ?? '--'}}" alt="Student Photo">
    </div>

    <div class="details">
        <div class="detail-row">
            <div class="label">Emp. Code</div><div class="value">{{$data->employ_code}}</div>
        </div>
        <div class="detail-row">
            <div class="label">Name</div><div class="value">{{$data->name}}</div>
        </div>
        <div class="detail-row">
            <div class="label">Phone</div><div class="value">{{$data->phone}}</div>
        </div>
        <div class="detail-row">
            <div class="label">Class</div><div class="value">{{$data->class}}</div>
        </div>
        <div class="detail-row">
            <div class="label">Subject</div><div class="value">{{$data->subject}}</div>
        </div>
        <div class="detail-row">
            <div class="label">Qualification</div><div class="value">{{$data->qualification}}</div>
        </div>
    </div>

    <div class="footer">
            {{$data->address}}
    </div>
</div>

</body>
</html>
