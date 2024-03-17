function detailScrutin(id){

    $.ajax( {
        method: "POST",
        url: "detailScrutin.php",
        data:{"id":id}
    })
    .done(function(msg) {
        $("#contents2").html(msg);
    })
    .fail(function(){
        alert( "erreur sur l'affichage des details d'un scrutin" );
    });
}

function creationScrutin(){
    nbrChoix = 0;
    Choix = [];
    $.ajax({
        method: "POST", 
        url: "formulaireScrutin1.php"
    })
    .done(function(msg) {
        $("#contents2").html(msg);
    })
    .fail(function() {
        alert("erreur sur la création d'un nouveau scrutin")
    })
}

function etape1NewForm(){

    var1 = $("#input-nom-formulaire").val();
    var2 = $("#input-question-formulaire").val();
    var3 = $("#input-nbr-formulaire").val();

    for(let i = 1; i <= nbrChoix; i++){
        $("#contents2").html($("#choix1").val());
    }
    
    $.ajax({
        method: "POST", 
        url: "etape1NewForm.php", 
        data: {"nom":var1, "question": var2, "nbr":var3, "nbrProp": nbrChoix, "tableauProp": Choix}
    })
    .done(function(){

    })
    .fail(function() {
        alert("erreur sur l épate 1 de la création d un formulaire");
    })
}


var nbrChoix = 0;
let Choix = [];
function ajoutChoix(){

    if ($("#input-ajoute-choix").val() != ""){

        nbrChoix += 1;

        Choix.push($("#input-ajoute-choix").val());


        if (nbrChoix < 5) {
            $.ajax({
                method: "POST", 
                url: "ajouteChoixFormulaire.php", 
                data: {"choix": $("#input-ajoute-choix").val(), "id":nbrChoix}
            })
            .done(function(msg){
                $("#nouveauChoix").append(msg);
            })
            .fail(function() {
                alert("erreur sur l'ajout d'un choix dans le formulaire");
            })
        } else {
            $("#messageErreurNouveauFormulaire").html("<br> <p>Impossible d'ajouter d'autre choix</p>");
        }
    }

    $("#input-ajoute-choix").val("");
}