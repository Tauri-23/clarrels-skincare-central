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
                <div class="mar-top-2 info-box-grey">
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



{{-- Appointments Modals --}}
@elseif($modalType == "profile-edit-name")
    <div class="modal1 d-none" id="profile-edit-name-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Edit Name</div>
                <div>
                    <label for="fname-in">Firstname</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" id="fname-in" />
                </div>
                <div class="mar-bottom-3">
                    <label for="lname-in">Lastname</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" id="lname-in" />
                </div>

                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>

@elseif($modalType == "profile-edit-email")
    <div class="modal1 d-none" id="profile-edit-email-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Edit Email</div>
                <div class="mar-bottom-3">
                    <label for="email-in">Email</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" id="email-in" />
                </div>

                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>

@elseif($modalType == "profile-edit-phone")
    <div class="modal1 d-none" id="profile-edit-phone-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Edit Phone</div>
                <div class="mar-bottom-3">
                    <label for="phone-in">Phone</label><br />
                    <input type="text" value="" maxlength="10" class="edit-text-1 w-100" id="phone-in" />
                </div>
    
                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>

@elseif($modalType == "profile-edit-password")
    <div class="modal1 d-none" id="profile-edit-password-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Change Password</div>
                <div class="">
                    <label for="new-pass-in">New password</label><br />
                    <input type="password" value="" class="edit-text-1 w-100" id="new-pass-in" />
                </div>
                <div class="">
                    <label for="con-new-pass-in">Confirm new password</label><br />
                    <input type="password" value="" class="edit-text-1 w-100" id="con-new-pass-in" />
                </div>
                <div class="mar-bottom-3">
                    <label for="old-pass-in">Old password</label><br />
                    <input type="password" value="" class="edit-text-1 w-100" id="old-pass-in" />
                </div>
    
                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>

@elseif($modalType == "profile-edit-address")
    <div class="modal1 d-none" id="profile-edit-address-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Edit Address</div>
                <div class="mar-bottom-3">
                    <label for="address-in">Address</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" id="address-in" />
                </div>

                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>
@endif
