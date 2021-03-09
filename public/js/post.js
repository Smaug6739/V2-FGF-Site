$(document).ready(function() {
    $("#se_cat").select2()
    
    $(document).on("click touchend", "#editControls a", function(e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        $(this).off("click")
        $(this).off("touchend")
        
        if($(this).data('role') !== "undo" && $(this).data('role') !== "redo") {
            $(this).toggleClass("btn-secondary")
            $(this).toggleClass("btn-primary")
        }
        
        
        switch($(this).data('role')) {
            case 'h1':
            case 'h2':
            case 'p':
                document.execCommand('formatBlock', false, $(this).data('role'));
                break;
            default:
                document.execCommand($(this).data('role'), false, null);
                break;
        }
    });

    $(document).on("click touchend", "#editControls_2 a", function(e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        $(this).off("click")
        $(this).off("touchend")

        if($(this).data('role') !== "undo" && $(this).data('role') !== "redo") {
            $(this).toggleClass("btn-secondary")
            $(this).toggleClass("btn-primary")
        }


        switch($(this).data('role')) {
            case 'h1':
            case 'h2':
            case 'p':
                document.execCommand('formatBlock', false, $(this).data('role'));
                break;
            default:
                document.execCommand($(this).data('role'), false, null);
                break;
        }
    });
    
    $(document).on("click touchend", "#btn_submit", function(e) {
        $(this).off("click")
        $(this).off("touchend")
        
        $("#ta_article").val($("#editor").html())
        $("#ta_article2").val($("#editor2").html())
    })
    
    $("#btn_submit").disableSubmit()
    
    let title = false
    let article = false
    
    $(document).on("keyup", "#in_title", function(e) {
        if($(this).val().length > 3) {
            
            title = true
            
            if(title) {
                $("#btn_submit").enableSubmit()
            }
        } else {
            title = false
            $("#btn_submit").disableSubmit()
        }
    })
    
    /*$(document).on("keyup", "#ta_article", function(e) {
        if($(this).val().length > 3) {
            
            article = true
            
            if(title && article) {
                $("#btn_submit").enableSubmit()
            }
        } else {
            article = false
            $("#btn_submit").disableSubmit()
        }
    })*/
})

function upload_image() 
{
    var bar = $('#bar');
    var percent = $('#percent');
    
    $('#create_form').ajaxForm({
        
        beforeSubmit: function() {
            document.getElementById("progress_div").style.display="block";
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },

        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },

        success: function() {
            var percentVal = '100%';
            bar.width(percentVal)
            percent.html(percentVal);
        },

        complete: function(xhr) {
            if(xhr.responseText) {
                document.getElementById("output_image").innerHTML=xhr.responseText;
            }
        }
    }); 
}
