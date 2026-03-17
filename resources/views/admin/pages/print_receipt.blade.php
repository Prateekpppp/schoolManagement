<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Receipt</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        /* Receipt Container */
        .receipt-box {
            width: 793px;
            height: 450px;
            
            /*width: 210mm;*/
            /*height: 148mm;*/
            /* 50% of A4 (297mm / 2) */
            background: #fff;
            margin: auto;
            padding: 15px;
            border: 1px solid #ccc;
            box-sizing: border-box;
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
            height: 450px;
                /* Half A4 */
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>

    <div class="receipt-box">

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
        <div class="fee-title">FEE RECEIPT - {{$payment_date}}</div>

        <!-- Info -->
        <div class="row info-row">
            <div class="col-6">
                <p class="mb-0"><strong>Receipt No:</strong> {{$data->receipt_no}}</p>
                <p class="mb-0"><strong>Payment Date:</strong> {{$data->date}}</p>
                <p class="mb-0"><strong>Total Amount:</strong> ₹{{$feeInvoice}} /-</p>
                <p class="mb-0"><strong>Total Paid:</strong> ₹{{$total_transaction}} /-</p>
                <p class="mb-0"><strong>Due Date:</strong> {{$data->due_date }}</p>
            </div>
            <div class="col-6 text-end">
                <p class="mb-0"><strong>Student Name:</strong> {{$student->name}}</p>
                <p class="mb-0"><strong>Class Name:</strong> {{$student->class}} ({{$student->section}}) -
                    ({{$student->roll_no}})</p>
                <p class="mb-0"><strong>Admission No:</strong> {{$student->admission_no}}</p>
                <p class="mb-0"><strong>Due Amount:</strong> ₹{{$feeInvoice - $total_transaction}} /-</p>
            </div>
        </div>

        <!-- Table -->
        <table class="table table-custom mt-2 table-striped">
            <thead>
                <tr>
                    <th>S.No.</th>                    
                    <th>Fees Head</th>
					<th>Total Amount</th>
                    <th>Paid</th>
                    <th>Due Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>{{$data->title}}</td>
                    <td>₹{{$feeInvoice}} /-</td>
                    <td>₹{{$data->transaction_amount}} /-</td>
                    <td>₹100.00</td>
                </tr>
                <tr>
                    <td colspan="2"><b>Grand Total</b></td>
                    <td><b>₹{{$feeInvoice}} /-</b></td>
                    <td><b>₹{{$data->transaction_amount}} /-</b></td>
                    <td><b>₹{{$feeInvoice - $total_transaction}} /-</b></td>
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