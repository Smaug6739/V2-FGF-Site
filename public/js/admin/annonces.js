$(document).ready(function() {
    
    getAnnonces()
    
    $(document).on("click touchend", ".del-btn", function(e) {
        e.preventDefault()
        $(this).off("click")
        $(this).off("touchend")
        
        let id = $(this).attr("data-id")
        
        if(confirm("Confirmer la suppression ?")) {
            delAnnonce(id)
        }
    })
    
    $(document).on("click touchend", "#btn_submit", function(e) {
        e.preventDefault()
        $(this).off("click")
        $(this).off("touchend")
        
        let title = $("#in_title").val()
        let link = $("#in_link").val()
        let linkTitle = $("#in_linkTitle").val()
        let annonce = $("#ta_annonce").val()
        
        $.post("../models/annonce.php", {
            a:"postAnnonce",
            title:title,
            link:link,
            linkTitle:linkTitle,
            annonce:annonce
        }, function(data) {
            if(data) {
                getAnnonces()
            }
        }, "json")
    })
})

function getAnnonces() {
    $.post("../models/annonce.php", {
        a:"getAnnonces"
    }, function(data) {
        if(data) {
            $("#annonceContent").html(data)
        }
    })
}

function delAnnonce(id) {
    $.post("../models/annonce.php", {
        a:"delAnnonce",
        id:id
    }, function(data) {
        if(data) {
            getAnnonces()
        }
    })
}