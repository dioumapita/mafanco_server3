var form = $("#example-advanced-form").show();

form.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    saveState: true,
    onStepChanging: function (event, currentIndex, newIndex)
    {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex)
        {
            return true;
        }
        // Forbid next action on "Warning" step if the user is to young
        // if (newIndex === 3 && Number($("#age-2").val()) < 18)
        // {
        //     return false;
        // }
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex)
        {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onStepChanged: function (event, currentIndex, priorIndex)
    {
        // Used to skip the "Warning" step if the user is old enough.
        if (currentIndex === 2 && Number($("#prenom_nom").val()) === 18)
        {

            return false;
        }
        // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
        // if (currentIndex === 2 && priorIndex === 3)
        // {
        //     form.steps("previous");
        // }
    },
    onFinishing: function (event, currentIndex)
    {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex)
    {
        $('#example-advanced-form').submit();

    }
}).validate({
    // errorPlacement: function errorPlacement(error, element) { element.before(error); },
    /**
     * code utiliser pour gerer les messages d'erreurs  et les règles de validation
     */
    errorPlacement: function (error, element) { // render error placement for each input type
        var cont = $(element).parent('.input-group');
        if (cont) {
            cont.after(error);
        } else {
            element.after(error);
        }
    },
    highlight: function (element) { // hightlight error inputs
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
    },
    unhighlight: function (element) { // revert the change done by hightlight
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set error class to the control group
    },
    rules: {
        matricule: {
            required: true,
            minlength: 6,
            maxlength: 6,
            number: true
        },
        confirm: {
            equalTo: "#password-2"
        },
        nom: {
            minlength: 2,
            required: true
        },
        prenom: {
            required: true,
            minlength: 4
        },
        sexe: {
            required: true
        },
        date_naissance: {
            required: true,
            date: true
        },
        classe: {
            required: true
        },
        telephone: {
            required: false,
            number: true,
            minlength: 9,
            maxlength: 9
        },
        quartier: {
            required: true
        },
        date_inscription: {
            required: true,
            date: true
        },
        photo_eleve: {
            required: false
        },
        nom_parent: {
            required: false,
        },
        prenom_parent: {
            required: false,
        },
        profession: {
            required: false
        },
        telephone_parent: {
            required: true,
            number: true,
            minlength: 9,
            maxlength: 9
        },
        frais_inscription: {
            required: true,
            number: true
        }
    },
    messages: {
        matricule: {
            required: "Veuillez saisir le matricule de l'élève",
            minlength: "Le matricule doit contenir au minimum 6 chiffres",
            maxlength: "Le matricule doit contenir au maximum 6 chiffres",
            number: "Le matricule ne doit contenir que des chiffres (0 à 9)"
        },
        nom: {
                required: "Veuillez saisir le nom de l'élève",
                minlength: "Le nom doit contenir au minimum 2 caractères"
        },
        prenom: {
             required: "Veuillez saisir le prénom de l'élève",
             minlength: "Le prénom doit contenir au minimum 4 caractères"
        },
        sexe: {
            required: "Veuillez selectionnez le genre"
        },
        date_naissance: {
             required: "Veuillez ajouter la date de naissance de l'élève",
             date: "La date de naissance est invalide"
        },
        classe: {
            required: "Veuillez selectionnez la classe de l'élève"
        },
        telephone: {
            number: "Le numéro de téléphone ne doit contenir que des chiffres de (0 à 9) .",
            minlength: "Le numéro de téléphone doit contenir (9 chiffres)",
            maxlength: "Le numéro de téléphone est invalide maximum (9 chiffres)"
        },
        quartier: {
            required: "Veuillez une adresse (Quartier)"
        },
        date_inscription: {
            required: "Veuillez ajouter la date d'inscription de l'élève",
            date: "La date d'inscription est invalide"
        },
        telephone_parent: {
            required: "Veuillez saisir le numéro de téléphone du parent ou tuteur",
            number: "Le numéro de téléphone ne doit contenir que des chiffres de (0 à 9) .",
            minlength: "Le numéro de téléphone doit contenir (9 chiffres)",
            maxlength: "Le numéro de téléphone est invalide maximum (9 chiffres)"
        },
        frais_inscription: {
            required: "Veuillez saisir les frais d'inscription",
            number: "Frais d'inscription invalide (ne doit contenir que des entiers)"
        }

    },
    /**
     * code utiliser pour gerer les messages d'erreurs  et les règles de validation
    */
});

/**
 * start inscription enseignant
 */
var form2 = $("#inscriptions-enseignants").show();

form2.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    saveState: true,
    onStepChanging: function (event, currentIndex, newIndex)
    {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex)
        {
            return true;
        }
        // Forbid next action on "Warning" step if the user is to young
        // if (newIndex === 3 && Number($("#age-2").val()) < 18)
        // {
        //     return false;
        // }
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex)
        {
            // To remove error styles
            form2.find(".body:eq(" + newIndex + ") label.error").remove();
            form2.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form2.validate().settings.ignore = ":disabled,:hidden";
        return form2.valid();
    },
    onStepChanged: function (event, currentIndex, priorIndex)
    {
        // Used to skip the "Warning" step if the user is old enough.
        // if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
        // {
        //     form.steps("next");
        // }
        // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
        // if (currentIndex === 2 && priorIndex === 3)
        // {
        //     form.steps("previous");
        // }
    },
    onFinishing: function (event, currentIndex)
    {
        form2.validate().settings.ignore = ":disabled";
        return form2.valid();
    },
    onFinished: function (event, currentIndex)
    {
        $('#inscriptions-enseignants').submit();

    }
    }).validate({
    // errorPlacement: function errorPlacement(error, element) { element.before(error); },
    /**
     * code utiliser pour gerer les messages d'erreurs  et les règles de validation
     */
    errorPlacement: function (error, element) { // render error placement for each input type
        var cont = $(element).parent('.input-group');
        if (cont) {
            cont.after(error);
        } else {
            element.after(error);
        }
    },
    highlight: function (element) { // hightlight error inputs
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
    },
    unhighlight: function (element) { // revert the change done by hightlight
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set error class to the control group
    },

    rules: {
        confirm: {
            equalTo: "#password-2"
        },
        nom: {
            minlength: 2,
            maxlength: 15,
            required: true
        },
        prenom: {
            required: true,
            minlength: 4,
            maxlength: 25
        },
        civilite: {
            required: true
        },
        date_naissance: {
            required: true,
            date: true
        },
        email:{
            required: true,
            email: true,
        },
        classe: {
            required: true
        },
        telephone: {
            required: true,
            number: true,
            minlength: 9,
            maxlength: 9
        },
        quartier: {
            required: true
        },
        date_inscription: {
            required: true,
            date: true
        },
        photo_eleve: {
            required: false
        },
        nom_parent: {
            required: true,
            minlength: 2
        },
        prenom_parent: {
            required: true,
            minlength: 4
        },
        profession: {
            required: true
        },
        telephone_parent: {
            required: true,
            number: true,
            minlength: 9,
            maxlength: 9
        }
    },
    messages: {
        nom: {
                required: "Veuillez saisir le nom de l'enseignant(e)",
                minlength: "Le nom doit contenir au minimum 2 caractères"
        },
        prenom: {
             required: "Veuillez saisir le prénom de l'enseignant(e)",
             minlength: "Le prénom doit contenir au minimum 4 caractères"
        },
        civilite: {
            required: "Veuillez selectionnez la civilité"
        },
        date_naissance: {
             required: "Veuillez ajouter la date de naissance de l'enseignant(e)",
             date: "La date de naissance est invalide"
        },
        email: {
            required: "Veuillez saisir e-mail de l'enseignant",
            email: "e-mail invalide"
        },
        telephone: {
            required: "Veuillez saisir le numéro de téléphone de l'enseignant",
            number: "Le numéro de téléphone ne doit contenir que des chiffres de (0 à 9) .",
            minlength: "Le numéro de téléphone doit contenir (9 chiffres)",
            maxlength: "Le numéro de téléphone est invalide maximum (9 chiffres)"
        },
        quartier: {
            required: "Veuillez saisiir une adresse (Quartier)"
        }


    },
    /**
     * code utiliser pour gerer les messages d'erreurs  et les règles de validation
    */
});

/**
 * start l'emplois de temps
 */
var form3 = $("#emplois-de-temps").show();

form3.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    saveState: true,
    onStepChanging: function (event, currentIndex, newIndex)
    {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex)
        {
            return true;
        }
        // Forbid next action on "Warning" step if the user is to young
        // if (newIndex === 3 && Number($("#age-2").val()) < 18)
        // {
        //     return false;
        // }
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex)
        {
            // To remove error styles
            form3.find(".body:eq(" + newIndex + ") label.error").remove();
            form3.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form3.validate().settings.ignore = ":disabled,:hidden";
        return form3.valid();
    },
    onFinishing: function (event, currentIndex)
    {
        form3.validate().settings.ignore = ":disabled";
        return form3.valid();
    },
    onFinished: function (event, currentIndex)
    {
        $('#emplois-de-temps').submit();
    }
});








/**
 * end inscription enseignant
 */

$("#example-vertical").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    stepsOrientation: "vertical"
});
