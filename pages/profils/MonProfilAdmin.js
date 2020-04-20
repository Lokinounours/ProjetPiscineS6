$(document).ready(function () { 
    
    $("i").click(function (event) 
    {
        let myhidden = document.getElementById("hiddenID");
        myhidden.value = this.id;

        if(confirm("Etes vous sûr(e) ?")){
            document.getElementById("hiddenForm").submit();
        }
    });
});