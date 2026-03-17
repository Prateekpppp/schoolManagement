<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>ID Card</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
  body {
    background: #eee;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  .id-card {
    width: 300px;
    background: #fff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    font-family: Arial, sans-serif;
    border-radius: 5px;
    overflow: hidden;
  }
  .top-shape {
    width: 100%;
    height: 140px;
    background: maroon; /* same orange */
    /* clip-path: polygon(0 0, 100% 0, 100% 70%, 50% 100%, 0 70%); */
    color: white;
    text-align: center;
    padding-top: 20px;
    position: relative;
  }
  .top-shape h3 {
    margin: 0;
    font-weight: 700;
    font-size: 13px;
    letter-spacing: 0.03em;
  }
  .top-shape p {
    margin: 0px 0 0 0;
    font-size: 10px;
    font-weight: 500;
}
  .photo-wrapper {
    position: absolute;
    top: 90px;
    left: 50%;
    transform: translateX(-50%);
    width: 110px;
    height: 110px;
    border: 5px solid white;
    border-radius: 50%;
    background: white;
    overflow: hidden;
  }
  .photo-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .info {
    margin-top: 70px;
    padding: 10px 25px 20px 25px;
  }
  .info-row {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
    margin-bottom: 1px;
    color: #222;
  }
  .info-row .label {
    font-weight: 600;
  }
  .info-row .value {
    font-weight: 500;
  }
  .footer-bar {
    background: green;
    color: white;
    text-align: center;
    font-size: 12px;
    padding: 7px 15px;
    font-weight: 500;
  }
  .qrimage{
          position: absolute;
    left: 55%;
    width: 48px;
    bottom: 56%;
  }
</style>
</head>
<body>
  
  <div class="id-card">
    <div class="top-shape">
        <div class="row w-100 m-0">
            <div class="col-3"> <img src="{{asset('/').$appdata->logo}}" alt="logo" width="100%"></div>
            <div class="col-9"><h3>{{$appdata->title}}</h3>
            <p class="address_main">{{$appdata->address}} - {{$appdata->phone}}</p></div>
        </div>
      
      
      <div class="photo-wrapper">
        <img src="{{asset('/').$student->photo}}" alt="Student Photo" />
        
      </div>
    </div>
    <div class="info">
      <img src="{{asset('/').$student->qrcode}}" alt="QR Code" class="qrimage" width="80px">
      <div class="info-row"><div class="label">Admission Number: </div><div class="value"> {{$student->admission_no}}</div></div>
      <div class="info-row"><div class="label">Student Name: </div><div class="value"> {{$student->name}}</div></div>
      <div class="info-row"><div class="label">Father / Guardian:</div><div class="value"> {{$student->father_name}}</div></div>
      <div class="info-row"><div class="label">Blood Group:</div><div class="value"> {{$student->blood_group}}</div></div>
      <div class="info-row"><div class="label">Class:</div><div class="value"> {{$student->class}} {{$student->section}}</div></div>
      <div class="info-row"><div class="label">Roll No:</div><div class="value"> {{$student->roll_no}}</div></div>
      <div class="info-row"><div class="label">Phone:</div><div class="value"> {{$student->phone}}</div></div>
    </div>
    <div class="footer-bar">
      {{$student->address}}
    </div>
  </div>
  <br>
  <button class="print-btn btn btn-primary" style="position: absolute; left: 50%; top: 10%;" onclick="window.print()">Print ID Cards</button>
</body>
</html>