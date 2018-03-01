$(document).ready(function (e) {


    $(".del_img").click(function () {
        var id = $(this).parent().parent().children('.id').val();
        $.post("provider.php",
            {
                tag: "del_img",
                id: id
            },
            function (data, status) {
                location.reload();
            });
    });

    $(".del_vid").click(function () {
        var id = $(this).parent().parent().parent().children('.main_editor').children('.editor').children('.edit-form').children('.id').val();
        $.post("provider.php",
            {
                tag: "del_vid",
                id: id
            },
            function (data, status) {
                location.reload();
            });
    });

    $(".del_pod").click(function () {
        var id = $(this).parent().parent().parent().children('.main_editor').children('.editor').children('.edit-form').children('.id').val();
        $.post("provider.php",
            {
                tag: "del_pod",
                id: id
            },
            function (data, status) {
                location.reload();
            });
    });

    $(".del_news").click(function () {
        var id = $(this).parent().parent().children('.main_editor').children('.editor').children('.edit-form').children('.id').val();
        $.post("provider.php",
            {
                tag: "del_news",
                id: id
            },
            function (data, status) {
                location.reload();
            });
    });


    $(".adder").click(function () {
        $(this).parent().children('.main_editor').show();
    });


    $('.add_vid').on('click', function () {
        $(this).parent().parent().parent().children('.main_editor').show();
    });

    $('.add_pod').on('click', function () {
        $(this).parent().parent().parent().children('.main_editor').show();
    });

    $('.add_news').on('click', function () {
        $(this).parent().parent().children('.main_editor').show();
    });


    jQuery('.closer').click(function () {
        jQuery('.main_editor').hide();
    });

    jQuery('.closer').mouseenter(function () {
        jQuery(this).stop(true, true).animate({width: 35, height: 35}, {"duration": 100}, "linear");
    });

    jQuery('.closer').mouseleave(function () {
        jQuery(this).stop(true, true).animate({width: 30, height: 30}, {"duration": 100}, "linear");
    });

});

$('.form').find('input, textarea').on('keyup blur focus', function (e) {

    var $this = $(this),
        label = $this.prev('label');

    if (e.type === 'keyup') {
        if ($this.val() === '') {
            label.removeClass('active highlight');
        } else {
            label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
        if ($this.val() === '') {
            label.removeClass('active highlight');
        } else {
            label.removeClass('highlight');
        }
    } else if (e.type === 'focus') {

        if ($this.val() === '') {
            label.removeClass('highlight');
        } else if ($this.val() !== '') {
            label.addClass('highlight');
        }
    }

});

$('.tab a').on('click', function (e) {

    e.preventDefault();

    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');

    target = $(this).attr('href');

    $('.loss > div').not(target).hide();

    $(target).fadeIn(600);

});

