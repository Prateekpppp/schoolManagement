<!-- Rolling Commission Modal -->
<div class="modal fade agent-rolling-commission-modal" id="agentrollingCommissionModal" tabindex="-1"
    aria-labelledby="agentrollingCommissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header py-2 modal-header-dark">
                <h5 class="modal-title fs-6" id="rollingCommissionModalLabel">Agent Rolling Commission</h5>
                <a type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>

            <!-- Modal Body with the form -->
            <div class="modal-body-dark">
                <form action="#" method="POST">
                    @csrf

                    <!-- Input Row Template -->
                    <div class="form-group d-flex align-items-center mb-2 ms-1 me-1">
                        <label for="fancy" class="me-2 mb-0" style="width: 100px;">Fancy</label>
                        <input type="number" name="agentfancy" id="fancy" class="form-control" value="0">
                    </div>

                    <div class="form-group d-flex align-items-center mb-2 ms-1 me-1">
                        <label for="matka" class="me-2 mb-0" style="width: 100px;">Matka</label>
                        <input type="number" name="agentmatka" id="matka" class="form-control" value="0">
                    </div>

                    <div class="form-group d-flex align-items-center mb-2 ms-1 me-1">
                        <label for="casino" class="me-2 mb-0" style="width: 100px;">Casino</label>
                        <input type="number" name="agentcasino" id="casino" class="form-control" value="0">
                    </div>

                    <div class="form-group d-flex align-items-center mb-2 ms-1 me-1">
                        <label for="binary" class="me-2 mb-0" style="width: 100px;">Binary</label>
                        <input type="number" name="agentbinary" id="binary" class="form-control" value="0">
                    </div>

                    <div class="form-group d-flex align-items-center mb-2 ms-1 me-1">
                        <label for="sportbook" class="me-2 mb-0" style="width: 100px;">Sportbook</label>
                        <input type="number" name="agentsportbook" id="sportbook" class="form-control" value="0">
                    </div>

                    <div class="form-group d-flex align-items-center mb-2 ms-1 me-1">
                        <label for="bookmaker" class="me-2 mb-0" style="width: 100px;">Bookmaker</label>
                        <input type="number" name="agentbookmaker" id="bookmaker" class="form-control" value="0">
                    </div>

                    <!-- Submit Button -->
                    <a href="javascript:0" type="submit" class="btn btn-primary">Submit</a>
                </form>
            </div>

        </div>

    </div>
</div>
</div>
