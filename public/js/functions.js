/*
 *  ======================= SUBMIT PLUGINS =======================
 */

(function($) {
    $.fn.disableSubmit = function() {
        
        $(this).prop("disabled", true)
        $(this).hover().css("cursor", "not-allowed")
        
    }
})(jQuery);

(function($) {
    $.fn.enableSubmit = function() {
        
        $(this).prop("disabled", false)
        $(this).hover().css("cursor", "pointer")
        
    }
})(jQuery);

/*
 *  ==============================================================
 */

/*
 *  ======================= FORM PLUGINS =======================
 */

(function($) {
    $.fn.validatePseudo = function() {
        let regex = /^[a-zA-Z0-9 !@#~$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/
        
        if($(this).val().match(regex) && $(this).val().length > 2) {
            return true
        }
        return false
    }
})(jQuery);

(function($) {
    $.fn.validateEmail = function() {
        let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
        
        if($(this).val().match(regex) && $(this).val().length > 3) {
            return true
        }
        return false
    }
})(jQuery);

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