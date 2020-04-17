$(document).ready(function () {

    $(".categorie li").click(function (event) {
        $(".categorie li").each(function (index) {
            this.className = "";
        });
        this.className = "categorie-active";

    
        let test = "";
        let myhidden = document.getElementById("hiddenCategorie");
        $(".categorie-active").each(function (index) {
            test = this.id;
        });

        myhidden.value = test;
        console.log(myhidden.value);
    });

    $(".recherche li").click(function (event) {

        if (this.id == "prix") {
            // prix ? prix = false : prix = true;
            // prix ? this.className = "recherche-active" : this.className = "";
            $("#prix").toggleClass("recherche-active");
        } else {
            $(".recherche li").each(function (index) {
                if (this.id != "prix") this.className = "";
            });
            this.className = "recherche-active";
        }


        let tmp = "";
        let myhidden = document.getElementById("hiddenRecherche");

        $(".recherche-active").each(function (index) {
            tmp += this.id;
            tmp += "/"
        });
        tmp = tmp.substr(0, tmp.length -1);
        myhidden.value = tmp;
        console.log(myhidden.value);
    });
});
