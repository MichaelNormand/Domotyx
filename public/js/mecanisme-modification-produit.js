jQuery(document).ready(function () {
    var rabaisGroupe = jQuery("#rabaisGroupe");
    jQuery("#rabais_checkbox").change(function () {
        if (jQuery(this).is(":checked")){
            rabaisGroupe.removeClass("d-none");
            rabaisGroupe.addClass("d-block");
        } else {
            rabaisGroupe.removeClass("d-block");
            rabaisGroupe.addClass("d-none");
        }
    });

    jQuery("#supprimerImage").click(function (page) {
        page.preventDefault();
        jQuery("#image_produit").attr("src", jQuery(this).attr("href"));
        jQuery(this).parent().parent().append("<input id='image_enlevee' class='d-none' name='image_ref' />")
    });

    jQuery("#modifierImage").click(function () {
        jQuery("#image_produit_input").trigger("click");
    });

    jQuery("#image_produit_input").change(function (inputGroup) {
        if (inputGroup.target.files && inputGroup.target.files[0]){
            var extension = inputGroup.target.files[0].name.substr((inputGroup.target.files[0].name.lastIndexOf('.') +1));
            if (extension === "jpg" || extension === "jpeg" || extension === "png" || extension === "svg"){
                var reader = new FileReader();
                reader.onload = function (e) {
                    jQuery('#image_produit')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(inputGroup.target.files[0]);
                jQuery("#image_enlevee").remove();
            } else {
                jQuery(this).val(null);
            }
        }
    });

    jQuery("#nom").keydown(function () {
        checkLabel(100, jQuery(this), false);
    }).keyup(function () {
        checkLabel(100, jQuery(this), false);
    }).change(function () {
        checkLabel(100, jQuery(this), false);
    });

    jQuery("#prix").keydown(function () {
        checkLabel(10000, jQuery(this), true, false);
    }).keyup(function () {
        checkLabel(10000, jQuery(this), true, false);
    }).change(function () {
        checkLabel(10000, jQuery(this), true, true);
    });

    jQuery("#description").keydown(function () {
        checkLabel(0, jQuery(this), false);
    }).keyup(function () {
        checkLabel(0, jQuery(this), false);
    }).change(function () {
        checkLabel(0, jQuery(this), false);
    });

    jQuery("#rabais").change(function () {
        checkRabais(10000, jQuery(this), jQuery("#rabais_checkbox"), true);
    }).keyup(function () {
        checkRabais(10000, jQuery(this), jQuery("#rabais_checkbox"), false);
    }).keydown(function () {
        checkRabais(10000, jQuery(this), jQuery("#rabais_checkbox"), false);
    });

    jQuery("button").click(function (page) {
        page.preventDefault();
        var checkRabaisValue = checkRabais(10000, jQuery("#rabais"), jQuery("#rabais_checkbox"));
        var checkDescription = checkLabel(0, jQuery("#description"), false);
        var checkPrix = checkLabel(10000, jQuery("#prix"), true);
        var checkNom = checkLabel(100, jQuery("#nom"), false);
        if (checkRabaisValue && checkDescription && checkPrix && checkNom){
            jQuery("form").submit();
        }
    });

    function checkLabel(tailleMax, label, numeric, change) {
        if (!numeric){
            if ((label.val().length > 0 && label.val().length <= tailleMax && tailleMax !== 0) || (label.val().length > 0 && tailleMax === 0)){
                label.removeClass("is-invalid");
                label.addClass("is-valid");
                return true;
            } else {
                label.removeClass("is-valid");
                label.addClass("is-invalid");
                return false;
            }
        } else {
            if (!isNaN(label.val()) && ((parseInt(label.val()) >= 0.00 && parseInt(label.val()) <= tailleMax && tailleMax !== 0) || (parseFloat(label.val()) >= 0.00 && tailleMax === 0))){
                label.removeClass("is-invalid");
                label.addClass("is-valid");
                if (change){
                    var nombre = label.val().split(".")[0];
                    var lastDigit = label.val().split(".")[1];
                    if (lastDigit !== undefined){
                        if (lastDigit.length > 2){
                            lastDigit = lastDigit[0] + lastDigit[1];
                        }
                        nombre += "." + lastDigit;
                    } else {
                        nombre += ".00";
                    }
                    label.val(nombre);
                }
                return true;
            } else {
                label.removeClass("is-valid");
                label.addClass("is-invalid");
                return false;
            }
        }
    }

    function checkRabais(tailleMax, label, labelCheck, change){
        if (labelCheck.is(":checked")){
            return checkLabel(tailleMax, label, true, change);
        } else {
            return true;
        }
    }
});
