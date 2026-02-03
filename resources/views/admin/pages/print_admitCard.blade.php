<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admit Card</title>
<link rel="stylesheet" href="{{ asset('css') }}/tailwind.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f5f5f5;
    }

    .admit-card {
        width: 900px;
        margin: 20px auto;
        background: #fff;
        border: 2px solid #000;
        padding: 10px;
    }

    .header {
        text-align: center;
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
    }

    .header img {
        height: 80px;
        float: left;
    }

    .header h1 {
        margin: 0;
        font-size: 28px;
        letter-spacing: 1px;
    }

    .header h3 {
        margin: 5px 0;
        font-size: 18px;
    }

    .header p {
        margin: 3px 0;
        font-size: 14px;
    }

    .clear {
        clear: both;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        font-size: 14px;
    }

    table, th, td {
        border: 1px solid #000;
    }

    th, td {
        padding: 6px;
        text-align: center;
    }

    .details td {
        text-align: left;
        font-weight: bold;
    }

    .section-title {
        background: #e6e6e6;
        font-weight: bold;
        text-align: center;
    }

    .signatures td {
        height: 60px;
        vertical-align: bottom;
        text-align: center;
        font-weight: bold;
    }

    .instructions {
        margin-top: 10px;
        font-size: 13px;
    }

    .instructions ul {
        margin: 5px 0 0 20px;
    }

    .print-btn {
        display: block;
        margin: 20px auto;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    @media print {
        body {
            background: none;
        }
        .print-btn {
            display: none;
        }
    }
</style>
</head>

<body>

<button class="print-btn" onclick="window.print()">🖨️ Print Admit Card</button>

<div class="admit-card">

    <div class="header">
        <img src="{{asset('/').$appdata->logo}}" alt="logo" width="100px">
        <h1>{{$appdata->title}}</h1>
        <h3>{{$appdata->address}}</h3>
        <p>Phone : {{$appdata->phone}} | Email : {{$appdata->email}}</p>
        <div class="clear"></div>
    </div>

    <table>
        {{-- <tr>
            <th colspan="8" class="section-title">
                PERIODIC ASSESSMENT – II (2025-26)
            </th>
        </tr> --}}

        <tr class="details">
            <td>Admission No.</td><td>{{$students->admission_no}}</td>
            <td>Student Name</td><td>{{$students->name}}</td>
            <td>Father Name</td><td>{{$students->father_name}}</td>
            <td>Contact Number</td><td>{{$students->phone}}</td>
        </tr>

        <tr class="details">
            <td>Roll No.</td><td>{{$students->roll_no}}</td>
            <td>Class</td><td>{{$students->class}}</td>
            <td>Section</td><td>{{$students->section}}</td>
            <td colspan="4"></td>
        </tr>
    </table>

    <table>
        <tr>
            <th colspan="4" class="section-title">EXAM SCHEDULE</th>
        </tr>
        <tr>
            <th>SL</th>
            <th>Date</th>
            <th>Exam Time</th>
            <th>Exam Hours</th>
            <th>Exam Code</th>
            <th>Subject</th>
        </tr>

        @foreach($data as $k=>$exam)
        <tr>
            <td>{{$k+1}}</td>
            <td>{{$exam->date}}</td>
            <td>{{$exam->time}}</td>
            <td>{{$exam->exam_hours}}</td>
            <td>{{$exam->exam_code}}</td>
            <td>{{$exam->subject}}</td>
        </tr>
        @endforeach
    </table>

    <table class="signatures">
        <tr>
            <td>Class Teacher Sign</td>
            <td>Exam Controller Sign</td>
            <td>
                <div class="flex flex-col justify-center items-center">
                    <img src="{{asset('/').$appdata->signature}}" alt="logo" width="150px">
                    <span>Principal Sign</span>
                </div>
            </td>
            <td>
                <div class="flex flex-col justify-center items-center">
                    <img src="{{asset('/').$appdata->stamp}}" alt="logo" width="150px">
                    <span>School Seal</span>
                </div>
            </td>
        </tr>
    </table>

    <div class="instructions">
        <strong>General Instructions:</strong>
        <ul>
            <li>Students will not be allowed to take the exam if they do not carry their admit card.</li>
            <li>Students must bring their ID cards along with their admit card.</li>
            <li>Students must enter the examination hall 10 minutes earlier than the exam start time.</li>
        </ul>
    </div>

</div>

</body>
</html>
