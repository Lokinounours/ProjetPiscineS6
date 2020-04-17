$(document).ready(function () {

    $(".elem").click(function (event) {

        let tmpID = this.id
        let prix = 0;

        $(".elem").find("p").each(function (index) {
            if(this.id == tmpID) {
                prix = this.innerText
                prix = prix.substring(0, prix.length - 1);
            }
        })

        if (this.id == "E")prompt("Quel enchère voulez vous faire ?", prix)
        if (this.id == "I")prompt("Voulez vous acheter ce produit pour " + prix + "£ ?", "oui")
        if (this.id == "M")prompt("Quel est votre meilleur offre ?", prix)

    });
});