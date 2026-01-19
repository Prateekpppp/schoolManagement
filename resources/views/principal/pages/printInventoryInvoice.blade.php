<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Expense</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
    </style>
</head>
<body>

<!-- Modal -->
<div class="modal show fade d-block" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content p-3">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Print Expense</h5>
                <button type="button" class="btn-close"></button>
            </div>

            <!-- Print Button -->
            <div class="text-center mb-3">
                <button class="print-btn">Print Expense</button>
            </div>

            <!-- School Info -->
            <div class="text-center">
                <img src="https://via.placeholder.com/60" class="school-logo mb-2" alt="Logo">
                <h5 class="fw-bold mb-1">Intechno Academy Demo</h5>
                <p class="mb-0 info-text">
                    Phone: 555-9509 | Email: school1@intechno.edu.com
                </p>
                <p class="info-text">
                    Address: 813 124 Lakeview Road, Brookfield, New City 458201
                </p>
            </div>

            <!-- Expense Title -->
            <div class="expense-box text-center">
                <h6 class="fw-bold">
                    Expense Title:
                    <span class="fw-normal">Utilities Expense - Nov 2025</span>
                </h6>
            </div>

            <!-- Expense Info -->
            <div class="row mb-3 info-text">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Expense Date:</strong> 05-11-2025</p>
                    <p class="mb-0"><strong>Expense No:</strong> 50</p>
                </div>
                <div class="col-md-6 text-end">
                    <p class="mb-1"><strong>Invoice No:</strong> EXP9043</p>
                    <p class="mb-0"><strong>Supplier Name:</strong> -</p>
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
                    <tr>
                        <td>1.</td>
                        <td>Utilities Expense - Nov 2025</td>
                        <td>₣23,222.00</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="fw-bold text-end">Total</td>
                        <td class="fw-bold">₣23,222.00</td>
                    </tr>
                </tbody>
            </table>

            <!-- Signature -->
            <div class="row signature-section">
                <div class="col-md-6">
                    Authorised By
                </div>
                <div class="col-md-6 text-end">
                    Receiver's Signature
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
