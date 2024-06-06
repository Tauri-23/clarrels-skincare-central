// Btns
const editContent1HomeBtn = $('#edit-home-cont1');
const edit_home_cont2_1Btn = $('#edit-home-cont2_1');
const edit_home_cont2_2Btn = $('#edit-home-cont2_2');
const edit_home_cont2_3Btn = $('#edit-home-cont2_3');

const editWhyClarrelsBtns = $('.why-clarrels-edit-btn');

const editFaqBtns = $('.edit-faq-btn');
const addFaqBtn = $('#add-faq-btn');
const deleteFaqBtn = $('.delete-faq-btn');

const editServiceBtns = $('.edit-service-btn');
const addServiceBtn = $('#add-service-btn');
const delServiceBtns = $('.del-service-btn');

const homeBtn = $('#home-btn');
const faqsBtn = $('#faqs-btn');
const servicesBtn = $('#services-btn');

// Modals
const adminEditContentModal1 = $('.admin-edit-content-1-modal');

const adminEditWhyClarrels = $('#admin-edit-why-clarrels-modal');

const adminEditFaqsModal = $('#admin-edit-faqs-modal');
const adminAddFaqsModal = $('#admin-add-faqs-modal');

const adminEditService = $('#admin-edit-service-modal');
const adminAddService = $('#admin-add-service-modal');

const infoYNModal = $('.info-yn-modal');
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

// Content
const homeContent = $('#home-content');
const faqsContent = $('#faqs-content');
const servicesContent = $('#services-content');





/*
|----------------------------------------
| Content 1
|----------------------------------------
*/
homeBtn.click(() => {
    changeContent (homeBtn, homeContent);
});
faqsBtn.click(() => {
    changeContent (faqsBtn, faqsContent);
});
servicesBtn.click(() => {
    changeContent (servicesBtn, servicesContent);
});

function changeContent (activeBtn, activeContent) {
    homeBtn.removeClass('active');
    faqsBtn.removeClass('active');
    servicesBtn.removeClass('active');

    homeContent.addClass('d-none');
    faqsContent.addClass('d-none');
    servicesContent.addClass('d-none');

    activeBtn.addClass('active');
    activeContent.removeClass('d-none');
}





/*
|----------------------------------------
| Content 1
|----------------------------------------
*/
editContent1HomeBtn.click(() => {
    // Inputs
    const titleIn = adminEditContentModal1.eq(0).find('#title-in');
    const contentIn = adminEditContentModal1.eq(0).find('#content-in');

    showModal(adminEditContentModal1.eq(0));
    closeModal(adminEditContentModal1.eq(0), false);

    titleIn.val(content1Db.title);
    contentIn.val(content1Db.content);
});
adminEditContentModal1.eq(0).find('.save-btn').click(() => {
    // Inputs
    const titleIn = adminEditContentModal1.eq(0).find('#title-in');
    const contentIn = adminEditContentModal1.eq(0).find('#content-in');    

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





/*
|----------------------------------------
| Content 2
|----------------------------------------
*/
// Content 2.1
edit_home_cont2_1Btn.click(() => {
    // Inputs
    const titleIn = adminEditContentModal1.eq(1).find('#title-in');
    const contentIn = adminEditContentModal1.eq(1).find('#content-in');

    showModal(adminEditContentModal1.eq(1));
    closeModal(adminEditContentModal1.eq(1), false);

    titleIn.val(content2_1Db.title);
    contentIn.val(content2_1Db.content);
});
adminEditContentModal1.eq(1).find('.save-btn').click(() => {
    // Inputs
    const titleIn = adminEditContentModal1.eq(1).find('#title-in');
    const contentIn = adminEditContentModal1.eq(1).find('#content-in');    

    if(isEmptyOrSpaces(titleIn.val()) || isEmptyOrSpaces(contentIn.val())) {
        errorModal.find('.modal-text').html('Please fill-up all the fields');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(checkTheChanges([titleIn, contentIn], [content2_1Db.title, content2_1Db.content]) > 0) {
        let formData = new FormData();
        formData.append('editType', 'homeCont2_1');
        formData.append('title', titleIn.val());
        formData.append('content', contentIn.val());

        ajaxDb('/EditHomeContent', formData);
    }
});


// Content 2.2
edit_home_cont2_2Btn.click(() => {
    // Inputs
    const titleIn = adminEditContentModal1.eq(2).find('#title-in');
    const contentIn = adminEditContentModal1.eq(2).find('#content-in');

    showModal(adminEditContentModal1.eq(2));
    closeModal(adminEditContentModal1.eq(2), false);

    titleIn.val(content2_2Db.title);
    contentIn.val(content2_2Db.content);
});
adminEditContentModal1.eq(2).find('.save-btn').click(() => {
    // Inputs
    const titleIn = adminEditContentModal1.eq(2).find('#title-in');
    const contentIn = adminEditContentModal1.eq(2).find('#content-in');    

    if(isEmptyOrSpaces(titleIn.val()) || isEmptyOrSpaces(contentIn.val())) {
        errorModal.find('.modal-text').html('Please fill-up all the fields');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(checkTheChanges([titleIn, contentIn], [content2_2Db.title, content2_2Db.content]) > 0) {
        let formData = new FormData();
        formData.append('editType', 'homeCont2_2');
        formData.append('title', titleIn.val());
        formData.append('content', contentIn.val());

        ajaxDb('/EditHomeContent', formData);
    }
});


// Content 2.3
edit_home_cont2_3Btn.click(() => {
    // Inputs
    const titleIn = adminEditContentModal1.eq(3).find('#title-in');
    const contentIn = adminEditContentModal1.eq(3).find('#content-in');

    showModal(adminEditContentModal1.eq(3));
    closeModal(adminEditContentModal1.eq(3), false);

    titleIn.val(content2_3Db.title);
    contentIn.val(content2_3Db.content);
});
adminEditContentModal1.eq(3).find('.save-btn').click(() => {
    // Inputs
    const titleIn = adminEditContentModal1.eq(3).find('#title-in');
    const contentIn = adminEditContentModal1.eq(3).find('#content-in');    

    if(isEmptyOrSpaces(titleIn.val()) || isEmptyOrSpaces(contentIn.val())) {
        errorModal.find('.modal-text').html('Please fill-up all the fields');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(checkTheChanges([titleIn, contentIn], [content2_3Db.title, content2_3Db.content]) > 0) {
        let formData = new FormData();
        formData.append('editType', 'homeCont2_3');
        formData.append('title', titleIn.val());
        formData.append('content', contentIn.val());

        ajaxDb('/EditHomeContent', formData);
    }
});





/*
|----------------------------------------
| Why Clarrels
|----------------------------------------
*/
let whyClarrelId = '';
let whyClarrelContentIn = adminEditWhyClarrels.find('#content-in');
let filteredWhyClarrels = [];
editWhyClarrelsBtns.click(function() {
    whyClarrelId = $(this).attr('id'); 
    
    filteredWhyClarrels = whyClarrelsContent.filter(item => item.id == whyClarrelId);

    whyClarrelContentIn.val(filteredWhyClarrels[0].content);

    console.log(filteredWhyClarrels);
    
    showModal(adminEditWhyClarrels);
    closeModal(adminEditWhyClarrels, false);
});
adminEditWhyClarrels.find('.save-btn').click(() => {
    if(isEmptyOrSpaces(whyClarrelContentIn.val())) {
        errorModal.find('.modal-text').html('Please fill-up all the fields');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(checkTheChanges([whyClarrelContentIn],[filteredWhyClarrels[0].content]) > 0) {
        let formData = new FormData();
        formData.append('id', filteredWhyClarrels[0].id);
        formData.append('content', whyClarrelContentIn.val());

        ajaxDb('/EditWhyClarrels', formData);
    }
});





/*
|----------------------------------------
| FAQ's
|----------------------------------------
*/
// Edit Faqs
let filteredFaqs = [];
let faqQuestionIn = adminEditFaqsModal.find('#question-in');
let faqAnswerIn = adminEditFaqsModal.find('#answer-in');
editFaqBtns.click(function() {
    filteredFaqs = faqs.filter(item => item.id == $(this).data('id'));

    faqQuestionIn.val(filteredFaqs[0].question);
    faqAnswerIn.val(filteredFaqs[0].answer);

    showModal(adminEditFaqsModal);
    closeModal(adminEditFaqsModal);
});
adminEditFaqsModal.find('.save-btn').click(() => {
    if(isEmptyOrSpaces(faqQuestionIn.val()) || isEmptyOrSpaces(faqAnswerIn.val())) {
        errorModal.find('.modal-text').html('Please fill-up all the fields');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(checkTheChanges([faqQuestionIn ,faqAnswerIn], [filteredFaqs[0].question ,filteredFaqs[0].answer]) > 0) {
        let formData = new FormData();
        formData.append('id', filteredFaqs[0].id);
        formData.append('question', faqQuestionIn.val());
        formData.append('answer', faqAnswerIn.val());

        ajaxDb('/editFaqs', formData);
    }
});

// Add Faqs
addFaqBtn.click(function() {
    showModal(adminAddFaqsModal);
    closeModal(adminAddFaqsModal);
});
adminAddFaqsModal.find('.save-btn').click(() => {
    // inputs
    let faqQuestionIn = adminAddFaqsModal.find('#question-in');
    let faqAnswerIn = adminAddFaqsModal.find('#answer-in');

    if(isEmptyOrSpaces(faqQuestionIn.val()) || isEmptyOrSpaces(faqAnswerIn.val())) {
        errorModal.find('.modal-text').html('Please fill-up all the fields');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }
    let formData = new FormData();
        formData.append('question', faqQuestionIn.val());
        formData.append('answer', faqAnswerIn.val());

        ajaxDb('/addFaqs', formData);
});

// Delete Faqs
deleteFaqBtn.click(function() {
    filteredFaqs = faqs.filter(item => item.id == $(this).data('id'));

    infoYNModal.eq(0).find('.modal-text').html(`Delete FAQ (${filteredFaqs[0].id})`);
    showModal(infoYNModal.eq(0));
    closeModal(infoYNModal.eq(0), false);
})
infoYNModal.eq(0).find('.yes-btn').click(() => {
    let formData = new FormData();
    formData.append('id', filteredFaqs[0].id);

    ajaxDb('/delFaqs', formData);
});





/*
|----------------------------------------
| Services
|----------------------------------------
*/
// Edit
let filteredService = [];
const serviceIn = adminEditService.find('#service-in');
const priceIn = adminEditService.find('#price-in');
const descIn = adminEditService.find('#desc-in');
editServiceBtns.click(function() {
    filteredService = services.filter(item => item.id == $(this).data('id'));

    serviceIn.val(filteredService[0].service);
    priceIn.val(filteredService[0].price);
    descIn.val(filteredService[0].description);

    showModal(adminEditService);
    closeModal(adminEditService, false);
});
adminEditService.find('.save-btn').click(() => {
    if(isEmptyOrSpaces(serviceIn.val()) || isEmptyOrSpaces(descIn.val())) {
        errorModal.find('.modal-text').html('Please fill-up all the fields');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }
    
    if(checkTheChanges([serviceIn, priceIn, descIn], [filteredService[0].service, filteredService[0].price, filteredService[0].description]) > 0) {
        let formData = new FormData();
        formData.append('id', filteredService[0].id);
        formData.append('service', serviceIn.val());
        formData.append('price', priceIn.val());
        formData.append('desc', descIn.val());
        ajaxDb('/editService', formData);
    }
});

// Add 
let addServiceServiceTypeIn = adminAddService.find('#service-type-in');
let addServiceServiceIn = adminAddService.find('#service-in');
let addServicePriceIn = adminAddService.find('#price-in');
let addServiceDescIn = adminAddService.find('#desc-in');

addServiceBtn.click(() => {
    servicesTypes.forEach(element => {
        addServiceServiceTypeIn.append(`<option value="${element.id}">${element.service_type}</option`);
    });

    showModal(adminAddService);
    closeModal(adminAddService, false);
});
adminAddService.find('.save-btn').click(() => {
    if(isEmptyOrSpaces(addServiceServiceIn.val()) || isEmptyOrSpaces(addServiceDescIn.val()) || isEmptyOrSpaces(addServicePriceIn.val())) {
        errorModal.find('.modal-text').html('Please fill-up all the fields');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    let formData = new FormData();
    formData.append('serviceType', addServiceServiceTypeIn.val());
    formData.append('service', addServiceServiceIn.val());
    formData.append('price', addServicePriceIn.val());
    formData.append('description', addServiceDescIn.val());

    ajaxDb('/AddService', formData);
});

// Delete
delServiceBtns.click(function() {
    filteredService = services.filter(item => item.id == $(this).data('id'));

    infoYNModal.eq(1).find('.modal-text').html(`Delete FAQ (${filteredService[0].id})`);
    showModal(infoYNModal.eq(1));
    closeModal(infoYNModal.eq(1), false);
})
infoYNModal.eq(1).find('.yes-btn').click(() => {
    let formData = new FormData();
    formData.append('id', filteredService[0].id);

    ajaxDb('/delService', formData);
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