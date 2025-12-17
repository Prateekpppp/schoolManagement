
    <!-- Generic Reusable Modal -->
    <div class="modal fade" id="mainModal" tabindex="-1" aria-labelledby="mainModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="mainModalLabel">@yield('title', 'Modal Title')</h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    @yield('form')
                </div>

            </div>
        </div>
    </div>
