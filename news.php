<?php
    include "header.php";
    include "navbar.php";
    include "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="wnews_idth=device-wnews_idth, initial-scale=1.0">
    <style> 
     	
    body, html {
    height: 100%;
    background-color: white;
    background-size: cover;
}

.flex-container {
    display: -webkit-flex;
    display: flex;
    wnews_idth: auto;
    height: auto;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
}

.flex-item {
    -webkit-flex-direction: column;
    flex-direction: column;
    flex: 1 1 550px;
    background-color: #EEEEEE;
    wnews_idth: auto;
    height: auto;
    max-height: 65vh;
    margin: 10px;
    overflow-y: auto;
    box-shadow: 2px 3px 8px #888888;
    border-radius: 4px;
}

.flex-container-news_title {
    display: -webkit-flex;
    display: flex;
    wnews_idth: auto;
    height: auto;
    background-color: #1E90FF;
}

.flex-container-body {
    display: -webkit-flex;
    display: flex;
    background-color: #EEEEEE;
}

h1[news_id="news_title"] {
    margin-left: 20px;
    font-family: Roboto-Thin;
    color: #FAFAFA;
}

p[news_id="date"] {
    font-size: 20px;
    color: #FAFAFA;
    margin-left: 20px;
    font-family: Roboto-Regular;
}

p[news_id="news_body"] {
    font-size: 24px;
    margin-left: 20px;
    font-family: Roboto-Regular;
-}

 </style>
</head>

<body>
    <div class="flex-container">
        <?php
            $sql0 = "SELECT news_id, news_title, news_publish_date FROM iiitv_bank_news ORDER BY news_publish_date DESC";
            $result = $conn->query($sql0);

            if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                $news_id = $row["news_id"];
                $sql1 = "SELECT news_body_text FROM iiitv_bank_news_body WHERE news_id=$news_id";
                $result1 = $conn->query($sql1); ?>

                <div class="flex-item">
                    <div class="flex-container-news_title">
                        <h1 news_id="news_title"><?php echo $row["news_title"] . "<br>"; ?></h1>
                    </div>
                    <div class="flex-container-news_title">
                        <p news_id="date"><?php echo "Date : " .
                            date("d/m/Y", strtotime($row["news_publish_date"])); ?></p>
                    </div>
                    <div class="flex-container-body">
                        <p news_id="news_body"><?php while($row1 = $result1->fetch_assoc()) {
                            echo $row1["news_body_text"]; } ?></p>
                    </div>
                </div>

            <?php }
            } else {
                echo "No news available ! Please post some.";
            }
            $conn->close();
        ?>
    </div>

</body>
</html>
