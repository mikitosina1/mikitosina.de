$(document).on("click", ".show_more", function() {
    var div = $(this);
    
    div.parent().toggleClass("more");
    if (div.parent().hasClass("more")){
        div.text("hide content");
    }
    else{
        div.text("show more");
    }
});