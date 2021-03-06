$(document).ready(function () {

    $(".categorie li").click(function (event) {
        $(".categorie li").each(function (index) {
            this.className = "catBtn";
        });
        this.className = "catBtn categorie-active";

        $(".colorSync").css("background-color", $(".categorie-active").css("color"));
        $(".colorSync").css("border", $(".categorie-active").css("color"));

        $(".enchere img").css("background-color", "var(--primary)");

        let myhidden = document.getElementById("hiddenCategorie");
        myhidden.value = event.target.id;
    });

    $(".enchere li").click(function (event) {
        (this.className == "enchBtn enchere-active") ? this.className = "enchBtn" : this.className = "enchBtn enchere-active";

        $(".enchBtn img").css("border", "none");
        $(".enchBtn img").css("padding", "0");

        $(".enchere-active img").css("border", "3px solid " + $(".categorie-active").css("color"));
        $(".enchere-active img").css("padding", "20px");

        let compatible = event.target.id;

        if (compatible == "Enchere") {
            $("#ench3").removeClass("enchere-active");
            $("#MeilleurProposition").css("border", "none");
            $("#MeilleurProposition").css("padding", "0");
        }
        else if (compatible == "MeilleurProposition") {
            $("#ench1").removeClass("enchere-active");
            $("#Enchere").css("border", "none");
            $("#Enchere").css("padding", "0");
        }

        let test = "";
        $(".date").addClass("dNone");
        $(".prixIm").addClass("iNone");
        $(".offre").addClass("oNone");
        $(".enchere-active").each(function (index) {
            if (this.id == "ench1") { test += "E"; $(".date").toggleClass("dNone"); }
            if (this.id == "ench2") { test += "I"; $(".prixIm").toggleClass("iNone"); }
            if (this.id == "ench3") { test += "M"; $(".offre").toggleClass("oNone"); }
        });


        let final = test;

        let myhidden = document.getElementById("hiddenEnchere");
        myhidden.value = final;
        console.log(final);
    });
});