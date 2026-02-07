<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Character Certificate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('js') }}/tailwind.min.js"></script>

<style>
    body {
        font-family: "Times New Roman", serif;
        background: #f4f4f4;
    }

    .certificate {
        width: 900px;
        margin: 30px auto;
        background: #fff;
        border: 2px solid #000;
        padding: 25px 30px 40px;
    }

    .top-row {
        display: flex;
        justify-content: space-between;
        font-size: 14px;
    }

    .school-header {
        text-align: center;
        margin-top: 10px;
    }

    .school-header h1 {
        margin: 5px 0;
        font-size: 26px;
        font-weight: bold;
    }

    .school-header p {
        margin: 2px 0;
        font-size: 14px;
    }

    .divider {
        border-top: 1px solid #000;
        margin: 15px 0;
    }

    .meta {
        display: flex;
        justify-content: space-between;
        font-size: 15px;
        margin-bottom: 15px;
    }

    .title {
        background: #114aad;
        color: #fff;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        padding: 8px;
        width: 60%;
        margin: 0 auto 35px;
    }

    .content {
        font-size: 20px;
        line-height: 1.9;
    }

    .line {
        display: inline-block;
        min-width: 180px;
        border-bottom: 1px solid #000;
        text-align: center;
        font-style: italic;
        color: #1e88c9;
    }

    .center-text {
        text-align: center;
        margin-top: 40px;
        font-style: italic;
        font-size: 22px;
    }

    .signature {
        margin-top: 70px;
        font-size: 18px;
    }

    @media print {
        body {
            background: none;
        }
        .certificate {
            margin: 0;
        }
    }
</style>
</head>

<body>

<div class="certificate">

    <div class="school-header">
        <img src="{{asset('/').$appdata->logo}}" alt="logo" width="100px">
        <h2>{{$appdata->title}}</h2>
        <p>{{$appdata->address}}</p>
        <p>Ph: {{$appdata->phone}} &nbsp; Email: {{$appdata->email}}</p>
    </div>

    <div class="divider"></div>

    <div class="meta">
        <div><strong>Admission No. :</strong> {{$data->admission_no}}</div>
        <div><strong>Date :</strong> {{date('d-m-Y')}}</div>
    </div>

    <div class="title">CHARACTER CERTIFICATE</div>

    <div class="content">
        This is to certify that Mister/Miss
        <span class="line">{{$data->name}}</span><br>

        Son / daughter of Mr.
        <span class="line">{{$data->father_name}}</span>
        and Mrs.
        <span class="line">{{$data->mother_name}}</span><br>

        during the year from
        <span class="line">{{date('Y', strtotime($data->created_at))}}</span>
        to
        <span class="line">{{date('Y')}}</span>
        his / her character and conduct were
        <span class="line">Very Good</span>
        during his / her stay in this school.
    </div>

    <div class="center-text">
        ‘School wished for your bright future’
    </div>

    <div class="signature">
        <strong>Principal</strong>
    </div>

</div>

</body>
</html>
