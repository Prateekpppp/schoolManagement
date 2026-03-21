<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        /* Receipt Container */
        .receipt-box {
            width: 793px;
            height: 460px;
            
            /*width: 210mm;*/
            /*height: 148mm;*/
            /* 50% of A4 (297mm / 2) */
            background: #fff;
            margin: auto;
            padding: 15px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            line-height: 18px;
        }

        /* Header */
        .school-header {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 60px;
            margin-right: 10px;
        }

        .school-title {
            font-weight: 600;
            font-size: 20px;
        }

        .school-info {
            font-size: 12px;
        }

        /* Fee Title */
        .fee-title {
            background: #dfead8;
            text-align: center;
            font-weight: bold;
            letter-spacing: 2px;
            padding: 5px;
            margin: 10px 0;
        }

        /* Info rows */
        .info-row {
            font-size: 13px;
        }

        /* Table */
        .table-custom th,
        .table-custom td {
            border: 1px solid #000 !important;
            font-size: 12px;
            padding: 4px;
        }

        .table-custom th {
            background: #dfead8;
        }

        /* Footer text */
        .footer-text {
            font-size: 13px;
            margin-top: 10px;
        }

        /* Signature */
        .signature {
            /*text-align: right;*/
            /*margin-top: 30px;*/
        }

        /* PRINT SETTINGS */
        @media print {
            body {
                background: none;
            }

            .receipt-box {
               width: 793px;
            height: 500px;
                /* Half A4 */
                page-break-inside: avoid;
            }
            .page-break {
                page-break-before: always;
            }
    </style>
</head>

<body>

    <div class="receipt-box page-break">

        <!-- Header -->
        <div class="school-header">
            <img src="{{asset('/').$appdata->logo}}" class="logo" alt="Logo">
            <div>
                <div class="school-title">{{$appdata->title}}</div>
                <div class="school-info">
                     Phone: {{$appdata->phone}} | Email: {{$appdata->email}} | <br>
                    {{$appdata->address}}
                </div>
            </div>
        </div>

        <!-- Title -->
        <div class="fee-title">INVOICE - {{$invoice_date}}</div>

        <!-- Info -->
        <div class="row info-row">
            <div class="col-6">
                <p class="mb-0"><strong>Invoice No:</strong> {{$data->feeinvoice_no}}</p>
                    <p class="mb-0"><strong>Invoice Date:</strong> {{$data->invoice_date}}</p>
            </div>
            <div class="col-6 text-end">
                <p class="mb-0"><strong>Student Name:</strong> {{$student->name}}</p>
                    <p class="mb-0"><strong>Class Name:</strong> {{$student->class}} ({{$student->section}}) - ({{$student->roll_no}})</p>
                    <p class="mb-0"><strong>Admission No:</strong> {{$student->admission_no}}</p>
            </div>
        </div>
        @php
        $cnt = 0;
        @endphp
        <!-- Table -->
        <table class="table table-custom mt-2 table-striped">
            <thead>
                <tr>
                    <th style="width: 10%;">Sr. No</th>
                    <th>Title</th>
                    <th style="width: 20%;">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fees as $k => $fee)
                @php
                    $cnt = $cnt+1;
                    if($fee->month){
                        if($fee->month != $invoiceMonth) continue;
                    }
                @endphp
                <tr>
                    <td>{{$cnt}}</td>
                    <td>{{$fee->name}}</td>
                    <td>{{$fee->amount}} /-</td>
                </tr>
                @endforeach

                {{-- @if($back_dues)
                <tr>
                    <td>{{$cnt}}</td>
                    <td>Back Dues</td>
                    <td>{{$back_dues}} /-</td>
                </tr>
                @endif --}}

                @if($scRoute)
                <tr>
                    <td>{{$cnt}}</td>
                    <td>Transport Fee</td>
                    <td>{{$scRoute->route_fare}} /-</td>
                </tr>
                @endif
                <tr>
                    <td colspan="2" class="fw-bold text-end">This Month</td>
                    {{-- <td class="fw-bold">{{$currentTransactions}} /-</td> --}}
                    <td class="fw-bold">{{$data->total_amount - $currentPaid}} /-</td>

                </tr>
                <tr>
                    <td colspan="2" class="fw-bold text-end">Previous Paid</td>
                    <td class="fw-bold">{{$currentPaid}} /-</td>
                </tr>
                <tr>
                    <td colspan="2" class="fw-bold text-end">Previous Dues</td>
                    <td class="fw-bold">{{$previous_due_amount}} /-</td>
                </tr>
                <tr>
                    <td colspan="2" class="fw-bold text-end">Total</td>
                    <td class="fw-bold">{{$data->total_amount - $currentPaid + $previous_due_amount}} /-</td>
                </tr>
            </tbody>
        </table>
        
        <div class="row">
             <div class="col-6">
             <!-- Signature -->
        <div class="signature text-start">
            <br><br>
            ___________________<br>
            Authorised By
        </div>
        </div>
        
        <div class="col-6">
        <div class="signature text-end">
            <br><br>
            ___________________<br>
            Receiver's Signature
        </div>
        </div>
        </div>
       
       

    </div>

</body>

</html>