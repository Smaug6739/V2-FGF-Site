var users

$(document).ready(function() {
    
    $(document).on("click touchend", ".del-user-btn", function(e) {
        e.stopPropagation()
        if(e.type == "touchend") {
            $(this).off("click")
        }
        
        let id = $(this).attr("data-id")
        let pseudo = $(this).attr("data-pseudo")
        
        if(confirm("Supprimer l'utilisateur "+pseudo+" ?")) {
            deleteUser(id)
        }
    })
    
    users = $("#users").DataTable({
        paging:false,
        searching:false,
        sorting:false,
        info:false,
        language: {
            emptyTable:"Aucun utilisateur inscrit"
        },
        ajax: {
            url: '../models/admin.php',
            type: 'POST',
            dataSrc: 'data',
            data: {
                a:"getUsers"
            }
        },
        columns: [
            {
                title:"Pseudo",
                data:"pseudo"
            },
            {
                title:"Mail",
                data:"mail"
            },
            {
                title:"Discord ID",
                data:"discord"
            },
            {
                title:"Date d'inscription",
                data:"date"
            },
            {
                title:"Actions",
                data:"id",
                createdCell: function (td, cellData, rowData, row, col) {
                    let aff = ''
                    
                    aff += "<button id='del_btn_"+cellData+"' data-pseudo='"+rowData.pseudo+"' data-id='"+cellData+"' class='btn btn-danger del-user-btn'>Supprimer</button>";
                    
                    $(td).html(aff)
                    
                }
            }
        ]
    })
})

function deleteUser(id) {
    $.post("../models/admin.php", {
        a:"deleteUser",
        id:id
    }, function(data) {
        if(data) {
            users.ajax.reload()
            admins.ajax.reload()
        }
    }, "json")
}
