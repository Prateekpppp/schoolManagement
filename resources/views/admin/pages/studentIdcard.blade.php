<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student ID Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
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
            border: 2px solid #000;
            padding: 20px;
            background: #fff;
        }

        .school-name {
            font-weight: bold;
            font-size: 20px;
        }

        .school-info {
            font-size: 14px;
            margin-bottom: 15px;
        }

        .card-body {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .details {
            width: 65%;
            text-align: left;
            font-size: 14px;
        }

        .details div {
            padding: 6px 0;
            border-bottom: 1px solid #ccc;
        }

        .photo-section {
            width: 30%;
            text-align: center;
        }

        .photo-section img {
            width: 150px;
            height: auto;
            border: 1px solid #000;
        }

        .authorized {
            margin-top: 15px;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="container">
    <button class="print-btn" onclick="window.print()">Print ID Cards</button>

    <div class="id-card">
        <div class="school-name">{{$appdata->title}}</div>
        <div class="school-info">
            Phone: {{$appdata->phone}} | Email: {{$appdata->email}}<br>
            Address: {{$appdata->address}}
        </div>

        <div class="card-body">
            <div class="details">
                <div><strong>Student Name:</strong> {{$student->name}}</div>
                <div><strong>Admission Number:</strong> {{$student->admission_no}}</div>
                <div><strong>Class:</strong> {{$student->class}} &nbsp;&nbsp; <strong>Section:</strong> {{$student->section}}</div>
                <div><strong>Roll Number:</strong> {{$student->roll_no}} &nbsp;&nbsp; <strong>Blood Group:</strong> {{$student->blood_group}}</div>
                <div><strong>Father's Name:</strong> {{$student->father_namr}}</div>
                <div><strong>Phone:</strong> {{$student->phone}}</div>
                <div><strong>Address:</strong> {{$student->address}}</div>
            </div>

            <div class="photo-section">
                <img src="{{asset('/')}}{{$student->photo ?? '--'}}" width="150px" alt="Student Photo">
                <div class="authorized">Authorized By</div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
