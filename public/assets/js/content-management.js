// Btns
const editContent1HomeBtn = $('#edit-home-cont1');

// Modals
const adminEditContent1Modal = $('#admin-edit-content-1-modal');

const successModal = $('#success-modal');
const errorModal = $('#error-modal');


editContent1HomeBtn.click(() => {
    // Inputs
    const titleIn = adminEditContent1Modal.find('#title-in');
    const contentIn = adminEditContent1Modal.find('#content-in');

    showModal(adminEditContent1Modal);
    closeModal(adminEditContent1Modal, false);

    titleIn.val(content1Db.title);
    contentIn.val(content1Db.content);
});
adminEditContent1Modal.find('.save-btn').click(() => {
    // Inputs
    const titleIn = adminEditContent1Modal.find('#title-in');
    const contentIn = adminEditContent1Modal.find('#content-in');    

    if(isEmptyOrSpaces(titleIn.val()) || isEmptyOrSpaces(contentIn.val())) {
        errorModal.find('.modal-text').html('Please fill-up all the fields');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(checkTheChanges([titleIn, contentIn], [content1Db.title, content1Db.content]) > 0) {
        let formData = new FormData();
        formData.append('editType', 'homeCont1');
        formData.append('title', titleIn.val());
        formData.append('content', contentIn.val());

        ajaxDb('/EditHomeContent', formData);
    }
});








function ajaxDb(link, formData) {
    $.ajax({
        type: "POST",
        url: link,
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal-text').html(response.message);
                showModal(successModal);
                closeModal(successModal, true);
            } else {
                errorModal.find('.modal-text').html(response.message);
                showModal(errorModal);
                closeModal(errorModal, false);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
}