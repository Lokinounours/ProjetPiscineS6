$(document).ready(function () {

    $("li.catBtn").click(function (event) {
        $("li").each(function (index) {
            this.className = "";
        });
        (this.className != "categorie-active") ? this.className = "categorie-active" : this.className = "";
        // let alt = event.target.id;
        // document.cookie = alt
        // // console.log(alt);console.log(document.cookie);

        var myhidden = document.getElementById("hiddenCategorie");
        myhidden.value = event.target.id;
    });
});
