(function($){
    "use strict";
    // On cache le titre, le container admin, les lignes de tableau et la pagination
    $('.title_home').css({opacity: 0, right: '-100px', position: 'relative'});
    $('.container_admin').css({opacity: 0, left: '-100px', position: 'relative'});
    $('.trLoc').css({opacity: 0, top: '10px', position: 'relative'});
    $('.anim_pagination').css({opacity: 0, position: 'relative'});

    $(window).on('load', function(){
        // 1. Titre d'abord
        $('.title_home').animate({opacity: 1, right: 0}, 1000, function() {
            // 2. Puis le container une fois le titre terminé
            $('.container_admin').animate({opacity: 1, left: 0}, 1000, function() {
                // 3. Enfin les lignes une à une en enchaîné
                function animateRows(next, complete) {
                    let $rows = $('.trLoc');
                    if (next < $rows.length) {
                        $rows.eq(next).animate({opacity: 1, top: 0}, 400, function() {
                            animateRows(next + 1, complete);
                        });
                    } else if (typeof complete === "function") {
                        complete();
                    }
                }
                animateRows(0, function() {
                    $('.anim_pagination').animate({opacity: 1}, 400);
                });
            });
        });
    });
})(jQuery);
