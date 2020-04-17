$(document).ready(function () {
    // $(".fa-times").click(function() {
    //     fullId = this.id;
    //     if ( confirm( "Etes-vous sûr ?" ) ) {
    //         $.ajax({
    //             type:"POST",
    //             url:"deleteFromAdmin.php",
    //             data:'fullId='+fullId
    //         })
    //     }
    // });  
    $(".listMarchandises i").click(function (event) {
        console.log(this.id);
        let myhidden = document.getElementById("hiddenID");
        myhidden.value = this.id;
    });
});