$(document).ready(function () {

    $(".categorie li").click(function (event) {
        $(".categorie li").each(function (index) {
            this.className = "catBtn";
        });
        this.className = "categorie-active";

        let myhidden = document.getElementById("hiddenFond");
        myhidden.value = event.target.id;
    });
}); 