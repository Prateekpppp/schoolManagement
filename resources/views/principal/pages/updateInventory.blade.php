@extends('admin.inner_master')

@section('inner_body')

                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Add Inventory</h3>
                            </div>
                            <div>
                                <a href="{{route('admin.pages.inventory')}}" class="btn fw-btn-fill btn-gradient-yellow !max-w-min">View All</a>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div>
                        <form class="new-added-form">
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Invoice No. *</label>
                                    <input name="invoice_no" value="{{ $data->invoice_no }}" type="text" placeholder="" class="form-control required" readonly>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Category </label>
                                    <select name="category_id" class="select2 changeInventoryCategory required">
                                        <option value="">Please Select Category *</option>
                                        @foreach($inventoryCategory as $class)
                                            <option {{ $data->category_id == $class->id ? 'selected' : '' }} value="{{$class->id}}">{{$class->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class </label>
                                    <select name="class_id" class="select2 required" readonly>
                                        <option class="classAfter" value="" disabled>Please Select Class *</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Student </label>
                                    <select name="student_id" class="select2 required">
                                        <option class="" value="">Please Select Student *</option>
                                        @foreach($students as $class)
                                            <option {{ $data->student_id == $class->id ? 'selected' : '' }} value="{{$class->id}}">{{$class->admission_no}} | {{$class->roll_no}} | {{$class->name}} | {{$class->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Payment Method </label>
                                    <select name="payment_method" class="select2">
                                        <option class="" value="">Please Select Method *</option>
                                        <option {{ $data->payment_method == 'Cash' ? 'selected' : '' }} class="" value="Cash">Cash</option>
                                        <option {{ $data->payment_method == 'UPI' ? 'selected' : '' }} class="" value="UPI">UPI</option>
                                        <option {{ $data->payment_method == 'Online' ? 'selected' : '' }} class="" value="Online">Online</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Amount *</label>
                                    <input name="amount" value="{{ $data->amount }}" type="text" placeholder="" class="form-control required" readonly>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Transaction ID *</label>
                                    <input name="transaction_id" value="{{ $data->transaction_id }}" type="text" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Discount in percentage *</label>
                                    <input name="discount" value="{{ $data->discount }}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Total Amount *</label>
                                    <input name="total_amount" value="{{ $data->total_amount }}" type="text" placeholder="" class="form-control required">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Invoice Date *</label>
                                    <input name="invoice_date" value="{{ $data->invoice_date }}" type="text" placeholder="dd/mm/yyyy" class="form-control air-datepicker required">
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit"
                                        class="submitForm btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    <button type="reset"
                                        class="reset_form btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add New Teacher Area End Here -->

@endsection


@section('inner_js')

<script>

    function submitForm(form){
        let data = new FormData($(form)[0]);
        callAjaxFormData('post',"{{route('admin.post.createInventory')}}",data,ajaxResponseModal);
    }

    function changeClass(response){
        $('.classAfter').nextAll().remove();
        let html = '';
        response = response.inventoryCategory;

        // $(response.inventoryCategory).each(function(i,item){
            
            html += `
                <option selected value="${response.class_id}">${response.class}</option>
            `;    
            
        // });

        $('.classAfter').after(html);
        
        $('input[name="amount"]').val(response.amount);
        
    }

    $('.changeInventoryCategory').on('change', function(){
        callApi('post',"{{route('admin.post.getClassByInventoryCategory')}}",{id:$(this).val()},changeClass);
    });

    $(document).ready(function(){
        let category_id = $('.changeInventoryCategory').val();
        if(category_id){
            callApi('post',"{{route('admin.post.getClassByInventoryCategory')}}",{id:category_id},changeClass);
        }
    });

    $('input[name="discount"]').on('keyup', function(){
        let amount = $('input[name="amount"]').val();
        let discount = $(this).val();
        let total = amount - (amount * (discount/100));
        $('input[name="total_amount"]').val(total);
    });
    // $('.remove_feeHead').on('click', function(){
    //     data = {};
    //     data['class_id'] = $(this).attr('class_id');
    //     data['section_id'] = $(this).attr('section_id');
    //     callApi('post',"{{route('admin.post.remove_cSection')}}",data,ajaxResponseModal);
    // });
    

</script>

@endsection