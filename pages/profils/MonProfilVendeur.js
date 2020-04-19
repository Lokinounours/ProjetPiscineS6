$(document).ready(function () {

    $(".accepter").click(function () {

        let idItem = $(this).children('.accept').attr('name');
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
                idItem += '/';
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