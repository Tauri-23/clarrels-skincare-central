@if ($modalType == "success")
    <div class="modal1 d-none success-modal" id="success-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="modal1-txt text-center modal-text color-green">
                <!-- Content for green modal -->
            </div>
        </div>
    </div>
@elseif ($modalType == "error")
    <div class="modal1 d-none error-modal" id="error-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="modal1-txt text-center modal-text color-red">
                <!-- Content for red modal -->
            </div>
        </div>
    </div>
@elseif($modalType == "info")
    <div class="modal1 d-none info-modal" id="info-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="modal1-txt text-center modal-text">
                <!-- Content for red modal -->
            </div>
        </div>
    </div>




@elseif($modalType == "info-yn")
    <div class="modal1 d-none info-yn-modal" id="info-yn-modal">
        <div class="modal1-box-small modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="modal1-txt text-center">
            </div>
        </div>
    </div>











{{-- Appointments Modals --}}
@elseif($modalType == "appointment-prev")
    <div class="modal1 d-none" id="appointment-prev-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="d-flex w-100 flex-direction-y gap2">
                <div class="txt-l2 text-center">Appointment</div>
                <div class="mar-top-2">
                    <div class="txt-l2 doc-name">Doctor Name</div>
                    <div class="txt-m2 appointment-date">Apr 2, 2023 at 2:00pm</div>
                </div>
                <div>
                    <div class="txt-l3 service">Service</div>
                    <div class="txt-m2 service-type">Service Type</div>
                </div>
                <div>
                    <div class="d-flex w-100">
                        <div class="txt-l3 w-30">Patient name: </div>
                        <div class="txt-l3 w-75 patient-name"></div>
                    </div>
                    <div class="d-flex w-100">
                        <div class="txt-l3 w-30">Phone: </div>
                        <div class="txt-l3 w-75 patient-phone"></div>
                    </div>
                    <div class="txt-l3">Note: </div>
                    <div class="txt-l3 patient-note"></div>
                </div>
            </div>
        </div>
    </div>
@endif
