$('.unmask').on('click', function () {

    if ($(this).prev('input').attr('type') == 'password')
        changeType($(this).prev('input'), 'text');

    else
        changeType($(this).prev('input'), 'password');

    return false;
});


function changeType(x, type) {
    if (x.prop('type') == type)
        return x; // ça serait facile.
    try {
        // Une sécurité d'IE empêche ceci
        return x.prop('type', type);
    }
    catch (e) {
        // On tente de recréer l'élément
        // En créant d'abord une div
        var html = $("<div>").append(x.clone()).html();
        var regex = /type=(\")?([^\"\s]+)(\")?/;
        // la regex trouve type=text ou type="text"
        // si on ne trouve rien, on ajoute le type à la fin, sinon on le remplace
        var tmp = $(html.match(regex) == null ?
            html.replace(">", ' type="' + type + '">') :
            html.replace(regex, 'type="' + type + '"'));

        // on rajoute les vieilles données de l'élément
        tmp.data('type', x.data('type'));
        var events = x.data('events');
        var cb = function (events) {
            return function () {
                //Bind all prior events
                for (i in events) {
                    var y = events[i];
                    for (j in y) tmp.bind(i, y[j].handler);
                }
            }
        }(events);
        x.replaceWith(tmp);
        setTimeout(cb, 10); // On attend un peu avant d'appeler la fonction
        return tmp;
    }
}


$('.mask').on('click', function () {
    document.getElementById("commentaires-view-all").style.display = "block";
    document.getElementById("commentaires-view-5").style.display = "none";
});

$('.demask').on('click', function () {
    document.getElementById("commentaires-view-all").style.display = "none";
    document.getElementById("commentaires-view-5").style.display = "block";
});

// $("#modal-pro-article").on('click',function () {
//     $('#myModal_prochain_article').modal('show');
//     document.getElementById("modal-pro-article").checked = false;
// });

$("#modal_update_email").on('click',function () {
    $('#myModalUpdateMail').modal('show');
});




$(".smallSearchBox").on('click',function () {
    if (document.getElementById("small_form").style.display == 'none'){
        document.getElementById("small_form").style.display = 'block';
        document.getElementById("small_form").style.width = '100px';
        document.getElementsByClassName("smallSearchBox")[0].style.display = 'none';
    }
    else{
        document.getElementById("small_form").style.display = 'none';
    }
});


