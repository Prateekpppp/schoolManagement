<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Transfer Certificate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('js') }}/tailwind.min.js"></script>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f5f5f5;
    }
    .certificate {
        width: 900px;
        margin: 20px auto;
        background: #fff;
        border: 2px solid #000;
        padding: 20px;
    }
    .header {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
    }
    .school-name {
        align-items: center;
        display: flex;
        flex-direction: column;
        margin-top: 10px;
    }
    .school-name h2 {
        color: red;
        margin: 5px 0;
    }
    .school-name p {
        font-size: 13px;
        margin: 2px 0;
    }
    .title {
        background: #1e40af;
        color: #fff;
        text-align: center;
        font-weight: bold;
        padding: 8px;
        margin: 15px 0;
        font-size: 18px;
    }
    .meta {
        display: flex;
        justify-content: space-between;
        font-size: 14px;
        margin-bottom: 10px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }
    td {
        padding: 6px 5px;
        vertical-align: top;
    }
    .label {
        width: 40%;
    }
    .value {
        width: 60%;
        border-bottom: 1px dotted #000;
    }
    .footer {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
        font-size: 14px;
    }
</style>
</head>
<body>

<div class="certificate">

    {{-- <div class="header">
        <div><strong>School Code :</strong> 456456</div>
        <div><strong>Affiliated to MP BOARD :</strong> 366556539</div>
    </div> --}}

    <div class="school-name">
        <img src="{{asset('/').$appdata->logo}}" alt="logo" width="100px">
        <h2>{{$appdata->title}}</h2>
        <p>{{$appdata->address}}</p>
        <p>Ph: {{$appdata->phone}} &nbsp; Email: {{$appdata->email}}</p>
    </div>

    <div class="meta">
        {{-- <div><strong>Sr. No. :</strong> 371</div> --}}
        <div><strong>Date :</strong> {{date('d-m-Y')}}</div>
    </div>

    <div class="title">TRANSFER CERTIFICATE</div>

    <div class="meta">
        {{-- <div><strong>TC No. :</strong> 47</div> --}}
        <div><strong>Admission No. :</strong> {{$data->admission_no}}</div>
    </div>

    <table>
        <tr><td class="label">1. Name of the Pupil</td><td class="value">{{$data->name}}</td></tr>
        <tr><td class="label">2. Name of the Father</td><td class="value">{{$data->father_name}}</td></tr>
        <tr><td class="label">3. Name of the Mother</td><td class="value">{{$data->mother_name}}</td></tr>
        {{-- <tr><td class="label">4. First Admission Date</td><td class="value">{{$data->admission_no}} &nbsp;&nbsp; Class : 5TH (B)</td></tr> --}}
        <tr><td class="label">5. Religion</td><td class="value">{{$data->religion}}</td></tr>
        <tr><td class="label">6. Caste</td><td class="value">{{$data->caste}}</td></tr>
        <tr><td class="label">7. DOB (in figures)</td><td class="value">{{$data->dob}}</td></tr>
        <tr><td class="label">8. Aadhar No.</td><td class="value">{{$data->admission_no}}</td></tr>
        <tr><td class="label">11. Reason for leaving the school</td><td class="value"> </td></tr>
        <tr><td class="label">14. Date of Application for Certificate</td><td class="value">{{date('d-m-Y')}}</td></tr>
        <tr><td class="label">15. Class in which the pupil last studied</td><td class="value">{{$data->class}}</td></tr>

        
    <div class="printbtn text-center mb-3">
    <button class="print-btn">Print Expense</button>
    </div>