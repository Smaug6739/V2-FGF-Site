var admins

$(document).ready(function() {
    
    admins = $("#admins").DataTable({
        paging:false,
        searching:false,
        sorting:false,
        info:false,
        language: {
            emptyTable:"Aucun administrateurs inscrit"
        },
        ajax: {
            url: '../models/admin.php',
            type: 'POST',
            dataSrc: 'data',
            data: {
                a:"getAdmins"
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
                title:"Super Admin",
                data:"super"
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


