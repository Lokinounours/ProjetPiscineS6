$(document).ready(function () {

    $(".elem").click(function (event) {

        let tmpID = this.id
        let prix = 0;

        $(".elem").find("p").each(function (index) {
            if (this.id == tmpID) {
                prix = this.innerText
                prix = prix.substring(0, prix.length - 1);
            }
        })

        let modif = 0;

        if (this.id == "E") {
            modif = "E"
            tmp = prix;
            tmp = prompt("Quel enchère voulez vous faire ?", prix)
            while (tmp <= prix) {
                tmp = prompt("La valeur de votre enchère est trop basse", prix)
            }
            modif += tmp;
        }
        if (this.id == "I") {
            modif = "I"
            modif += prompt("Voulez vous acheter ce produit pour " + prix + "£ ?", "oui")
        }
        if (this.id == "M") {
            modif = "M"
            modif += prompt("Quel est votre meilleur offre ? (oui si vous acceptez l'offre actuel)", "oui")
        }


        let myhidden = document.getElementById("hiddenPrix");
        myhidden.value = modif;
        document.getElementById("formSearch").submit();
    });
});