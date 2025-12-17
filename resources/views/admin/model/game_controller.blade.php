<!-- Compact Reusable Modal with Form -->
<div class="modal fade" id="gameControllerModal" tabindex="-1" aria-labelledby="gameControllerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content border-0 shadow-lg">

            <!-- Modal Header -->
            <div class="modal-header modal-header-dark py-2">
                <h5 class="modal-title fs-6" id="editNewsModalLabel">🎮 Game Controller</h5>
                <a type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>

            <!-- CSRF -->
            <form method="POST" action="/save-game-settings">
                @csrf

                <!-- Modal Body -->
                <div class="modal-body-dark px-3 py-2">

                    <!-- Game 1 -->
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="game1Switch" checked>
                        <label class="form-check-label fw-semibold" for="game1Switch">Cricket</label>
                    </div>

                    <!-- Game 2 -->
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="game2Switch">
                        <label class="form-check-label fw-semibold" for="game2Switch">Football</label>
                    </div>

                    <!-- Game 3 -->
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="game3Switch" checked>
                        <label class="form-check-label fw-semibold" for="game3Switch">Tennis</label>
                    </div>
                    
                </div>

            </form>

        </div>
    </div>
</div>
