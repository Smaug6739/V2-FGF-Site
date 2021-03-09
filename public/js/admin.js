$(document).ready(function() {
    
    $(".card-img-top").css("height", $(".card-img-top").css("width"))
    
    fillCards()
    
})

function fillCards() {
    $.post("../models/admin.php", {
        a:"fillCards"
    }, function(data) {
        if(data) {
            console.log(data)
            $("#nb-demandes").text(data.nbDemandes)
            $("#nb-articles").text(data.nbArticles)
            $("#nb-partner").text(data.nbPartner)
            $("#nb-staff").text(data.nbStaff)
        }
    }, "json")
}

