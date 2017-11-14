$(document).ready(function () {

    var $window = $(window);
    //
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

        if($window.width() < 760){
            document.getElementById("petit-ecran").style.visibility = "visible";
            // document.getElementById("grand-ecran").style.visibility = "hidden";
        }

        if($window.width() >= 760){
            document.getElementById("petit-ecran").style.visibility = "hidden";
            document.getElementById("grand-ecran").style.visibility = "visible";
        }




});