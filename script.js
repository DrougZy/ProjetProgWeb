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
    var2 = $("#input-nbr-formulaire").val();
    $.ajax({
        method: "POST", 
        url: "etape1NewForm.php", 
        data: {"nom":var1, "nbr":var2}
    })
    .done(function(){

    })
    .fail(function() {
        alert("erreur sur l épate 1 de la création d un formulaire");
    })
}

function test() {
    console.log("CA MARCHE!!!");
}

function ajoutChoix(){
    console.log($("#input-ajoute-choix").val());
}