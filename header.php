<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url("fonts.css");

body {
    margin: 0;
    padding: 0;
    background-color:  white;
}

.flex-container-header {
    display: -webkit-flex;
    display: flex;
    width: auto;
    height: auto;
    background-color: white;
}

.flex-item-header {
    width: auto;
    height: 100px;
    margin: 10px;
    color: #0066ff;
}

h1 {
    font-family: OpenSans-Light;
    color: #263238;
    font-size: 3rem;
    line-height: 3rem;
    margin-top: calc((1.5rem - 2rem) + 2.5rem);
    margin-bottom: 1.5rem;
}

@media screen and (max-width: 855px) {
  h1 {
      font-size: 2.5rem;
      line-height: 2.5rem;
      margin-top: calc((1.5rem - 2rem) + 2rem);
      margin-bottom: 1.5rem;
  }
}

@media screen and (max-width: 510px) {
  h1 {
      font-size: 2rem;
      line-height: 2rem;
      margin-top: calc((1.5rem - 2rem) + 1.5rem);
      margin-bottom: 1.5rem;
  }
}

    </style>
</head>

<body>
    <div class="flex-container-header">
        <div class="flex-item-header">
            <img src="images/banklogo.png" onclick="eEgg_func()" width="100" height="100">
        </div>
        <div class="flex-item-header">
            <h1 style="color:#1E3D58; ">IIIT-V BANK</h1>
        </div>
    </div>

</body>
</html>
