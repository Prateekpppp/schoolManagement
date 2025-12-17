<!-- Rolling Commission Modal -->
<div class="modal fade rolling-commission-modal" id="rollingCommissionModal" tabindex="-1" aria-labelledby="rollingCommissionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header py-2 modal-header-dark">
        <h5 class="modal-title fs-6" id="rollingCommissionModalLabel">Rolling Commission</h5>
        <a type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>

      <!-- Modal Body with the form -->
      <div class="modal-body-dark">
        <form action="#" method="POST">
          @csrf

          <!-- Repeating Row for Each Input -->
          <div class="row mb-2 ms-1 me-1 align-items-center">
            <label class="col-5 col-form-label" for="fancy">Fancy</label>
            <div class="col-7">
              <input type="text" name="rollingfancy" class="form-control form-control-sm" placeholder="...">
            </div>
          </div>

          <div class="row mb-2 ms-1 me-1 align-items-center">
            <label class="col-5 col-form-label" for="matka">Matka</label>
            <div class="col-7">
              <input type="text" name="rollingmatka" class="form-control form-control-sm" placeholder="...">
            </div>
          </div>

          <div class="row mb-2 ms-1 me-1 align-items-center">
            <label class="col-5 col-form-label" for="casino">Casino</label>
            <div class="col-7">
              <input type="text" name="rollingcasino" class="form-control form-control-sm" placeholder="...">
            </div>
          </div>

          <div class="row mb-2 ms-1 me-1 align-items-center">
            <label class="col-5 col-form-label" for="sportbook">Sportbook</label>
            <div class="col-7">
              <input type="text" name="rollingsportbook" class="form-control form-control-sm" placeholder="...">
            </div>
          </div>

          <div class="row mb-2 ms-1 me-1 align-items-center">
            <label class="col-5 col-form-label" for="bookmaker">Bookmaker</label>
            <div class="col-7">
              <input type="text" name="rollingbookmaker" class="form-control form-control-sm" placeholder="...">
            </div>
          </div>

          <div class="row mb-2 ms-1 me-1 align-items-center">
            <label class="col-5 col-form-label" for="virtual_sports">Virtual Sports</label>
            <div class="col-7">
              <input type="text" name="virtual_sports" class="form-control form-control-sm" placeholder="...">
            </div>
          </div>

          <div class="row mb-3 ms-1 me-1 align-items-center">
            <label class="col-5 col-form-label" for="password">Password</label>
            <div class="col-7">
              <input type="password" name="commissionpassword" class="form-control form-control-sm">
            </div>
          </div>

          <!-- Footer Buttons -->
          <div class="d-flex justify-content-end gap-2 me-1">
            <a href="javascript:0" onclick="this.closest('form').submit();" class="btn btn-primary btn-sm">Submit</a>
            <a href="javascript:0" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</a>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
