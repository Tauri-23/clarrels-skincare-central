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
            <div class="d-flex justify-content-center gap1 mar-top-2">
                <a class="primary-btn2-small" id="modal-close-btn">No</a>
                <a class="yes-btn primary-btn3-small">Yes</a>
            </div>
        </div>
    </div>
@endif
