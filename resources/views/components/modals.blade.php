@if ($modalType == "success")
    <div class="modal1 d-none success-modal" id="success-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="modal1-txt text-center modal-text color-green">
                <!-- Content for green modal -->
            </div>
        </div>
    </div>
@elseif ($modalType == "error")
    <div class="modal1 d-none error-modal" id="error-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="modal1-txt text-center modal-text color-red">
                <!-- Content for red modal -->
            </div>
        </div>
    </div>
@elseif($modalType == "info")
    <div class="modal1 d-none info-modal" id="info-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="modal1-txt text-center modal-text">
            </div>
        </div>
    </div>




@elseif($modalType == "info-yn")
    <div class="modal1 d-none info-yn-modal" id="info-yn-modal">
        <div class="modal1-box-small">
            <i id="modal-close-btn" class="modal1-x-icon bi bi-x-lg"></i>
            <div class="modal1-txt text-center modal-text">
            </div>
            <div class="d-flex gap2 justify-content-center mar-top-2">
                <div class="primary-btn-small-red" id="modal-close-btn">No</div>
                <div class="primary-btn-small-violet1 yes-btn">Yes</div>
            </div>
        </div>
        
    </div>











{{-- Appointments Modals --}}
@elseif($modalType == "appointment-prev")
    <div class="modal1 d-none" id="appointment-prev-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <input type="hidden" class="appointment-id-val" value="">
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Appointment ID: <span class="appointment-id fw-bold">123123</span></div>

                <div class="mar-bottom-3 d-flex flex-direction-y gap1">
                    <div class="d-flex gap1 align-items-center">
                        <div class="position-relative d-flex justify-content-center" style="width: 150px; height: 150px; border-radius: 100%; overflow: hidden;">
                            <img class="position-absolute h-100 doc-pfp" src="/assets/media/pfp/elmerPFP.jpg" alt="">
                        </div>
                        <div class="d-flex flex-direction-y">
                            <div class="txt-m3">Doctor Name</div>
                            <div class="txt-l3 doc-name mar-bottom-3">Airich Jay Diawan</div>

                            <div class="txt-m3">contact Number</div>
                            <div class="txt-l3 doc-phone">+63 967 764 4695</div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="txt-m3">Service</div>
                        <div class="txt-l3 doc-service">Tooth Cleaning</div>
                    </div>
                    <div>
                        <div class="txt-m3">Appointment Date</div>
                        <div class="txt-l3 doc-time">May 15, 2024 11: 00am</div>
                    </div>
                    <div>
                        <div class="txt-m3">Note:</div>
                        <div class="txt-l3 note">Lorem Ipsum</div>
                    </div>
                </div>                
            </div>
        </div>
    </div>



{{-- Edit Profile Patient Modals --}}
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
                <div>
                    <label for="mname-in">Middlename</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" id="mname-in" />
                </div>
                <div class="mar-bottom-3">
                    <label for="lname-in">Lastname</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" id="lname-in" />
                </div>

                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>
@elseif($modalType == "profile-edit-name2")
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

@elseif($modalType == "profile-edit-pfp")
    <div class="modal1 d-none" id="profile-edit-pfp-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Edit Picture</div>
                <div class="mar-bottom-3 d-flex flex-direction-y gap2">
                    <div class="w-100">
                        <div class="EditPFPContainer" style="box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377), 3px 3px 7px rgba(94, 104, 121, 0.377);">
                            <img class="position-absolute h-100" id="prevPFP" src="" />
                        </div>
                    </div>
                    <input type="file" accept="image/png, image/gif, image/jpeg" value="" class="edit-text-1 w-100" id="pfp-in" />
                </div>

                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>





{{-- Patient Edit Medical Information --}}
@elseif($modalType == "profile-edit-allergies")
    <div class="modal1 d-none" id="profile-edit-allergies-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Edit Medical Information</div>
                <div>
                    <label for="allergies-in">Allergies (If yes please specify)</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" placeholder="If yes please specify" id="allergies-in" />
                </div>

                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>
@elseif($modalType == "profile-edit-heart-disease")
    <div class="modal1 d-none" id="profile-edit-heart-disease-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Edit Medical Information</div>
                <div>
                    <label for="heart-disease-in">Heart Disease (Yes or No)</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" id="heart-disease-in" />
                </div>

                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>
@elseif($modalType == "profile-edit-high-bp")
    <div class="modal1 d-none" id="profile-edit-high-bp-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Edit Medical Information</div>
                <div>
                    <label for="high-bp-in">High Blood Pressure (Yes or No)</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" id="high-bp-in" />
                </div>

                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>
@elseif($modalType == "profile-diabetic")
    <div class="modal1 d-none" id="profile-diabetic-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Edit Medical Information</div>
                <div>
                    <label for="diabetic-in">Diabetic (Yes or No)</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" id="diabetic-in" />
                </div>

                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>
@elseif($modalType == "profile-edit-surgeries")
    <div class="modal1 d-none" id="profile-edit-surgeries-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Edit Medical Information</div>
                <div>
                    <label for="surgeries-in">Surgeries (If yes please specify)</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" id="surgeries-in" />
                </div>

                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>





{{-- Doctor Appointment Modal --}}
@elseif($modalType == "doctor-pending-appointment-preview")
    <div class="modal1 d-none" id="doctor-pending-appointment-preview-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <input type="hidden" class="appointment-id-val" value="">
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Appointment (<span class="appointment-id"></span>)</div>

                <div class="mar-bottom-3 d-flex flex-direction-y gap1">
                    <div class="d-flex gap1 align-items-center">
                        <div class="position-relative d-flex justify-content-center" style="width: 150px; height: 150px; border-radius: 100%; overflow: hidden;">
                            <img class="position-absolute h-100 patient-pfp" src="/assets/media/pfp/G56BvX9fSCllj25GWRxBcTnY.jpg" alt="">
                        </div>
                        <div class="d-flex flex-direction-y">
                            <div class="txt-m3">Patient Name</div>
                            <div class="txt-l3 patient-name mar-bottom-3">Airich Jay Diawan</div>

                            <div class="txt-m3">contact Number</div>
                            <div class="txt-l3 patient-phone">+63 967 764 4695</div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="txt-m3">Service</div>
                        <div class="txt-l3 patient-service">Tooth Cleaning</div>
                    </div>
                    <div>
                        <div class="txt-m3">Appointment Date</div>
                        <div class="txt-l3 patient-time">May 15, 2024 11:00 am</div>
                    </div>
                    <div>
                        <div class="txt-m3">Note:</div>
                        <div class="txt-l3 note">Lorem Ipsum</div>
                    </div>
                </div>

                <div class="d-flex gap1 justify-content-end">
                    <div class="primary-btn-small-red d-flex justify-content-center reject-btn">Reject</div>
                    <div class="primary-btn-small-violet1 d-flex justify-content-center approve-btn">Approve</div>
                    {{-- <div class="primary-btn-small-violet1 d-flex justify-content-center mark-as-done-btn">Mark as Done</div> --}}
                </div>
                
            </div>
        </div>
    </div>
@elseif($modalType == "doctor-approved-appointment-preview")
    <div class="modal1 d-none" id="doctor-approved-appointment-preview-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <input type="hidden" class="appointment-id-val" value="">
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Appointment (<span class="appointment-id"></span>)</div>

                <div class="mar-bottom-3 d-flex flex-direction-y gap1">
                    <div class="d-flex gap1 align-items-center">
                        <div class="position-relative d-flex justify-content-center" style="width: 150px; height: 150px; border-radius: 100%; overflow: hidden;">
                            <img class="position-absolute h-100 patient-pfp" src="/assets/media/pfp/G56BvX9fSCllj25GWRxBcTnY.jpg" alt="">
                        </div>
                        <div class="d-flex flex-direction-y">
                            <div class="txt-m3">Patient Name</div>
                            <div class="txt-l3 patient-name mar-bottom-3">Airich Jay Diawan</div>

                            <div class="txt-m3">contact Number</div>
                            <div class="txt-l3 patient-phone">+63 967 764 4695</div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="txt-m3">Service</div>
                        <div class="txt-l3 patient-service">Tooth Cleaning</div>
                    </div>
                    <div>
                        <div class="txt-m3">Appointment Date</div>
                        <div class="txt-l3 patient-time">May 15, 2024 11:00 am</div>
                    </div>
                    <div>
                        <div class="txt-m3">Note:</div>
                        <div class="txt-l3 note">Lorem Ipsum</div>
                    </div>
                </div>

                <div class="d-flex gap1 justify-content-end">
                    <div class="primary-btn-small-red d-flex justify-content-center Cancel-btn" id="">Cancel</div>
                    <div class="primary-btn-small-violet1 d-flex justify-content-center mark-as-done-btn">Mark as Done</div>
                </div>
                
            </div>
        </div>
    </div>

@elseif($modalType == "doctor-appointment-record-preview")
    <div class="modal1 d-none" id="doctor-appointment-record-preview-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <input type="hidden" class="appointment-id-val" value="">
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Appointment (<span class="appointment-id"></span>)</div>

                <div class="mar-bottom-3 d-flex flex-direction-y gap1">
                    <div class="d-flex gap1 align-items-center">
                        <div class="position-relative d-flex justify-content-center" style="width: 150px; height: 150px; border-radius: 100%; overflow: hidden;">
                            <img class="position-absolute h-100 patient-pfp" src="/assets/media/pfp/G56BvX9fSCllj25GWRxBcTnY.jpg" alt="">
                        </div>
                        <div class="d-flex flex-direction-y">
                            <div class="txt-m3">Patient Name</div>
                            <div class="txt-l3 patient-name mar-bottom-3">Airich Jay Diawan</div>

                            <div class="txt-m3">contact Number</div>
                            <div class="txt-l3 patient-phone">+63 967 764 4695</div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="txt-m3">Service</div>
                        <div class="txt-l3 patient-service">Tooth Cleaning</div>
                    </div>
                    <div>
                        <div class="txt-m3">Appointment Date</div>
                        <div class="txt-l3 patient-time">May 15, 2024 11:00 am</div>
                    </div>
                    <div>
                        <div class="txt-m3">Note:</div>
                        <div class="txt-l3 note">Lorem Ipsum</div>
                    </div>
                </div>                
            </div>
        </div>
    </div>


@elseif($modalType == "doctor-cancel-followup-reason")
    <div class="modal1 d-none" id="doctor-cancel-followup-reason-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <input type="hidden" class="appointment-id-val" value="">
            <div class="w-100 d-flex flex-direction-y gap2">
                <div class="txt-l3 mar-bottom-3">Cancel Follow-up Appointment (<span class="appointment-id"></span>)</div>

                <div>
                    <label for="cancel-reason-in" class="txt-l3">Reason</label>
                    <textarea class="edit-text-1 w-100" id="cancel-reason-in" rows="10" style="resize: none;"></textarea>
                </div>

                <div class="d-flex gap2 justify-content-end mar-top-2">
                    <div class="primary-btn-small-violet1 cancel-followup-btn">Cancel Follow-up</div>
                </div>
            </div>
        </div>
    </div>





{{-- Admin Content Management --}}
@elseif($modalType == "admin-edit-content-1")
    <div class="modal1 d-none admin-edit-content-1-modal" id="admin-edit-content-1-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">

                <div class="txt-l3 mar-bottom-3">Edit Content 1</div>

                <div class="mar-bottom-3">
                    <label for="title-in">Title</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" id="title-in" />
                </div>

                <div class="mar-bottom-3">
                    <label for="content-in">Text</label><br />
                    <textarea class="edit-text-1 w-100" id="content-in" cols="30" rows="10" style="resize: none;">

                    </textarea>
                </div>
    
                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>

@elseif($modalType == "admin-edit-why-clarrels")
    <div class="modal1 d-none admin-edit-why-clarrels-modal" id="admin-edit-why-clarrels-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">

                <div class="txt-l3 mar-bottom-3">Edit Why Clarrels</div>

                <div class="mar-bottom-3">
                    <label for="content-in">Text</label><br />
                    <textarea class="edit-text-1 w-100" id="content-in" cols="30" rows="10" style="resize: none;">

                    </textarea>
                </div>
    
                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>

@elseif($modalType == "admin-edit-faqs")
    <div class="modal1 d-none admin-edit-faqs-modal" id="admin-edit-faqs-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">

                <div class="txt-l3 mar-bottom-3">Edit FAQ's</div>

                <div class="mar-bottom-3">
                    <label for="question-in">Question</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" id="question-in" />
                </div>

                <div class="mar-bottom-3">
                    <label for="answer-in">Answer</label><br />
                    <textarea class="edit-text-1 w-100" id="answer-in" cols="30" rows="10" style="resize: none;">

                    </textarea>
                </div>
    
                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>
@elseif($modalType == "admin-add-faqs")
    <div class="modal1 d-none admin-add-faqs-modal" id="admin-add-faqs-modal">
        <div class="modal1-box-prev-appointment modal-text">
            <i id="modal-close-btn" class="modal1-x-icon fa-solid fa-xmark"></i>
            <div class="w-100 d-flex flex-direction-y gap2">

                <div class="txt-l3 mar-bottom-3">Add FAQ's</div>

                <div class="mar-bottom-3">
                    <label for="question-in">Question</label><br />
                    <input type="text" value="" class="edit-text-1 w-100" id="question-in" />
                </div>

                <div class="mar-bottom-3">
                    <label for="answer-in">Answer</label><br />
                    <textarea class="edit-text-1 w-100" id="answer-in" cols="30" rows="10" style="resize: none;">

                    </textarea>
                </div>
    
                <div class="primary-btn-small-violet1 d-flex justify-content-center save-btn">Save</div>
            </div>
        </div>
    </div>
@endif
