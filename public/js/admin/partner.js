var pending_partner
var achieved_partner

$(document).ready(function() {
    
    //$("#pending").slideUp(500)
    //$("#achieved").slideUp(500)
    
    /*$(document).on("click touchend", "#slidePending", function(e) {
        e.stopPropagation()
        if(e.type == "touchend") {
            $(this).off("click")
        }
        
        $("#pending").slideToggle(1000)
    })*/
    
    $(document).on("click touchend", ".treatment-btn", function(e) {
        e.stopPropagation()
        if(e.type == "touchend") {
            $(this).off("click")
        }
        
        let id = $(this).attr("data-id")
        achieve(id)
    })
    
    $(document).on("click touchend", ".del-btn", function(e) {
        e.stopPropagation()
        if(e.type == "touchend") {
            $(this).off("click")
        }
        
        let id = $(this).attr("data-id")
        let pseudo = $(this).attr("data-pseudo")
        
        if(confirm("Supprimer la demande de "+pseudo+" ?")) {
            deleteAsk(id)
        }
    })
    
    $(document).on("click touchend", ".refute-btn", function(e) {
        e.stopPropagation()
        if(e.type == "touchend") {
            $(this).off("click")
        }
        
        let id = $(this).attr("data-id")
        let pseudo = $(this).attr("data-pseudo")
        
        if(confirm("Refuser la demande de "+pseudo+" ?")) {
            refute(id)
        }
    })
    
    getPending()
    getAchieved()
    
})

function achieve(id) {
    $.post("../models/admin.php", {
        a:"achievePartner",
        id:id
    }, function(data) {
        if(data) {
            getPending()
            getAchieved()
        }
    }, "json")
}

function deleteAsk(id) {
    console.log(id)
    $.post("../models/admin.php", {
        a:"deletePartner",
        id:id
    }, function(data) {
        if(data) {
            getPending()
            getAchieved()
        }
    }, "json")
}

function refute(id) {
    console.log(id)
    $.post("../models/admin.php", {
        a:"refutePartner",
        id:id
    }, function(data) {
        if(data) {
            getPending()
            getAchieved()
        }
    }, "json")
}

function getPending() {
    $.post("../models/admin.php", {
        a:"getPendingPartner"
    }, function(data) {
        if(data) {
            
            $("#pending").html(data)
        }
    })
}

function getAchieved() {
    $.post("../models/admin.php", {
        a:"getAchievedPartner"
    }, function(data) {
        if(data) {
            
            $("#achieved").html(data)
        }
    })
}
