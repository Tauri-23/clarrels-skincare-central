$(document).ready(function() {
    const questions = $('.faq-box');

    questions.click(function() {
        const faqAns = $(this).find('.faq-ans');
        
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            faqAns.css({
                height: 0,
                opacity: 0
            });
        } else {
            disableActiveFaqBox();
            $(this).addClass('active');
            faqAns.css({
                height: faqAns[0].scrollHeight + 'px',
                opacity: 1
            });
        }
        
        $(this).find('.minus-icon').toggleClass('d-none');
    });

    function disableActiveFaqBox() {
        questions.removeClass('active');
        questions.find('.faq-ans').css({
            height: 0,
            opacity: 0
        });
        questions.find('.minus-icon').addClass('d-none');
    }
});
