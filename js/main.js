$('.rank-add').click(function() {
    // Get all the needed objects
    var top  = $('#ranked_box');
    var box  = $(this).parent().parent().parent();
    var btn1 = $(box).find('div.rank-move-1');
    var btn2 = $(box).find('div.rank-move-2');
    var rank = $(box).find('input.rank-val');

    $(btn1).addClass('d-none');
    $(btn2).removeClass('d-none');
    $(rank).attr('name', 'ranked[]');
    $(box).appendTo(top);

});
$('.rank-up').click(function() {
    var box  = $(this).parent().parent().parent();
    var prev = $(box).prev();
    $(box).insertBefore(prev);

});
$('.rank-down').click(function() {
    var box  = $(this).parent().parent().parent();
    var prev = $(box).next();
    $(box).insertAfter(prev);

});
$('.rank-remove').click(function() {
        // Get all the needed objects
        var bot  = $('#unranked_box');
        var box  = $(this).parent().parent().parent();
        var btn1 = $(box).find('div.rank-move-1');
        var btn2 = $(box).find('div.rank-move-2');
        var rank = $(box).find('input.rank-val');

        $(btn1).removeClass('d-none');
        $(btn2).addClass('d-none');
        $(rank).attr('name', 'unranked[]');
        $(box).appendTo(bot);

});
