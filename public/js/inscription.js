$(document).ready(function() {
    
    $(document).on("keyup", "#in_login", function(e) {
        if(validatePseudo($(this).val())) {
            $(this).setInputError("ok")
        } else {
            $(this).setInputError("error")
        }
        
        if($(this).val().length > 2) {
            loginExists($(this))
        } else {
            $("#help-login").html("")
        }
        
        if($(this).val() == "") {
            $(this).setInputError("none")
        }
    })
    
    $(document).on("keyup", "#in_mail", function(e) {
        if(validateEmail($(this).val())) {
            $(this).setInputError("ok")
        } else {
            $(this).setInputError("error")
        }
        
        if($(this).val().length > 2) {
            mailExists($(this))
        } else {
            $("#help-mail").html("")
        }
        
        if($(this).val() == "") {
            $(this).setInputError("none")
        }
    })
    
    $(document).on("keyup", "#in_pass", function(e) {
        let strength = verifyStrength($(this))
        
        switch(strength) {
            case "strong":
                $(this).css("background-color", "#94c769")
                $("#help-pass").css("color", "green")
                $("#help-pass").html("<p>Mot de passe au top !</p>")
                break;
            case "medium":
                $(this).css("background-color", "#f7bd4a")
                $("#help-pass").css("color", "orange")
                $("#help-pass").html("<p>Mot de passe acceptable</p>")
                break;
            case "weak":
                $(this).css("background-color", "#df7f7f")
                $("#help-pass").css("color", "red")
                $("#help-pass").html("<p>Mot de passe trop faible</p>")
                break;
        }
        
        if($(this).val() == "") {
            $(this).css("background-color", "white")
            $("#help-pass").html("")
        }
    })
    
    $(document).on("keyup", "#in_confirm", function(e) {
        
        if($(this).val() != $("#in_pass").val()) {
            $(this).css("background-color", "#df7f7f")
        } else {
            $(this).css("background-color", "#94c769")
        }
    })
    
    $(document).on("click touchend", "#btn_submit", function(e) {
        if(e.type == "touchend") {
            $(this).off("click")
        }
        
        let error = 0
        
        if(validatePseudo($("#in_login").val())) {
            var login = $("#in_login").val()
        } else {
            $("#in_login").setInputError("error")
            error++
        }
        
        if(validateEmail($("#in_mail").val())) {
            var mail = $("#in_mail").val()
        } else {
            $("#in_mail").setInputError("error")
            error++
        }
        
        if(verifyStrength($("#in_pass")) != "weak" && $("#in_pass").val() === $("#in_confirm").val()) {
            var pass = $("#in_pass").val()
        } else {
            $("#in_pass").setInputError("error")
            $("#in_confirm").setInputError("error")
            error++
        }
        
        if(error === 0) {
            
            $.post("../models/inscription.php", {
                a:"subscribe",
                mail:mail,
                login:login,
                pass:pass
            }, function(data) {
                if(data) {
                    if(!data.error) {
                        displayNotif(0, "Succes")
                    } else {
                        displayNotif(1, "Erreur")
                    }
                }
            }, "json")
            
        } else {
            
        }
    })
})

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

function verifyStrength(el) {
    let strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    let mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{8,})");
    let strength = ""
    
    if(strongRegex.test($(el).val())) {
        strength = "strong"
    } else if (mediumRegex.test($(el).val())) {
        strength = "medium"
    } else {
        strength = "weak"
    }
    
    return strength
}

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

    $("#in_login").val("")
    $("#in_pass").val("")
    $("#in_confirm").val("")

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
            window.location.href = "http://french-gaming-family.yj.fr/"
        })
    }, 2000)

}

function loginExists(el) {
    
    let val = $(el).val()
    
    $.post("../models/inscription.php", {
        a:"loginExists",
        login:val
    }, function(data) {
        if(data) {
            console.log(data)
            if(data.error) {
                $("#help-login").setHelp("error", data.message)
            } else {
                $("#help-login").setHelp("ok", data.message)
            }
        }
    }, "json")
}

function mailExists(el) {
    
    let val = $(el).val()
    
    $.post("../models/inscription.php", {
        a:"mailExists",
        mail:val
    }, function(data) {
        if(data) {
            console.log(data)
            if(data.error) {
                $("#help-mail").setHelp("error", data.message)
            } else {
                $("#help-mail").setHelp("ok", data.message)
            }
        }
    }, "json")
}

(function($) {
    $.fn.setInputError = function(status) {
        switch(status) {
            case "error":
                $(this).css("border", "2px solid red")
                break;
            case "ok":
                $(this).css("border", "2px solid green")
                break;
            case "none":
                $(this).css("border", "none")
                break;
        }
        
    }
})(jQuery);

(function($) {
    $.fn.setHelp = function(status, message) {
        
        switch(status) {
            case "error":
                $(this).css("color", "red")
                $(this).html("<p>"+message+"</p>")
                break;
            case "ok":
                $(this).css("color", "green")
                $(this).html("<p>"+message+"</p>")
                break;
        }
        
    }
})(jQuery);