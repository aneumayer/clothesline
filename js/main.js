$('.rank-add').click(function(event) {
    event.preventDefault();
    // Get all the needed objects
    var top  = $('#ranked_box');
    var box  = $(this).parent().parent().parent();
    var btn1 = $(box).find('div.rank-move-1');
    var btn2 = $(box).find('div.rank-move-2');
    var rank = $(box).find('input.rank-val');
    // Perform the action
    $(btn1).addClass('d-none');
    $(btn2).removeClass('d-none');
    $(rank).attr('name', 'ranked[]');
    $(box).removeClass('unrank-block').addClass('rank-block').appendTo(top);
});
$('.rank-up').click(function(event) {
    event.preventDefault();
    var box  = $(this).parent().parent().parent();
    var prev = $(box).prev();
    // Perform the action
    if ($(prev).hasClass('rank-block')) {
        $(box).insertBefore(prev);
    }
});
$('.rank-down').click(function(event) {
    event.preventDefault();
    var box  = $(this).parent().parent().parent();
    var next = $(box).next();
    // Perform the action
    if ($(next).hasClass('rank-block')) {
        $(box).insertAfter(next);
    }
});
$('.rank-remove').click(function(event) {
    event.preventDefault();
    // Get all the needed objects
    var bot  = $('#unranked_box');
    var box  = $(this).parent().parent().parent();
    var btn1 = $(box).find('div.rank-move-1');
    var btn2 = $(box).find('div.rank-move-2');
    var rank = $(box).find('input.rank-val');
    // Perform the action
    $(btn1).removeClass('d-none');
    $(btn2).addClass('d-none');
    $(rank).attr('name', 'unranked[]');
    $(box).removeClass('rank-block').addClass('unrank-block').appendTo(bot);
});
