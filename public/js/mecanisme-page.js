jQuery(document).ready(function () {
    var selectionPage = jQuery("#page");
    var titre = jQuery("#titre_page");
    var editeur = jQuery("#editeur");
    var form = selectionPage.parents("form:first");
    var getPageUrl;
    selectionPage.change(function () {
        if (!isNaN(selectionPage.val())) {
            getPageUrl = form.attr("action").match('(https://|http://)[A-Za-z0-9.]+(/){0,1}')[0] + "pages/" + selectionPage.val() + "/contenu";
            jQuery.ajax({
                type: form.attr("method"),
                url: getPageUrl,
                dataType: "json",
                data: form.serialize()
            }).done(function (reponse, texte, jqXHR) {
                titre.val(reponse.titre);
                editeur.empty();
                if (reponse.contenu !== null) {
                    editeur.append("<textarea id='contenu' name='contenu'>" + reponse.contenu + "</textarea>");
                    tinyMCE.init({selector: "textarea"});
                } else {
                    editeur.append("<textarea id='contenu' name='contenu'></textarea>");
                    tinyMCE.init({selector: "textarea"});
                }
                validerPage();
                validerTitre();
            });
        } else {
            titre.val("");
            editeur.empty();
            editeur.append("<textarea id='contenu' name='contenu'></textarea>");
            tinyMCE.init({selector: "textarea"});
            validerPage();
            validerTitre();
        }
    });

    titre.change(function () {
        validerTitre();
    }).keyup(function () {
        validerTitre();
    }).keydown(function () {
        validerTitre();
    });

    jQuery("button").click(function (page) {
        page.preventDefault();
        let pageValide = validerPage();
        let titreValide = validerTitre();
        if (pageValide && titreValide) {
            var content =  tinyMCE.get("contenu").getContent();
            form.append("<textarea name='contenu' class='d-none'>" + content + "</textarea>");
            form.submit();
        }
    });

    function validerPage() {
        if (!isNaN(selectionPage.val())) {
            selectionPage.removeClass("is-invalid");
            selectionPage.addClass("is-valid");
            return true;
        } else {
            selectionPage.removeClass("is-valid");
            selectionPage.addClass("is-invalid");
            return false;
        }
    }

    function validerTitre() {
        if (titre.val().length > 0 && titre.val().length <= 100) {
            titre.removeClass("is-invalid");
            titre.addClass("is-valid");
            return true;
        } else {
            titre.removeClass("is-valid");
            titre.addClass("is-invalid");
            return false;
        }
    }
});
