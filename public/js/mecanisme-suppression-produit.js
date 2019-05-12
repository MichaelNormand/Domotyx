jQuery(document).ready(function () {
    jQuery(".fa-trash-alt").click(function () {
        var form = jQuery(this).parents("form:first");
        var produit = jQuery(this).parents(".container:first").parent();
        jQuery.confirm({
            title: "Confirmation",
            type: "red",
            alignMiddle: true,
            container: "body",
            content: "Êtes-vous certain de vouloir supprimer ce produit?",
            buttons: {
                oui: {
                    text: "Oui",
                    btnClass: "btn-green",
                    action: function () {
                        jQuery.ajax({
                            type: "DELETE",
                            url: form.attr("action"),
                            dataType: "json",
                            data: form.serialize()
                        }).done(function (reponse, texte, jqXHR) {
                            if (reponse.produit_supprime) {
                                produit.remove();
                                jQuery.confirm({
                                    title: "Succès!",
                                    type: "green",
                                    alignMiddle: true,
                                    container: "body",
                                    content: "Le produit a été supprimé avec succès!",
                                    buttons: {
                                        ok: {
                                            text: "OK",
                                            btnClass: "btn-green",
                                            action: function () {
                                            }
                                        }
                                    }
                                });
                            } else {
                                jQuery.confirm({
                                    title: "Erreur",
                                    type: "red",
                                    alignMiddle: true,
                                    container: "body",
                                    content: "Le produit n'a pas été supprimé pour une raison inconnue. Veuillez réessayer plus tard.",
                                    buttons: {
                                        ok: {
                                            text: "OK",
                                            btnClass: "btn-red",
                                            action: function () {

                                            }
                                        }
                                    }
                                })
                            }
                        }).fail(function () {
                            jQuery.confirm({
                                title: "Erreur Connectivité",
                                type: "red",
                                alignMiddle: true,
                                container: "body",
                                content: "Une erreur est survenue. Veuillez réessayer plus tard.",
                                buttons: {
                                    ok: {
                                        text: "OK",
                                        btnClass: "btn-red",
                                        action: function () {

                                        }
                                    }
                                }
                            })
                        });
                    }
                },

                non: {
                    text: "Non",
                    btnClass: "btn-red",
                    action: function () {
                    }
                }
            }
        });
    });
});
