jQuery(document).ready(function ($) {
    $('.modal-click').click(function() {
        $('.modal-bg, .modal-content').css('display', 'block')
        $('.modal-bg').animate({'opacity': '0.5'}, 400)
        $('.modal-content').animate({'opacity': 1, 'display': 'block'}, 400)
        return false;
    })
    $('.modal-close, .modal-bg, .btn-modal').click(function() {
        $('.modal-bg, .modal-content').animate({
            'opacity' : 0, },
            1, function() {
                $('.modal-bg, .modal-content').css('display', 'none');
        });
    })
});