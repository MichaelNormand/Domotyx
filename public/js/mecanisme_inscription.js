jQuery(document).ready(function () {
    //Ajout des sélecteurs jQuery.
    var identifiant = jQuery("#identifiant");
    var image_profil = jQuery("#image_profil");
    var mot_de_passe = jQuery("#mot_de_passe");
    var email = jQuery("#email");
    var mot_de_passe_confirmation = jQuery("#mot_de_passe_confirmation");
    var prenom = jQuery("#prenom");
    var nom = jQuery("#nom");
    var telephone = jQuery("#telephone");
    var adresse = jQuery("#adresse");
    var ville = jQuery("#ville");
    var code_postal = jQuery("#code_postal");
    var province = jQuery("#province");
    var pays = jQuery("#pays");

    /**
     * Ajout d'une fonction permettant d'ajouter une image par notre bouton de style.
     */
    jQuery("#ajouter_image").click(function (document) {
        document.preventDefault();
        image_profil.trigger("click");
    });

    /**
     * Ajout des méthodes de validation d'images.
     */
    image_profil.change(function (inputGroup) {
        if (inputGroup.target.files && inputGroup.target.files[0]){
            var extension = inputGroup.target.files[0].name.substr((inputGroup.target.files[0].name.lastIndexOf('.') +1));
            if (extension === "jpg" || extension === "jpeg" || extension === "png" || extension === "svg"){
                var reader = new FileReader();
                reader.onload = function (e) {
                    jQuery('#image_selectionnee')
                        .attr('src', e.target.result)
                        .width(50)
                        .height(50);
                };
                jQuery("#image_selectionnee").attr("class", "d-block image-selectionnee");
                reader.readAsDataURL(inputGroup.target.files[0]);
                jQuery("#image_validation").html("1 image sélectionnée.").attr("class", "correct");
            } else {
                jQuery("#image_selectionnee").attr("class", "d-none image-selectionnee");
                jQuery("#image_validation").html("Aucune image sélectionnée.").attr("class", "erreur");
                image_profil.val(null);
            }
        } else {
            jQuery("#image_selectionnee").attr("class", "d-none image-selectionnee");
            jQuery("#image_validation").html("Aucune image sélectionnée.").attr("class", "erreur");
        }
    });

    identifiant.change(function () {
        verifierLongueurChamp(identifiant, 100);
    }).keyup(function () {
        verifierLongueurChamp(identifiant, 100);
    }).keydown(function () {
        verifierLongueurChamp(identifiant, 100);
    });

    mot_de_passe.change(function () {
        verifierMotDePasse();
        verifierMotDePasseConfirmation();
    }).keyup(function () {
        verifierMotDePasse();
        verifierMotDePasseConfirmation();
    }).keydown(function () {
        verifierMotDePasse();
        verifierMotDePasseConfirmation();
    });

    mot_de_passe_confirmation.change(function () {
        verifierMotDePasseConfirmation();
    }).keyup(function () {
        verifierMotDePasseConfirmation();
    }).keydown(function () {
        verifierMotDePasseConfirmation();
    });

    prenom.change(function () {
        verifierLongueurChamp(prenom, 100);
    }).keyup(function () {
        verifierLongueurChamp(prenom, 100);
    }).keydown(function () {
        verifierLongueurChamp(prenom, 100);
    });

    nom.change(function () {
        verifierLongueurChamp(nom, 100);
    }).keyup(function () {
        verifierLongueurChamp(nom, 100);
    }).keydown(function () {
        verifierLongueurChamp(nom, 100);
    });

    adresse.change(function () {
        verifierLongueurChamp(adresse, 200);
    }).keyup(function () {
        verifierLongueurChamp(adresse, 200);
    }).keydown(function () {
        verifierLongueurChamp(adresse, 200);
    });

    code_postal.change(function () {
        verifierCodePostal();
    }).keyup(function () {
        verifierCodePostal();
    }).keydown(function () {
        verifierCodePostal();
    });

    province.change(function () {
        verifierLongueurChamp(province, 100);
    }).keyup(function () {
        verifierLongueurChamp(province, 100);
    }).keydown(function () {
        verifierLongueurChamp(province, 100);
    });

    email.change(function () {
        verifierEmail();
    }).keyup(function () {
        verifierEmail();
    }).keydown(function () {
        verifierEmail();
    });

    telephone.change(function () {
        verifierTelephone();
    }).keyup(function () {
        verifierTelephone();
    }).keydown(function () {
        verifierTelephone();
    });

    ville.change(function () {
        verifierLongueurChamp(ville, 100);
    }).keyup(function () {
        verifierLongueurChamp(ville, 100);
    }).keydown(function () {
        verifierLongueurChamp(ville, 100);
    });

    pays.change(function () {
        verifierPays();
    }).keyup(function () {
        verifierPays();
    }).keydown(function () {
        verifierPays();
    });
    
    jQuery("#soumission").click(function (document) {
        var validationIdentifiant = verifierLongueurChamp(identifiant, 100);
        var validationMotDePasse = verifierMotDePasse();
        var validationMotDePasseConfirmation = verifierMotDePasseConfirmation();
        var validationPrenom = verifierLongueurChamp(prenom, 100);
        var validationNom = verifierLongueurChamp(nom, 100);
        var validationAdresse = verifierLongueurChamp(adresse, 200);
        var validationCodePostal = verifierCodePostal();
        var validationProvince = verifierLongueurChamp(province, 100);
        var validationEmail = verifierEmail();
        var validationTelephone = verifierTelephone();
        var validationVille = verifierLongueurChamp(ville, 100);
        var validationPays = verifierPays();
        if (validationIdentifiant && validationMotDePasse && validationMotDePasseConfirmation && validationPrenom && validationNom && validationAdresse && validationCodePostal && validationProvince && validationEmail && validationTelephone && validationVille && validationPays) {
            jQuery("form").submit();
        } else {
            document.preventDefault();
        }
    });

    function verifierEmail() {
        if (email.val().match(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/)) {
            email.attr("class", "form-control is-valid");
            return true;
        } else {
            email.attr("class", "form-control is-invalid");
            return false;
        }
    }

    function verifierMotDePasse() {
        if (mot_de_passe.val().length >= 6) {
            var matchUpper = mot_de_passe.val().match(/([A-Z])/);
            var matchDigit = mot_de_passe.val().match(/(\d)/);
            var validation = jQuery("#mot_de_passe_validation");
            validation.html("Modéré").attr("class", "attention");
            if (matchUpper && matchDigit) {
                validation.html("Fort").attr("class", "correct");
            }
            mot_de_passe.attr("class", "form-control is-valid");
            return true;
        } else {
            mot_de_passe.attr("class", "form-control is-invalid");
            jQuery("#mot_de_passe_validation").html("Faible").attr("class", "erreur");
            return false;
        }
    }

    function verifierMotDePasseConfirmation() {
        if (mot_de_passe.val() === mot_de_passe_confirmation.val() && mot_de_passe_confirmation.val() !== null && mot_de_passe_confirmation.val() !== ""){
            mot_de_passe_confirmation.attr("class", "form-control is-valid");
            return true;
        } else {
            mot_de_passe_confirmation.attr("class", "form-control is-invalid");
            return false;
        }
    }

    function verifierCodePostal() {
        if (code_postal.val().match(/^[A-Za-z\d][A-Za-z\d][A-Za-z][ -]?[A-Za-z\d][A-Za-z\d][A-Za-z\d]$/)) {
            code_postal.attr("class", "form-control is-valid");
            return true;
        } else {
            code_postal.attr("class", "form-control is-invalid");
            return false;
        }
    }

    function verifierLongueurChamp(champ, taille) {
        if (champ.val().length > 0 && champ.val().length <= taille) {
            champ.attr("class", "form-control is-valid");
            return true;
        } else {
            champ.attr("class", "form-control is-invalid");
            return false;
        }
    }

    function verifierTelephone() {
        if (telephone.val().length <= 25 && telephone.val().match(/^[\D]*(\d*)[\D]*(\d{3})[\D]*(\d{3})[\D]*(\d{4})[\D]*$/)) {
            telephone.attr("class", "form-control is-valid");
            return true;
        } else if (telephone.val().length === 0) {
            telephone.attr("class", "form-control");
            return true;
        } else {
            telephone.attr("class", "form-control is-invalid");
            return false;
        }
    }

    function verifierPays() {
        if (pays.val() !== "Sélectionnez un pays..."){
            pays.attr("class", "form-control is-valid");
            return true;
        } else {
            pays.attr("class", "form-control is-invalid");
            return false;
        }
    }
});