<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Event Certificate</title>

<style>
    body {
        background: #f4f4f4;
        font-family: "Times New Roman", serif;
    }

    .certificate {
        width: 1000px;
        height: 650px;
        margin: 30px auto;
        background: #fff;
        border: 10px solid #b08d57;
        padding: 30px;
        box-sizing: border-box;
    }

    .inner-border {
        border: 3px solid #b08d57;
        height: 100%;
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
        margin-top: 40px;
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
</style>
</head>

<body>

<div class="certificate">
    <div class="inner-border">

        <div class="header-title">{{$appdata->title}}</div>
        <div class="sub-header">
            {{$appdata->address}} |
            Phone No.: {{$appdata->phone}}<br>
            Email: {{$appdata->email}}
        </div>

        <div class="event-title">EVENT CERTIFICATE</div>
        <div class="sports">SPORTS (2026-27)</div>

        <div class="content">
            This is to certify that
            <span class="line fill">{{$data->name}} ({{$data->class}})</span><br>

            has earned this certificate for outstanding achievement in<br>

            <span class="line fill">HHH</span><br>

            on the date
            <span class="line fill">{{date('d-m-Y')}}</span>
            with
            <span class="line fill"></span>
            rank.
        </div>

        <div class="signatures">
            <div class="sign">Principal Sign.</div>
            <div class="sign">Director Sign.</div>
            <div class="sign">Class Teacher Sign.</div>
        </div>

    </div>
</div>

</body>
</html>
