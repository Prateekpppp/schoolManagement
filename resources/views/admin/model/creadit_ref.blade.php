
<div class="modal fade credit_ref_modal" id="creditRefModal" tabindex="-1" aria-labelledby="creditRefModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header py-2" style="background-color: #007bff; color: white;">
                <h5 class="modal-title fs-6" id="creditRefModalLabel">creadit_ref</h5>
                <a type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>

            <!-- Modal Body with the form -->
            <div class="modal-body">
                <form id="credit_ref_form" class="credit_ref" action="#" method="POST">
                    @csrf
                    <!-- Current -->
                    <div class="mb-3">
                        <label for="current" class="form-label">Current</label>
                        <input type="text" name="refcurrent" class="form-control" value="0" readonly>
                    </div>

                    <!-- New -->
                    <div class="mb-3">
                        <label for="new" class="form-label">New</label>
                        <input type="text" name="refnew" class="form-control">
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="refpassword" class="form-control">
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end">
                        <a href="javascript:0" type="submit" class="btn btn-primary btn-sm me-2">Submit</a>
                        <a href="javascript:0" type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
