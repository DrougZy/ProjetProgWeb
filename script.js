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
        alert( "error" );
    });
}