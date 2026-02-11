<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Migration Certificate</title>
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
        padding: 20px 30px 40px;
    }

    .top-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
    }

    .logo {
        width: 90px;
        height: auto;
    }

    .school-header {
        text-align: center;
        margin-top: 5px;
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
        width: 65%;
        margin: 0 auto 35px;
    }

    .content {
        font-size: 20px;
        line-height: 1.9;
    }

    .line {
        display: inline-block;
        min-width: 220px;
        border-bottom: 1px solid #000;
        text-align: center;
        font-weight: bold;
    }

    .small-line {
        min-width: 120px;
    }

    .center-text {
        text-align: center;
        margin-top: 35px;
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
    .print-btn {
        background-color: #28a745;
        color: #fff;
        padding: 6px 16px;
        border-radius: 4px;
        font-size: 14px;
    }

</style>
</head>

<body>

<div class="certificate">


        @include('admin.includes.print_header')


    <div class="divider"></div>

    <div class="meta">
        <div><strong>Mg. No. :</strong>{{$data->mg_no}}</div>
        <div><strong>Date :</strong> {{$data->issue_date}}</div>
    </div>

    <div class="title">MIGRATION CERTIFICATE</div>

    <div class="content">
        This is to certify that Master/Miss
        <span class="line">{{$data->name}}</span><br>

        Son / daughter of Mr.
        <span class="line small-line">{{$data->father_name}}</span>
        and Mrs.
        <span class="line small-line">{{$data->mother_name}}</span><br>

        is/was a student of
        <span class="line">{{$appdata->title}}</span>
        studying in class
        <span class="line small-line">{{$data->class_name}}</span>
        under admission no
        <span class="line small-line">{{$data->admission_no}}</span>
        during the academic year
        <span class="line small-line">{{date('Y', strtotime($data->from_date))}} - {{date('Y', strtotime($data->to_date))}}</span>.

        <br><br>

        The School has ‘No Objection’, whatsoever, to his/her migration/admission
        to pursue further studies.
    </div>

    <div class="center-text">
        School wished for your bright future
    </div>

    <div class="signature">
        <strong>Principal</strong>
    </div>

</div>

        @include('admin.includes.print_btn')


</body>
</html>
