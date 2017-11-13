$(document).ready(function () {

    var $window = $(window);

    var node = document.getElementById('timeline-id');
    var children = node.childNodes;

    if ($window.width() < 760) {
        for(k=0;children.length;k++)
            $('#timeline-id').removeClass('timeline-block-left').addClass('timeline-block-right');
    }if ($window.width() >= 760) {
        for(k=0;children.length;k++)
            $('#timeline-id').removeClass('timeline-block-right').addClass('timeline-block-left');
    }

});