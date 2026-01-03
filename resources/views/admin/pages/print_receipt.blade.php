@extends('admin.master')

@section('body')

    <div class="container">
        <div class="flex flex-col my-3">
            <h2 class="text-center">Germination Mission School</h2>
            <div class="flex flex-col gap-3 text-lg">
                <div class="phone">
                    <strong>Phone: </strong> {{$appdata->phone}}
                </div>
                
                <div class="email">
                    <strong>Email: </strong> {{$appdata->email}}
                </div>
                
                <div class="address">
                    <strong>Address: </strong> {{$appdata->address}}
                </div>
            </div>
        </div>
        <hr>
        <div class="flex flex-row justify-between gap-2">
            <h4>Payment Receipt</h4>
            <div><strong>Receipt No. :</strong>{{$data->receipt_no}}</div>
        </div>
        <div class="table-responsive">
            <table class="table display text-nowrap">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="tdata">
                    <tr>
                        <td>Receipt Number</td>
                        <td>{{$data->receipt_no}}</td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td>{{$data->transaction_amount}}</td>
                    </tr>
                    <tr>
                        <td>Transasction ID</td>
                        <td>{{$data->transasction_id ?? '--'}}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>{{$data->date}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        </div>
    </div>

@endsection