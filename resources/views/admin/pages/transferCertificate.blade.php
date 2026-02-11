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

    {{-- <div class="header">
        <div><strong>School Code :</strong> 456456</div>
        <div><strong>Affiliated to MP BOARD :</strong> 366556539</div>
    </div> --}}

        @include('admin.includes.print_header')


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
        <tr><td class="label">4. First Admission Date</td><td class="value">{{$data->created_at}} &nbsp;&nbsp; Class : {{$data->class_name}} ({{$data->section_name}})</td></tr>
        <tr><td class="label">5. Religion</td><td class="value">{{$data->religion}}</td></tr>
        <tr><td class="label">6. Caste</td><td class="value">{{$data->caste}}</td></tr>
        <tr><td class="label">7. DOB</td><td class="value">{{$data->dob}}</td></tr>
        {{-- <tr><td class="label">8. Aadhar No.</td><td class="value">{{$data->admission_no}}</td></tr> --}}
        <tr><td class="label">8. General conduct</td><td class="value">{{$data->behaviour}} </td></tr>
        <tr><td class="label">9. Reason for leaving the school</td><td class="value"> {{$data->reason}}</td></tr>
        <tr><td class="label">10. Wheather the student is failed</td><td class="value"> {{$data->failed_last_class}}</td></tr>
        <tr><td class="label">11. Date of Application for Certificate</td><td class="value">{{$data->application_date}}</td></tr>
        <tr><td class="label">12. Date of Issue for Certificate</td><td class="value">{{$data->issue_date}}</td></tr>
        <tr><td class="label">13. Class in which the pupil last studied</td><td class="value">{{$data->class_name}}</td></tr>
        <tr><td class="label">14. Usually took part(mention achievement level therein)</td><td class="value"> {{$data->game_played}}</td></tr>
        <tr><td class="label">15. Wheather Qualified for promotion to the next higher class</td><td class="value"> {{$data->failed_last_class == 'Yes' ? 'No' : 'Yes'}}</td></tr>
        <tr><td class="label">16. Whether NCC Cadet Boy scout/Girl Guide(give details)</td><td class="value"> {{$data->ncc}}</td></tr>
        <tr><td class="label">17. Any fee consession availed of, if so the nature of such consession</td><td class="value"> {{$data->concession}}</td></tr>
        <tr><td class="label">18. Remark</td><td class="value"> {{$data->remark}}</td></tr>
    </table>
    
    <div class="signature">
        <strong>Principal</strong>
    </div>
</div>
        @include('admin.includes.print_btn')
</body>
</html>

        