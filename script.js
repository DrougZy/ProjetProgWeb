function validateLogs()
{
  //Fonction appelée lors de la vérification de la connexion par l'utilisateur
    var var1 = $("#exampleInputEmail1").val();
    var var2 = $("#exampleInputPassword1").val();
    $.ajax( {
        type : "POST",
        url: "validateLogs.php",
        data:{"log": var1 , "pw" :var2}
      })
      .done(function(msg) {
        $("#connexionToken").html(
          "Connecté en tant que : "+ var1
        )
        $("#logs").html("<br>"+msg);
      })
      .fail(function() {
        alert( "error" );
      });
}

function loadSignPage()
{
    $.ajax( {
        url: "signUp.php",
      })
      .done(function(msg) {
        $("#contents").html(msg);
      })
      .fail(function() {
        alert( "error" );
      });
}

function loadConnectPage()
{
    $.ajax( {
        url: "connect.php",
      })
      .done(function(msg) {
        $("#contents").html(msg);
      })
      .fail(function() {
        alert( "error" );
      });   
}

function loadIndexPage(connected = false)
{
  if(connected)
  {
    $.ajax( {
    url: "page1.php",
  })
  .done(function(msg) {
    $("#contents").html(msg);
  })
  .fail(function() {
    alert( "error" );
  });  

  }
  else {
    $.ajax( {
      type : "POST",
      url: "IndexPage.php",
      data : {disconnected : true}
    })
    .done(function(msg) {
      $("#contents").html(msg);
      $("#connexionToken").html("Non connecté ");
    })
    .fail(function() {
      alert( "error" );
    });  
  } 
}

function newSubscriber()
{
    var var1 = $("#usernameSign").val();
    var var2 = $("#passwordSign").val();
    var var3 = $("#passwordSign2").val();   
    $.ajax( {
        url: "newSubscriber.php",
        type : "POST",
        data : {username : var1 , mdp1 : var2 , mdp2 : var3}
      })
      .done(function(msg) {
        $("#contents").html(msg);
          $.ajax( {
            url: "connect.php",
            type : "POST",
            data : {username : var1 , mdp1 : var2 , mdp2 : var3}
          })
          .done(function(msg) {
            $("#contents").html(msg);
          })
          .fail(function() {
            alert( "error" );
          });   
      })
      .fail(function() {
        alert( "error" );
      }); 
}

function logBout()
{
  console.log("salut");

  loadIndexPage(false);
  $("#connexionToken").html("Viens d'être déconnecté "); 
}

function loadPeopleResearch()
{
  $.ajax( {
    url: "peopleResearch.php",
    type : "POST",
    data:{
      stringSearched: $("#searchUsers").val()
  }
  })
  .done(function(msg) {
    $("#contents").html(msg);
  })
  .fail(function() {
    alert( "error" );
  }); 
}


function assignUserToVote()
{
  // TODO

  /*$.ajax( {
    type : "POST",
    url: "peopleResearch.php",
    
  })
  .done(function(msg)*/ 
  
    $("#contents").html("données enregistré mais pas la liste des personnes");
    validateUsers();
    //console.log(msg);
  
  
}

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
      data: {
             "nom":var1,
             "question": var2,
             "nbr":var3, 
             "nbrProp": nbrChoix, 
             "tableauProp": Choix
            }
  })
  .done(function(msg){
    console.log(msg);
    loadPeopleResearch();
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

var selectedUsers = []; // Tableau pour stocker les utilisateurs sélectionnés
    
function addUserToSelection(userId) {
  
    if(!selectedUsers.includes(userId)){
      console.log("pas déja dans la liste");
     // Ajouter l'ID de l'utilisateur sélectionné au tableau
      selectedUsers.push(userId)

    }
    else 
    {
      console.log("déja dans la liste");
      selectedUsers = selectedUsers.filter((word) => word != userId);
    }
    console.log(selectedUsers.length);
}

function validateUsers() {

  selectedUsers.forEach((element) => console.log(element));
  $.ajax({
    method: "POST", 
    url: "savePeople.php", 
    data: {
           "t":selectedUsers
          }
})
.done(function(){
  console.log("Datas saved");
})
.fail(function() {
    alert("erreur sur l épate 1 de la création d un formulaire");
})
} 