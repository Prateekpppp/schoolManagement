<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Event Certificate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('js') }}/tailwind.min.js"></script>

<style>
    body {
        background: #f4f4f4;
        font-family: "Times New Roman", serif;
    }

    .certificate {
        width: 1000px;
        /* height: 650px; */
        margin: 30px auto;
        background: #fff;
        border: 10px solid #b08d57;
        padding: 30px;
        box-sizing: border-box;
    }

    .inner-border {
        border: 3px solid #b08d57;
        /* height: 100%; */
        padding: 20px;
        box-sizing: border-box;
        text-align: center;
    }

    .header-title {
        color: red;
        font-size: 28px;
        font-weight: bold;
    }

    .sub-header {
        font-size: 14px;
        margin-top: 5px;
    }

    .event-title {
        margin-top: 25px;
        font-size: 26px;
        color: orange;
        font-weight: bold;
    }

    .sports {
        font-size: 22px;
        color: purple;
        font-weight: bold;
    }

    .content {
        margin-top: 5px;
        font-size: 22px;
        line-height: 45px;
    }

    .fill {
        color: purple;
        font-weight: bold;
    }

    .signatures {
        display: flex;
        justify-content: space-between;
        margin-top: 80px;
        padding: 0 40px;
        font-size: 16px;
        font-weight: bold;
        color: #0033cc;
    }

    .sign {
        width: 30%;
        text-align: center;
    }

    .line {
        border-bottom: 2px dotted #b08d57;
        display: inline-block;
        width: 300px;
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
    <div class="inner-border">

        @include('admin.includes.print_header')

        <div class="flex flex-row justify-between">
            <div class="text-start">
                <div><strong>Admission No. :</strong> {{$data->admission_no}}</div>
                <div><strong>Name :</strong> {{$data->name}}</div>
            </div>
            <div><strong>Date :</strong> {{$data->issue_date}}</div>

        </div>
        <div class="event-title mt-2">{{$data->title}}</div>

        <div class="content">
            {{$data->description}}
        </div>

        <div class="signatures">
            <div class="sign">Principal Sign.</div>
            <div class="sign">Director Sign.</div>
            <div class="sign">Class Teacher Sign.</div>
        </div>

    </div>
</div>

        @include('admin.includes.print_btn')
</body>
</html>
