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
    $("i").click(function (event) {
        $("i").each(function (index) {
            this.className = "fas fa-times"
        })

        console.log(this.className);
        (this.className == "fas fa-check") ? (
            this.className = "fas fa-times"
            ) : (
                this.className = "fas fa-check"
            )

        let myhidden = document.getElementById("hiddenID");
        myhidden.value = this.id;
    });
});

// 
// fas fa-times