import '../app.js';

$(document).on("click", ".show_more", function() {
    var div = $(this);

    div.parent().toggleClass("more");
    if (div.parent().hasClass("more")){
        div.text("hide content");
        div.css("background", "aquamarine");
    }
    else{
        div.text("show more");
        div.css("background", "cadetblue");
    }
});
