<div class="modal fade user-status-modal" id="casinocontrolModal" tabindex="-1" aria-labelledby="casinocontrolModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content mx-2">

      <!-- Modal Header -->
      <div class="modal-header modal-header-dark py-2">
        <h5 class="modal-title fs-6" id="casinocontrolModalLabel">Casino Control</h5>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body modal-body-dark">
        <form id="casinoForm" method="POST">

          <!-- Casino Name + Status -->
          <div class="row mb-3">
            <div class="col-6">
              <label for="casino-name" class="form-label">Casino Name</label>
              <select class="form-select form-select-sm" id="casino-status">
                <option value="">Select Provider</option>
                <option value="active">Ezuki</option>
                <option value="inactive">Playtech</option>
              </select>
            </div>
            <div class="col-6">
              <label for="casino-status" class="form-label">Search game</label>
              <input type="text" class="form-control form-control-sm" id="casino-name" placeholder="Enter Game">
            </div>
            <div class="col-6">
              <label for="casino-status" class="form-label">Game Status</label>
              <select class="form-select form-select-sm" id="casino-status">
                <option value="">Select Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
            </div>
          </div>

          <!-- Max Bets + Start Date -->
          <!-- <div class="row mb-3">
            <div class="col-6">
              <label for="max-bets" class="form-label">Max Bets Allowed</label>
              <input type="number" class="form-control form-control-sm" id="max-bets" placeholder="Enter max bet amount">
            </div>
            <div class="col-6">
              <label for="casino-datetime" class="form-label">Start Date & Time</label>
              <input type="datetime-local" class="form-control form-control-sm" id="casino-datetime">
            </div>
          </div> -->

          <!-- Remarks Field -->
          <!-- <div class="mb-3">
            <label for="remarks" class="form-label">Remarks</label>
            <textarea class="form-control form-control-sm" id="remarks" rows="3" placeholder="Enter remarks or additional info"></textarea>
          </div> -->

        </form>

      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <a type="submit" class="btn btn-primary btn-sm">Save Changes</a>
      </div>
    </div>
  </div>
</div>
