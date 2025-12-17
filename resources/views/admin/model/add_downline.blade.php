<div class="modal fade" id="addDownlineModal" tabindex="-1" aria-labelledby="addDownlineModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md"> 
        <div class="modal-content shadow">

            <!-- Modal Header -->
            <div class="modal-header modal-header-dark">
                <h5 class="modal-title" id="addDownlineModalLabel">Add Downline</h5>
                <a type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                    aria-label="Close"></a>
            </div>

            <!-- Modal Body -->
            <div class="modal-body-dark py-3 px-3">
                <form id="addDownlineForm">
                    @csrf

                    <!-- User & Reference Name -->
                    <div class="row gx-2 mb-2">
                        <div class="col-6">
                            <label class="form-label">User Name</label>
                            <input type="text" name="username" class="form-control form-control-sm"
                                placeholder="User Name">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Reference Name</label>
                            <input type="text" name="reference_name" class="form-control form-control-sm"
                                placeholder="Reference Name">
                        </div>
                    </div>

                    <!-- Password & Retype Password -->
                    <div class="row gx-2 mb-2">
                        <div class="col-6">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm"
                                placeholder="Password">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Retype Password</label>
                            <input type="password" name="retype_password" class="form-control form-control-sm"
                                placeholder="Retype Password">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Partnership Sharing -->
                        <div class="mb-3 col-6">
                            <label class="form-label">Downline Sharing</label>
                            <div class="input-group input-group-sm">
                                <input type="number" name="downline_sharing" class="form-control" placeholder="%"
                                    min="0" max="100">
                                <span class="input-group-text">(My Sharing 0%)</span>
                            </div>
                        </div>

                        <!-- Credit Reference -->
                        <div class="mb-3 col-6">
                            <label class="form-label">Credit Reference</label>
                            <input type="text" name="credit_reference" class="form-control form-control-sm"
                                placeholder="Credit Reference">
                        </div>

                        <!-- Add Deposit -->
                        <div class="mb-3 col-6">
                            <label class="form-label">Add Deposit</label>
                            <input type="number" name="add_deposit" class="form-control form-control-sm"
                                placeholder="Amount">
                        </div>

                        <!-- Deposit Remark -->
                        <div class="mb-3 col-6">
                            <label class="form-label">Deposit Remark</label>
                            <input type="text" name="deposit_remark" class="form-control form-control-sm"
                                placeholder="Remark">
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer py-2 px-3">
                <a href="javascript:0" type="submit" class="btn btn-sm btn-primary"
                    onclick="document.getElementById('addDownlineForm').submit(); return false;">Create</a>
                <a href="javascript:0" type="button" class="btn btn-sm btn-secondary"
                    data-bs-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
