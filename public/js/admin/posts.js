var pending_posts
var achieved_posts

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
        
        if(confirm("Supprimer l'article de "+pseudo+" ?")) {
            deletePost(id)
        }
    })
    
    /*pending_posts = $("#pending-posts").DataTable({
        paging:false,
        searching:false,
        sorting:false,
        info:false,
        language: {
            emptyTable:"Aucun article en attente"
        },
        ajax: {
            url: '../models/admin.php',
            type: 'POST',
            dataSrc: 'data',
            contentType: 'text/plain',
            data: {
                a:"getPendingPosts"
            }
        },
        columns: [
            {
                title:"Utilisateurs",
                data:"user"
            },
            {
                title:"Catégorie",
                data:"category"
            },
            {
                title:"Titre",
                data:"title"
            },
            {
                title:"Contenu",
                data:"content"
            },
            {
                title:"Date",
                data:"date"
            },
            {
                title:"Actions",
                data:"id",
                createdCell: function (td, cellData, rowData, row, col) {
                    let aff = ''
                    
                    aff += "<button id='treatment_btn_"+cellData+"' data-id='"+cellData+"' class='btn btn-success treatment-btn'>Traiter</button>";
                    aff += "<button id='del_btn_"+cellData+"' data-pseudo='"+rowData.user+"' data-id='"+cellData+"' class='btn btn-danger del-btn'>Supprimer</button>";
                    
                    $(td).html(aff)
                    
                }
            }
        ]
    })
    
    achieved_posts = $("#achieved-posts").DataTable({
        paging:false,
        searching:false,
        sorting:true,
        info:false,
        language: {
            emptyTable:"Aucun article traités"
        },
        ajax: {
            url: '../models/admin.php',
            type: 'POST',
            dataSrc: 'data',
            data: {
                a:"getAchievedPosts"
            }
        },
        columns: [
            {
                title:"Utilisateurs",
                data:"user"
            },
            {
                title:"Catégorie",
                data:"category"
            },
            {
                title:"Titre",
                data:"title"
            },
            {
                title:"Contenu",
                data:"content"
            },
            {
                title:"Date",
                data:"date"
            },
            {
                title:"Actions",
                data:"id",
                createdCell: function (td, cellData, rowData, row, col) {
                    let aff = ''
                    
                    aff += "<button id='del_btn_"+cellData+"' data-pseudo='"+rowData.user+"' data-id='"+cellData+"' class='btn btn-danger del-btn'>Supprimer</button>";
                    
                    $(td).html(aff)
                    
                }
            }
        ]
    })*/
})

function achieve(id) {
    $.post("../models/admin.php", {
        a:"achievePost",
        id:id
    }, function(data) {
        if(data) {
            pending_posts.ajax.reload()
            achieved_posts.ajax.reload()
        }
    }, "json")
}

function deletePost(id) {
    $.post("../models/admin.php", {
        a:"deletePost",
        id:id
    }, function(data) {
        if(data) {
            pending_posts.ajax.reload()
            achieved_posts.ajax.reload()
        }
    }, "json")
}


