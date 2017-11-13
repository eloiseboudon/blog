$(document).ready(function () {

    var $window = $(window);
    var i = 0;
    var node = document.getElementById('accueil_articles-id');
    var children = node.childNodes;
    console.log(children);
    // arrayID = [];

    // for(k=0;children.length;k++){
    //     var timeline_left = node.getElementsByClassName('timeline-block-left');
    //     console.log(timeline_left);
    // }


    // if ($window.width() < 760) {
    //     for(k=0;children.length;k++){
    //         arrayID[i]=children[k].id;
    //         i++;
    //         alert("test");
    //         console.log(arrayID[i]);
    //     }
    //     // $('#timeline-id').removeClass('timeline-block-left').addClass('timeline-block-right');
    // }
    // if ($window.width() >= 760) {
    //     // for(k=0;children.length;k++)
    //     $('#timeline-id').removeClass('timeline-block-right').addClass('timeline-block-left');
    // }

});