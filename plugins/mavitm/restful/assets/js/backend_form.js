function removeelement(el) {
    var selector = $(el).data("remove");
    $(selector).remove();
}

function appendmodel(jsn) {
    try {
        $("#select_fields_area").append(jsn.appendmodel);
    }
    catch (e)
    {}
}

function ajaxEevents() {

    $(".checkboxall").off("click").on('click', function() {
        var selectThem = $(this).attr("data-target");
        if($(this).is(":checked") == true){
            $(selectThem).each(function(){this.checked = true;});
        }else{
            $(selectThem).each(function(){this.checked = false;});
        }
    });
}
$(document).ready(function () { ajaxEevents(); });
$(document).ajaxComplete(function() { ajaxEevents(); });