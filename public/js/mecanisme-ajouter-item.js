jQuery(window).ready(function () {
    var imageValide = false;
    jQuery("#ajouter_image").click(function (page) {
        page.preventDefault();
        jQuery("#image_produit").trigger("click");
    });
    jQuery("#image_produit").change(function (inputGroup) {
        var fichiers = inputGroup.target.files;
        var erreur = false;
        var extension = "";
        for(var i = 0; i < fichiers.length; i++){
            extension = fichiers[i].name.substr((fichiers[i].name.lastIndexOf('.') +1));
            if (!(extension === "png" || extension === "jpg" || extension === "jpeg" || extension === "svg")){
                erreur = true;
            }
        }
        if (inputGroup.target.files === null || inputGroup.target.files.length === 0){
            jQuery("#image_validation").html("Aucune image sélectionnée").attr("class", "erreur");
            imageValide = false;
        } else if (erreur){
            jQuery("#image_validation").html("Type de fichier invalide, veuillez choisir une image de type JPEG, JPG ou PNG").attr("class", "erreur");
            imageValide = false;
        } else {
            jQuery("#image_validation").html("Image valide et sélectionnée").attr("class", "correct");
            imageValide = true;
        }
    });
    jQuery("#boutton_ajout_categorie").click(function (page) {
        var selectCategories = jQuery("#categories");
        page.preventDefault();
        var categorieSelectionnee = null;
        selectCategories.children().each(function () {
            if (jQuery(this).attr("value") && jQuery(this).is(":selected")){
                categorieSelectionnee = jQuery(this);
            }
        });
        if (categorieSelectionnee !== null){
            var html = "<tr><th class='fit' scope='row'><button class='btn btn-outline-danger btn-sm supprimer'>Supprimer</button></th><td>" + categorieSelectionnee.html() +"</td></tr>";
            var estCopie = false;
            var contenuTableau = jQuery("#categories_selectionnees");
            if (contenuTableau.children().length > 0){
                contenuTableau.children().each(function () {
                    if (jQuery(this).html().includes(categorieSelectionnee.html())){
                        estCopie = true;
                    }
                });
            }
            if (!estCopie){
                var message = "";
                var classe = "";
                contenuTableau.append(html).ready(function () {
                    jQuery(".supprimer").click(function (page) {
                        page.preventDefault();
                        jQuery(this).parent().parent().remove();
                        if (contenuTableau.children().length > 1){
                            selectCategories.attr("class", "form-control is-valid");
                            message = contenuTableau.children().length + " catégories sélectionnées.";
                            classe = "correct";
                        } else if (contenuTableau.children().length === 1){
                            selectCategories.attr("class", "form-control is-valid");
                            message = contenuTableau.children().length +  " catégorie sélectionnée.";
                            classe = "correct";
                        } else {
                            selectCategories.attr("class", "form-control is-invalid");
                            message = "Aucune catégorie sélectionnée.";
                            classe = "erreur";
                        }
                        jQuery("#message_categorie").html(message).attr("class", classe);
                    });
                    if (contenuTableau.children().length > 1){
                        selectCategories.attr("class", "form-control is-valid");
                        message = contenuTableau.children().length + " catégories sélectionnées.";
                        classe = "correct";
                    } else if (contenuTableau.children().length === 1){
                        selectCategories.attr("class", "form-control is-valid");
                        message = contenuTableau.children().length +  " catégorie sélectionnée.";
                        classe = "correct";
                    } else {
                        selectCategories.attr("class", "form-control is-invalid");
                        message = "Aucune catégorie sélectionnée.";
                        classe = "erreur";
                    }
                    jQuery("#message_categorie").html(message).attr("class", classe);
                });
            }
        }
    });
    jQuery(".supprimer").click(function (page) {
        var contenuTableau = jQuery("#categories_selectionnees");
        var selectCategories = jQuery("#categories");
        var message = "";
        var classe = "";
        page.preventDefault();
        jQuery(this).parent().parent().remove();
        if (contenuTableau.children().length > 1){
            selectCategories.attr("class", "form-control is-valid");
            message = contenuTableau.children().length + " catégories sélectionnées.";
            classe = "correct";
        } else if (contenuTableau.children().length === 1){
            selectCategories.attr("class", "form-control is-valid");
            message = contenuTableau.children().length +  " catégorie sélectionnée.";
            classe = "correct";
        } else {
            selectCategories.attr("class", "form-control is-invalid");
            message = "Aucune catégorie sélectionnée.";
            classe = "erreur";
        }
        jQuery("#message_categorie").html(message).attr("class", classe);
    });
    jQuery("#boutton_soumission").click(function (page) {
        soumettre(page);
    });
    jQuery("#titre_produit").keyup(function () {
        if (jQuery(this).val().length < 1 || jQuery(this).val().length > 100){
            jQuery(this).attr("class", "form-control is-invalid");
        } else {
            jQuery(this).attr("class", "form-control is-valid");
        }
    }).change(function () {
        if (jQuery(this).val().length < 1 || jQuery(this).val().length > 100){
            jQuery(this).attr("class", "form-control is-invalid");
        } else {
            jQuery(this).attr("class", "form-control is-valid");
        }
    });
    jQuery("#prix_produit").keyup(function () {
        if (parseFloat(jQuery(this).val()) < 0.0 || parseFloat(jQuery(this).val()) > 10000.0 || jQuery(this).val() === "" || jQuery(this).val() === null){
            jQuery(this).attr("class", "form-control is-invalid");
        } else {
            jQuery(this).attr("class", "form-control is-valid");
        }
    }).change(function () {
        if (parseFloat(jQuery(this).val()) < 0.0 || parseFloat(jQuery(this).val()) > 10000.0 || jQuery(this).val() === "" || jQuery(this).val() === null){
            jQuery(this).attr("class", "form-control is-invalid");
        } else {
            jQuery(this).attr("class", "form-control is-valid");
        }
        var nombre = jQuery(this).val().split(".")[0];
        var lastDigit = jQuery(this).val().split(".")[1];
        if (lastDigit !== undefined){
            if (lastDigit.length > 2){
                lastDigit = lastDigit[0] + lastDigit[1];
            }
            nombre += "." + lastDigit;
        } else {
            nombre += ".00";
        }
        jQuery(this).val(nombre);
    });
    jQuery("#description_produit").keyup(function () {
        if (jQuery(this).val().length < 1 || jQuery(this).val().length > 2147483647){
            jQuery(this).attr("class", "form-control is-invalid");
        } else {
            jQuery(this).attr("class", "form-control is-valid");
        }
    }).change(function () {
        if (jQuery(this).val().length < 1 || jQuery(this).val().length > 2147483647){
            jQuery(this).attr("class", "form-control is-invalid");
        } else {
            jQuery(this).attr("class", "form-control is-valid");
        }
    });
    jQuery(document).on('keypress',function(page) {
        if(page.which === 13) {
            soumettre(page);
        }
    });
    function soumettre(page){
        var formulaire = jQuery("#categories_selectionnees");
        var inputNom = jQuery("#titre_produit");
        var inputPrix = jQuery("#prix_produit");
        var textareaDescription = jQuery("#description_produit");
        var selectCategories = jQuery("#categories");
        var message = jQuery("#messages");
        page.preventDefault();
        if (imageValide && !(inputNom.val().length < 1 || inputNom.val().length > 100) && !(parseFloat(inputPrix.val()) < 0.0 || parseFloat(inputPrix.val()) > 10000.0 || inputPrix.val() === "" || inputPrix.val() === null) && !(textareaDescription.val().length < 1 || textareaDescription.val().length > 2147483647) && formulaire.children().length > 0){
            var html = "";
            formulaire.children().each(function () {
                html += "<input style='display: none' name='categories[]' value='" + jQuery(this).children().eq(1).html() + "'>"
            });
            jQuery("#formulaire_ajout_item").append(html).submit();
        } else {
            message.empty();
            message.append("<div>");
            if (!imageValide) {
                message.append("<p class='erreur'>Veuillez choisir une image de produit valide.</p>");
            }
            if (inputNom.val().length < 1 || inputNom.val().length > 100){
                message.append("<p class='erreur'>Veuillez remplir conformément votre nom de produit.</p>");
                inputNom.attr("class", "form-control is-invalid");
            }
            if (parseFloat(inputPrix.val()) < 0.0 || parseFloat(inputPrix.val()) > 10000.0 || inputPrix.val() === "" || inputPrix.val() === null){
                message.append("<p class='erreur'>Veuillez choisir conformément le prix de votre produit.</p>");
                inputPrix.attr("class", "form-control is-invalid");
            }
            if (textareaDescription.val().length < 1 || textareaDescription.val().length > 2147483647){
                message.append("<p class='erreur'>Veuillez remplir conformément la description de votre produit.</p>");
                textareaDescription.attr("class", "form-control is-invalid");
            }
            if (formulaire.children().length === 0){
                message.append("<p class='erreur'>Veuillez indexer au minimum une catégorie à votre produit.</p>");
                selectCategories.attr("class", "form-control is-invalid");
            }
            message.append("</div>");
        }
    }
});