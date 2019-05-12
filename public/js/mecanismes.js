jQuery(window).ready(function () {
    var mainContainer = jQuery("#main-container");
    var footer = jQuery('footer');
    var menuExpanded = false;
    var lastDropdownExpanded = null;
    var footerAdjusted= false;
    jQuery(".dropdown-item").on("click", function () {
        var dropdown = jQuery(this).parent();
        if (dropdown.attr("id") === "dropdown-recherche-categorie"){
            dropdown.prev().html(jQuery(this).html());
        }
    });
    if (mainContainer.height() < jQuery(window).height() + footer.height() * 2 + 5 && !footerAdjusted){
        footerAdjusted = true;
        mainContainer.css("height", jQuery(window).height() + footer.height() * 2 + 5);
    }
    jQuery("a.dropdown-toggle").click(function () {
        window.location = jQuery(this).parent().attr("value");
    }).hover(function () {
        if (!menuExpanded){
            menuExpanded = true;
        } else {
            if (lastDropdownExpanded !== jQuery(this)){
                lastDropdownExpanded.dropdown("toggle");
            }
        }
        jQuery(this).dropdown("toggle");
        lastDropdownExpanded = jQuery(this);
    });
    jQuery(document).click(function () {
        menuExpanded = false;
    });

    jQuery("#deconnexion").click(function (document) {
        document.preventDefault();
        jQuery("#form_deconnexion").submit();
    })
});
