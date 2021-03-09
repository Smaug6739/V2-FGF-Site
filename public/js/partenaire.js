$(document).ready(function() {
    
    $("#btn_submit").disableSubmit()
    
    var pseudo = false
    var mail = false
    var q1 = false
    var q2 = false
    var q3 = false
    var q4 = false
    var q5 = false
    var q6 = false
    
    $(document).on("keyup", "#in_pseudo", function(e) {
        if($(this).validatePseudo()) {
            $(this).setInputError("ok")
            pseudo = true
            if(pseudo && mail && q1 && q2 && q3 && q4 && q5 && q6) {
                $("#btn_submit").enableSubmit()
            } else {
                $("#btn_submit").disableSubmit()
            }
        } else {
            $(this).setInputError("error")
            pseudo = false
            if(pseudo && mail && q1 && q2 && q3 && q4 && q5 && q6) {
                $("#btn_submit").enableSubmit()
            } else {
                $("#btn_submit").disableSubmit()
            }
        }
    })
    
    $(document).on("keyup", "#in_mail", function(e) {
        if($(this).validateEmail()) {
            $(this).setInputError("ok")
            mail = true
            if(pseudo && mail && q1 && q2 && q3 && q4 && q5 && q6) {
                $("#btn_submit").enableSubmit()
            } else {
                $("#btn_submit").disableSubmit()
            }
        } else {
            $(this).setInputError("error")
            mail = false
            if(pseudo && mail && q1 && q2 && q3 && q4 && q5 && q6) {
                $("#btn_submit").enableSubmit()
            } else {
                $("#btn_submit").disableSubmit()
            }
        }
    })
    
    $(document).on("keyup", ".question", function() {
        if($(this).val().length < 3) {
            $(this).setInputError("error")
            
            switch($(this).attr("id")) {
                case "q1":
                    q1 = false
                    break;
                case "q2":
                    q2 = false
                    break;
                case "q3":
                    q3 = false
                    break;
                case "q4":
                    q4 = false
                    break;
                case "q5":
                    q5 = false
                    break;
                case "q6":
                    q6 = false
                    break;
            }
            
            if(pseudo && mail && q1 && q2 && q3 && q4 && q5 && q6) {
                $("#btn_submit").enableSubmit()
            } else {
                $("#btn_submit").disableSubmit()
            }
        } else {
            $(this).setInputError("ok")
            
            switch($(this).attr("id")) {
                case "q1":
                    q1 = true
                    break;
                case "q2":
                    q2 = true
                    break;
                case "q3":
                    q3 = true
                    break;
                case "q4":
                    q4 = true
                    break;
                case "q5":
                    q5 = true
                    break;
                case "q6":
                    q6 = true
                    break;
            }
            
            if(pseudo && mail && q1 && q2 && q3 && q4 && q5 && q6) {
                $("#btn_submit").enableSubmit()
            } else {
                $("#btn_submit").disableSubmit()
            }
        }
    })
})