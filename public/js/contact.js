$(document).ready(function() {
    
    
    
    $("#btn_submit").prop("disabled", true)
    $("#btn_submit").hover().css("cursor", "not-allowed")
    
    let name = false
    let mail = false
    let message = false

    $(document).on("keyup", "#in_name", function(e) {
        
        if(validatePseudo($(this).val())) {
            
            $(this).css("border", "2px solid green")
            
            name = true
            
            if(name && mail && message) {
                $("#btn_submit").prop("disabled", false)
                $("#btn_submit").hover().css("cursor", "pointer")
            }
        } else {
            $(this).css("border", "2px solid red")
            name = false
            $("#btn_submit").prop("disabled", true)
            $("#btn_submit").hover().css("cursor", "not-allowed")
        }
    })

    $(document).on("keyup", "#in_mail", function(e) {
        if(validateEmail($(this).val())) {
            $(this).css("border", "2px solid green")
            
            mail = true
            
            if(name && mail && message) {
                $("#btn_submit").prop("disabled", false)
                $("#btn_submit").hover().css("cursor", "pointer")
            }
        } else {
            $(this).css("border", "2px solid red")
            
            mail = false
            $("#btn_submit").prop("disabled", true)
            $("#btn_submit").hover().css("cursor", "not-allowed")
        }
    })

    $(document).on("keyup", "#ta_message", function(e) {
        if($(this).val().length > 3) {
            $(this).css("border", "2px solid green")
            message = true
            
            if(name && mail && message) {
                $("#btn_submit").prop("disabled", false)
                $("#btn_submit").hover().css("cursor", "pointer")
            }
        } else {
            $(this).css("border", "2px solid red")
            message = false
            $("#btn_submit").prop("disabled", true)
            $("#btn_submit").hover().css("cursor", "not-allowed")
        }
    })

    $(document).on("click touchend", "#btn_submit", function(e) {
        
        $(this).off("click")
        $(this).off("touchend")

        let pseudo = ""
        let mail = ""
        let message = ""
        let error = 0
        let errorStr = ""

        if($("#in_name").val() != "" && validatePseudo($("#in_name").val())) {
            pseudo = $("#in_name").val()
        } else {
            error++
            errorStr += "Le pseudo n'est pas valide !<br>"
            $("#in_pseudo").css("border", "2px solid red")
        }

        if($("#in_mail").val() != "" && validateEmail($("#in_mail").val())) {
            mail = $("#in_mail").val()
        } else {
            error++
            errorStr += "L'adresse mail n'est pas valide !<br>"
            $("#in_mail").css("border", "2px solid red")
        }

        if($("#ta_message").val().length > 0) {
            message = $("#ta_message").val()
        } else {
            error++
            errorStr += "Le message ne peut etre vide !"
            $("#ta_demande").css("border", "2px solid red")
        }

        if(error === 0) {
            
            let now = new Date()
            let moment = ((now.getDate() < 10) ? "0"+now.getDate() : now.getDate())+"/"+((now.getMonth() < 10) ? "0"+now.getMonth() : now.getMonth())+"/"+now.getFullYear()+" à "+now.getHours()+":"+now.getMinutes()
            
            socket.emit('new',"Nouvelle demande de "+pseudo+" le "+moment);
            

            /*$.post("models/contact.php", {
                a:"demande",
                in_name:pseudo,
                in_mail:mail,
                ta_message:message
            }, function(data) {
                if(data) {
                    if(data.error) {
                        displayNotif(1, data.errorStr)
                    } else {
                        displayNotif(0, "Succès !")
                    }
                }
            }, "json")*/

        } else {
            e.preventDefault()
        }
    })
})

function displayNotif(type, message) {
    let color = ""
    switch (type) {
        case 0:
            color = "green"
            break;
        case 1:
            color = "red"
            break;
    }

    $("#in_pseudo").val("")
    $("#in_mail").val("")
    $("#ta_demande").val("")

    $("#notif").removeClass("notif-red")
    $("#notif").removeClass("notif-green")
    $("#notif").addClass("notif-"+color)
    $("#notif").html("<p>"+message+"</p>")
    $("#notif").animate({
        opacity:"1"
    }, 500)

    setTimeout(function() {
        $("#notif").animate({
            opacity:"0"
        }, 500, function() {
            if(type === 0) {
                window.location.href = "http://french-gaming-family.yj.fr/"
            }
        })
    }, 3000)

}

function validatePseudo(val) {
    let regex = /^[a-zA-Z0-9 !@#~$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/
    if(val.match(regex) && val.length > 2) {
        return true
    }
    return false
}

function validateEmail(val) {
    let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    if(val.match(regex) && val.length > 3) {
        return true
    }
    return false
}
