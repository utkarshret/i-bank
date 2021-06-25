<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        @import url("fonts.css");

.nav-wrapper {
    height: 53px;
    background: #333;
}

/* Add a black background color to the top navigation */
.topnav {
    background-color: #263238;
    overflow: hidden;
    height: 53px;
}

/* Style the links inside the navigation bar */
.topnav a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    font-family: Roboto-Bold;
}

/* Change the color of links on hover */
.topnav a:hover {
    color: #0066ff;
    border-bottom: thick solid #0066ff;
}

/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
    display: none;
}


/* Used to make the navbar sticky */
.navbar-fixed {
    top: 0;
    left: 0;
    right: 0;
    z-index: 1;
    position: fixed;
}

/* When the screen is less than 855 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
@media screen and (max-width: 855px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
@media screen and (max-width: 855px) {
  .topnav.responsive {
      position: relative;
      height: auto;
  }

  .navbar-fixed.responsive {
      top: 0;
      z-index: 100;
      position: fixed;
      width: 99.15%;
  }

  .topnav.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }

  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

  .topnav.responsive a:hover {
    background-color: #EEEEEE;
    color: #212121;
    border-bottom: none;
  }
}

    </style>
    <script src="jquery-3.2.1.min.js"></script>
</head>

<body>
    <div class="nav-wrapper">
    <div class="topnav" id="theTopNav">
        <a href="./home.php">HOME</a>
        <a href="./news.php">NEWS</a>
        <a href="./contact.php">CONTACT</a>
        <a href="javascript:void(0);" class="icon" onclick="respFunc()">&#9776;</a>
    </div>
    </div>

<script>
function respFunc() {
    var x = document.getElementById("theTopNav");
    console.log(x);

    if (x.className === "topnav") {
        x.className += " responsive";
        return 0;
    }

    if (x.className === "topnav navbar-fixed") {
        x.className += " responsive";
        return 0;
    }

    if (x.className === "topnav responsive") {
        x.className = "topnav";
        return 0;
    }

    if (x.className === "topnav navbar-fixed responsive" || x.className === "topnav responsive navbar-fixed") {
        x.className = "topnav navbar-fixed";
        return 0;
    }
}

// Function below is jquery-3 function used for making the navbar sticky
$(document).ready(function() {
  $(window).scroll(function () {
    if ($(window).scrollTop() > 120) {
      $("#theTopNav").addClass('navbar-fixed');
    }
    if ($(window).scrollTop() < 121) {
      $("#theTopNav").removeClass('navbar-fixed');
  }
  });
});
</script>

</body>
</html>
