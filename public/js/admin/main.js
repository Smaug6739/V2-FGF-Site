$(document).ready(function() {
    var url = window.location.href
    var pageArray = url.split("/")
    var page = pageArray[pageArray.length - 1]
    
    $(".nav-item").removeClass("active")
    
    switch(page) {
        case "admin":
        case "index.php":
            $("li.home").addClass("active")
            break;
        case "demandes.php":
            $("li.ask").addClass("active")
            break;
        case "articles.php":
            $("li.post").addClass("active")
            break;
        case "users.php":
            $("li.users").addClass("active")
            break;
        case "admins.php":
            $("li.admins").addClass("active")
            break;
        case "partenariat.php":
            $("li.part").addClass("active")
            break;
        case "staff.php":
            $("li.staff").addClass("active")
            break;
        case "annonces.php":
            $("li.annon").addClass("active")
            break;
    }
})


