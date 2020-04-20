$(document).ready(function () {

    $(".categorie li").click(function (event) {
        $(".categorie li").each(function (index) {
            this.className = "catBtn";
        });
        this.className = "categorie-active";

        let myhidden = document.getElementById("hiddenFond");
        myhidden.value = event.target.id;
    });

    $(".accepter").click(function () {
        let idItem = $(this).children('.accept').attr('name');
        console.log(idItem);
        if(confirm("Etes vous sûr(e) ?")){ 
            document.getElementById("hString").value = idItem;
            document.getElementById("hiddenForm").submit();
        }
    });

    $(".redo").click(function () {
        let idItem = $(this).children('.refaire').attr('name');
        if($(this).children('.refaire').text()=='Refaire une offre'){
            let valeur = prompt("Ecrivez le montant désiré.");
            if(valeur && valeur > 0){
                idItem += '-';
                idItem += valeur;
                document.getElementById("hString").value = idItem;
                document.getElementById("hiddenForm").submit();
            }
        }else{
            let valeur2 = 'S' + idItem;
            document.getElementById("hString").value = valeur2;
            document.getElementById("hiddenForm").submit();
        }
    });
}); 