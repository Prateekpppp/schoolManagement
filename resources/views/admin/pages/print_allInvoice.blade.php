<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulk Invoice</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        /* Receipt Container */
        .receipt-box {
            width: 793px;
            height: 460px; /* half page A4 approx */
            background: #fff;
            margin: auto 0;
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

        /* Signature */
        .signature {
        }

        /* PRINT SETTINGS */
        @media print {
            body {
                background: none;
            }

            .receipt-box {
                width: 100%;
                height: 48vh; /* half page */
                page-break-inside: avoid;
            }

            .page-break {
                page-break-after: always;
            }
        }
    </style>
</head>

<body>
@if(isset($invoices) && count($invoices) > 0)
    @foreach($invoices as $index => $allData)
    @php $cnt = 0; @endphp

    <div class="receipt-box mb-3">

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
        <div class="fee-title">INVOICE - {{$allData->invoice_date}}</div>

        <!-- Info -->
        <div class="row info-row">
            <div class="col-6">
                <p class="mb-0"><strong>Invoice No:</strong> {{$allData->data->feeinvoice_no}}</p>
                <p class="mb-0"><strong>Invoice Date:</strong> {{$allData->data->invoice_date}}</p>
            </div>
            <div class="col-6 text-end">
                <p class="mb-0"><strong>Student Name:</strong> {{$allData->student->name}}</p>
                <p class="mb-0"><strong>Class Name:</strong> {{$allData->student->class}} ({{$allData->student->section}}) - ({{$allData->student->roll_no}})</p>
                <p class="mb-0"><strong>Admission No:</strong> {{$allData->student->admission_no}}</p>
            </div>
        </div>

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
                @foreach($allData->fees as $k => $fee)
                    @php
                        $cnt += 1;
                        if($fee->month && $fee->month != $allData->invoiceMonth) continue;
                    @endphp
                    <tr>
                        <td>{{$cnt}}</td>
                        <td>{{$fee->name}}</td>
                        <td>{{$fee->amount}} /-</td>
                    </tr>
                @endforeach

                @if($allData->back_dues)
                    <tr>
                        <td>{{$cnt+1}}</td>
                        <td>Back Dues</td>
                        <td>{{$allData->back_dues}} /-</td>
                    </tr>
                @endif
                @if($allData->scRoute)
                    <tr>
                        <td>{{$cnt+1}}</td>
                        <td>Transport Fee</td>
                        <td>{{$allData->scRoute->route_fare}} /-</td>
                    </tr>
                @endif
                <tr>
                    <td colspan="2" class="fw-bold text-end">This Month</td>
                    <td class="fw-bold">{{$allData->data->total_amount - $allData->currentPaid}} /-</td>
                </tr>
                <tr>
                    <td colspan="2" class="fw-bold text-end">Previous Paid</td>
                    <td class="fw-bold">{{$allData->currentPaid}} /-</td>
                </tr>
                <tr>
                    <td colspan="2" class="fw-bold text-end">Previous Dues</td>
                    <td class="fw-bold">{{$allData->previous_due_amount}} /-</td>
                </tr>
                <tr>
                    <td colspan="2" class="fw-bold text-end">Total</td>
                    <td class="fw-bold">{{$allData->data->total_amount - $allData->currentPaid + $allData->previous_due_amount}} /-</td>
                </tr>
            </tbody>
        </table>

        <!-- Signature -->
        <div class="row">
            <div class="col-6">
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

    <!-- Page break every 2 receipts -->
    @if(($index + 1) % 2 == 0)
        <div class="page-break"></div>
    @endif

    @endforeach
@endif

</body>

</html>