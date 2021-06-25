<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        
.sidenav {
    width: 256px;
    background-color: #1E3D58;
    height: 90vh;
    float: left;
    overflow-y: auto;
    box-shadow: 1px 1px 5px #888888;
}

.sidenav a {
    font-family: OpenSans-Regular;
    font-size: 19px;
    color: white;
    display: block;
    padding: 22px 16px;
    text-decoration: none;
}

.sidenav a:hover {
    background-color: #696969;
}

.sidenav a[id="label"] {
    font-family: OpenSans-Bold;
    font-size: 22px;
    color: #212121;
    display: block;
    padding: 11px;
    text-decoration: none;
   
}

.sidenav a[id="label"]:hover {
    background-color: transparent;
}

.sidenav a.active {
    background-color: #4f4f4f;
}

/* Sticky Sidebar */
.sidenav-fixed {
    height: auto;
    top: 53px;
    z-index: 100;
    bottom: 0;
    position: fixed;
}

.sidenav a[id="closebtn"] {
    display: none;
}

@media screen and (max-width: 855px) {
    .sidenav {
        height: 100vh;
        width: 0;
        margin-top: -53px;
        z-index: 100;
        top: 131px;
        background-color: #696969;
        overflow-x: hidden;
        transition: 0.5s;
        box-shadow: 3px 3px 20px #000000;
    }

    .sidenav a[id="closebtn"] {
        font-family: OpenSans-Regular;
        font-size: 19px;
        color: #212121;
        display: block;
        margin-left: 200px;
    }

    .sidenav.sidenav-fixed.responsive {
        top: 53px;
        z-index: 100;
    }
}

    </style>>
</head>

<body>
    <div class="sidenav" id="theSideNav">
        <a href="javascript:void(0)" id="closebtn" onclick="closeNav()">&times;</a>
        <a href="./admin_home.php">Home</a>
        <a href="./customer_add.php">Add Customer</a>
        <a href="./manage_customers.php">Manage Customers</a>
        <a href="./post_news.php">Post News</a>
    </div>

<script>
for (var i = 0; i < document.links.length; i++) {
    if (document.URL.indexOf('?') > 0) {
        sanitizedURL = document.URL.substring(0, document.URL.indexOf('?'));
    }
    else {
        sanitizedURL = document.URL;
    }
    if (document.links[i].href == sanitizedURL) {
        document.links[i].className = 'active';
    }
}

function openNav() {
    document.getElementById("theSideNav").style.width = "256px";
    var x = document.getElementById("theSideNav");
    if (x.className === "sidenav sidenav-fixed") {
        x.className += " responsive";
    }
}

// Never use get window size of jquery, in javascript, they dont work !
// lesson learnt !!!
function closeNav() {
    if (document.documentElement.clientWidth < 856) {
        document.getElementById("theSideNav").style.width = "0";
    }
}

$(document).ready(function() {
    $(window).resize(function () {
        if ($(window).width() > 855)
            document.getElementById("theSideNav").style.width = "256px";

        if (($(window).width()) < 856){
            $('#closebtn').trigger('click');
        }
    });
});

// Function below is jquery-3 function used for making the navbar sticky
$(document).ready(function() {
    $(window).scroll(function () {
        var x1 = document.getElementById("theSideNav").style.width;

        if ($(window).scrollTop() > 120) {
          $("#theSideNav").addClass('sidenav-fixed');

            if (($(window).width()) < 856 && x1 == "256px") {
                $('#hamburger').trigger('click');
            }
        }

        if ($(window).scrollTop() < 121) {
          $("#theSideNav").removeClass('sidenav-fixed');
        }
    });
});
</script>

</body>
</html>
