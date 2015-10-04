$(document).ready(function() {
    $("#threadform-number").keydown(function(event) {
        // backspace, delete, tab, escape,Ctrl+A home, end, left, right
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27
        || (event.keyCode == 65 && event.ctrlKey === true) || (event.keyCode >= 35 && event.keyCode <= 39))
            return;
        else
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 ))
                event.preventDefault();

    });
});

/*
(function ($) {
    function init() {
        $('.easy-tree').EasyTree({
                selectable: true,
        deletable: false,
        editable: false,
        addable: false,
        //i18n: {...}
    });
}
window.onload = init();
})*/
