$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();

    $('.delete-button').on('click', function () {
        var parent = $(this).closest('div[class^="delete-wrapper"]');

        var div = parent.children();
        toggle(div[1]);
    });
    
    // AJAX call for "Edit Beers" modal admin tool
    $(".edit-beer").on("submit", function (event) {
        event.preventDefault();
        var url = getRootUrl() + 'beer/edit_beer?';
        url += $(this).serialize();
        loadDoc('edit-beer-modal-content', url);
    });
    
    // AJAX call for "Edit Food Item (dish)" modal admin tool
    $(".edit-dish").on("submit", function (event) {
        event.preventDefault();
        var url = getRootUrl() + 'dish/edit_dish?';
        url += $(this).serialize();
        loadDoc('edit-dish-modal-content', url);
    });
    
    // AJAX call for "Edit Special" modal admin tool
    $(".edit-special").on("submit", function (event) {
        event.preventDefault();
        var url = getRootUrl() + 'special/edit_special?';
        url += $(this).serialize();
        loadDoc('edit-special-modal-content', url);
    });
    
    // AJAX call for viewing full menu in modal
    $("#full-menu-btn").on('click', function() {
        //var url = getBaseUrl() + 'menu';
        var url = getRootUrl() + 'menu';
        loadDoc('full-menu-div', url, false);
        
        // Flip the +/- in collapsable menus
        $('.collapse').on('shown.bs.collapse', function(){
            $(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
        }).on('hidden.bs.collapse', function(){
            $(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
        });
    });

});


function toggle(element) {
    if (element) {
        var display = element.style.display;
        if (display == "none") {
            element.style.display = "inline-block";
        } else {
            element.style.display = "none";
        }
    }
}

function getRootUrl() {
    return window.location.origin ? window.location.origin + '/' : window.location.protocol + '/' + window.location.host + '/';
}

function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    return re.exec(window.location.href);
}

function loadDoc(id, url, sync) {
    sync = sync !== false; // Default true value
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(id).innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", url, sync);
    xhttp.send();
}

