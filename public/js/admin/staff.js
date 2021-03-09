$(document).ready(function() {
    
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
    
    getPending()
    getAchieved()
    
})

function achieve(id) {
    $.post("../models/admin.php", {
        a:"achieveStaff",
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
        a:"deleteStaff",
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
        a:"getPendingStaff"
    }, function(data) {
        if(data) {
            
            $("#pending").html(data)
        }
    })
}

function getAchieved() {
    $.post("../models/admin.php", {
        a:"getAchievedStaff"
    }, function(data) {
        if(data) {
            
            $("#achieved").html(data)
        }
    })
}
