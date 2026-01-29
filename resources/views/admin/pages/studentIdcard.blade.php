<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student ID Card</title>
<style>
    body {
        background: #f2f2f2;
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
        width: 300px;
        background: #fff;
        margin: 40px auto;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .header {
        background: #f57c00;
        color: #fff;
        text-align: center;
        padding: 25px 10px 60px;
        clip-path: polygon(0 0, 100% 0, 100% 70%, 50% 100%, 0 70%);
    }

    .header h2 {
        margin: 0;
        font-size: 18px;
    }

    .header p {
        margin: 5px 0 0;
        font-size: 12px;
    }

    .photo {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        border: 5px solid #f57c00;
        overflow: hidden;
        margin: -45px auto 10px;
        background: #fff;
    }

    .photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .details {
        padding: 10px 20px 20px;
        font-size: 13px;
    }

    .row {
        display: flex;
        margin-bottom: 6px;
    }

    .row span:first-child {
        width: 130px;
        font-weight: bold;
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
            {{-- <div class="school-info">
                Phone: {{$appdata->phone}} | Email: {{$appdata->email}}<br>
                Address: {{$appdata->address}}
            </div> --}}
        </div>
        <div class="photo">
            <img src="{{asset('/')}}{{$student->photo ?? '--'}}" width="150px" alt="Student Photo">
        </div>
        <div class="details">
            <div><span>Admission Number:</span> {{$student->admission_no}}</div>
            <div><span>Student Name:</span> {{$student->name}}</div>
            <div><span>Class:</span> {{$student->class}}</div>
            <div><span>Section:</span> {{$student->section}}</div>
            <div><span>Roll Number:</span> {{$student->roll_no}}</div>
            <div><span>Blood Group:</span> {{$student->blood_group}}</div>
            <div><span>Father's Name:</span> {{$student->father_namr}}</div>
            <div><span>Phone:</span> {{$student->phone}}</div>
        </div>
        <div class="footer">
            {{$student->address}}
        </div>
    </div>
</div>

</body>
</html>
