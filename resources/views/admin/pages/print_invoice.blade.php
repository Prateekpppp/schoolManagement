<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Fee Invoice</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('js') }}/tailwind.min.js"></script>

    <style>
        body {
            background-color: #f0f2f5;
        }

        .modal-header {
            border-bottom: none;
        }

        .print-btn {
            background-color: #28a745;
            color: #fff;
            padding: 6px 16px;
            border-radius: 4px;
            font-size: 14px;
        }

        .school-logo {
            width: 60px;
        }

        .expense-box {
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
            margin: 15px 0;
        }

        .info-text {
            font-size: 14px;
        }

        table th, table td {
            border: 1px solid #dee2e6 !important;
            padding: 12px;
            font-size: 14px;
        }

        table th {
            text-align: center;
            background-color: #f8f9fa;
        }

        .signature-section {
            margin-top: 50px;
            font-weight: 600;
        }

        .modal-content {
            border-radius: 6px;
        }
        .modal {
            display: block !important;
        }
    </style>
</head>
<body>

    @php
    $cnt = 0;
    @endphp
<!-- Modal -->
<div class="modal show fade d-block p-3" tabindex="-1">
    <div class="w-75 mx-auto my-3">
        <div class="modal-content p-3">



            <!-- School Info -->
                <div class="text-center flex justify-center items-center">
                    @include('admin.includes.print_header')


                </div>

            <!-- Expense Title -->
            <div class="expense-box text-center">
                <h6 class="fw-bold">
                    Invoice:
                    <span class="fw-normal"> {{$invoice_date}}</span>
                </h6>
            </div>

            <!-- Expense Info -->
            <div class="row mb-3 info-text">
                <div class="col-md-6">
                    <p class="mb-0"><strong>Invoice No:</strong> {{$data->feeinvoice_no}}</p>
                    <p class="mb-0"><strong>Invoice Date:</strong> {{$data->invoice_date}}</p>
                </div>
                <div class="col-md-6 text-end">
                    <p class="mb-0"><strong>Student Name:</strong> {{$student->name}}</p>
                    <p class="mb-0"><strong>Class Name:</strong> {{$student->class}} ({{$student->section}}) - ({{$student->roll_no}})</p>
                    <p class="mb-0"><strong>Admission No:</strong> {{$student->admission_no}}</p>
                </div>
            </div>

            <!-- Table -->
            <table class="table text-center">
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
                        $cnt = $k+1;
                        if($fee->month){
                            if($fee->month != $invoiceMonth) continue;
                        }
                    @endphp
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$fee->name}}</td>
                        <td>{{$fee->amount}} /-</td>
                    </tr>
                    @endforeach

                    @if($back_dues)
                    <tr>
                        <td>{{$cnt+1}}</td>
                        <td>Back Dues</td>
                        <td>{{$back_dues}} /-</td>
                    </tr>
                    @endif

                    @if($scRoute)
                    <tr>
                        <td>{{$cnt+1}}</td>
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

            <!-- Signature -->
            <div class="flex flex-row justify-between signature-section">
                <div class="w-50 flex flex-col gap-2">
                    <span>Authorised By</span>
                    {{-- <img src="{{asset('/').$appdata->stamp}}" alt="logo" width="150px"> --}}
                </div>
                <div class="w-50 flex flex-col gap-2 items-end">
                    <span>Receiver's Signature</span>
                    {{-- <img src="{{asset('/').$appdata->signature}}" alt="logo" width="150px"> --}}
                </div>
            </div>

        </div>
    </div>
    
    
    <!-- Print Button -->
    <div class="printbtn text-center mb-3">
    <button class="print-btn">Print Expense</button>
    </div>
</div>

<script>
    let printbtn = document.getElementsByClassName('printbtn')[0];
    printbtn.onclick = function() {
        printbtn.style.display = 'none';
        window.print();
    };
</script>
</body>
</html>
