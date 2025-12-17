<!-- Add Message Modal -->
<div class="modal fade add-message-modal" id="addMessageModal" tabindex="-1" aria-labelledby="addMessageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header modal-header-dark py-2">
                <h5 class="modal-title fs-6" id="addMessageModalLabel">Enter News</h5>
                <a type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <!-- Modal Body with Form -->
            <div class="modal-body p-3">
                <form action="#" method="POST" id="addMessageForm">
                    @csrf

                    <!-- Description Field -->
                    <div class="form-group mb-4">
                        <label for="description">Description</label>
                        <input type="text" name="news" id="description" class="form-control"
                            placeholder="Description...">
                    </div>

                    <!-- Buttons -->
                    <div class="form-group text-end">
                        <a href="javascript:0" class="btn btn-dark add_news">Add</a>
                        <a href="javascript:0" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
