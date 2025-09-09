<?php
    session_start(); // 確保 session 已啟動
                    
    $supabaseUrl = getenv('SUPABASE_URL');
    $supabaseKey = getenv('SUPABASE_ANON_KEY');
                    
     // Helper function: 用 REST API 查詢表格資料數量
    function getTableCount($table) {
        global $supabaseUrl, $supabaseKey;
                    
        $url = $supabaseUrl . "/rest/v1/$table?select=id";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_HTTPHEADER, [
             "apikey: $supabaseKey",
              "Authorization: Bearer $supabaseKey",
               "Content-Type: application/json"
         ]);
          $result = curl_exec($ch);
        curl_close($ch);
                    
        if ($result) {
             $data = json_decode($result, true);
             return count($data); // 回傳資料筆數
        } else {
            return 0; // 若失敗則回傳 0
        }
    }
                    
    // 取得使用者數量與課程評價數量
    $userCount = getTableCount('users');
    $evaluationCount = getTableCount('evaluation');
?>
<!DOCTYPE HTML>
<!--
    Ion by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>

<head>
    <title>首頁</title>
    <link rel="icon" type="image/png" href="images/orange.png">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-xlarge.css">
    </noscript>

</head>

<body id="top">
    <!--preloader-->
    <div id="preloader">
        <img src="images/orange.png" alt="Loading..." class="spinner">
        <img src="images/loading.gif" class="loadinggif">
    </div>

    <!-- Header -->
    <header id="header" class="skel-layers-fixed">
        <h1><a href="index.php">早安美吱澄</a></h1>
        <nav id="nav">
            <ul>
                
                    
                <li><a>用戶人數: <?php echo $userCount; ?></a></li>
                <li><a>課程評價: <?php echo $evaluationCount; ?></a></li>
                    
                <li><a href="index.php" class="up">首頁</a></li>
                <li><a href="course.php" class="up">課程評價</a></li>
                <li><a href="feedback_front.php" class="up">意見回饋</a></li>
                    
                <?php
                    // 登入判斷
                    if (isset($_SESSION["login_session"]) && $_SESSION["login_session"] === true) {
                        echo '<li><a href="users.php"><img src="images/orange.png" alt="User Avatar" style="width: 40px; height: 40px;"></a></li>';
                    } else {
                        echo '<li><a href="login_front.php" class="button special">Login</a></li>';
                    }
                ?>

            </ul>
        </nav>
        <style>
            #preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: #fff;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                z-index: 1000;
            }

            .spinner {
                width: 80px;
                height: 80px;
                animation: bounce 1s ease-in-out infinite;
            }

            @keyframes bounce {

                0%,
                20%,
                50%,
                80%,
                100% {
                    transform: translateY(10px);
                }

                40% {
                    transform: translateY(-30px);
                    /* 調整彈跳的高度，以符合您的需求 */
                }

                60% {
                    transform: translateY(-15px);
                    /* 調整彈跳的高度，以符合您的需求 */
                }
            }


            .loadinggif {
                margin-right: 10px;
                /* 調整圖片之間的距離，可根據需要調整 */
                width: 180px;
                /* 調整 GIF 寬度 */
                height: 100px;
                /* 調整 GIF 高度 */
            }



            #header nav>ul>li a.up {
                position: relative;
            }

            #header nav>ul>li a.up::after {
                content: '';
                position: absolute;
                left: 50%;
                bottom: 5px;
                width: 0;
                height: 2px;
                background-color: #ced0d1;
                transition: width 0.3s ease-out, left 0.3s ease-out;
                transform-origin: center;
            }

            #header nav>ul>li a.up:hover::after {
                width: 100%;
                left: 0;
            }

            #header nav>ul>li a.up:hover {
                color: #629DD1;
            }

            /* 統計人數 */
            #header nav>ul>li .count:hover::after {
                width: 0;
            }

            #header nav>ul>li .count:hover {
                color: #555f66;
            }

            /* Login */
            #header nav>ul>li a.button:hover::after {
                width: 0;
            }

            #searchInput {
                background-color: #ffffff;
                padding: 20px;
                margin: 50px;
                width: 300px;
                height: 35px;
                border: 5px solid #c4f0cb;
                border-radius: 15px;
                margin: auto;
                margin-left: 200px;
            }

            #search {
                background-color: #c9ecf7;
                border-radius: 15px;
                margin: auto;
                width: 60px;
                height: 45px;
                font-size: 16px;
                border: 5px;
            }

            #search:hover {
                color: #629DD1;
            }

            #class {
                list-style-type: none;
                padding: 0;
                margin: 0;
                margin-left: 25px;
            }

            header.major {
                margin-top: -50px;
            }

            .coursecontainer {
                background-color: #ccc;
                padding: 15px;
                border-radius: 8px;
            }

            /* PHP Evaluation Block Styles */
            .coursecontainer>div>div {
                width: 390px;
                height: 260px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                padding: 20px;
                margin-bottom: 20px;
                display: inline-block;
                vertical-align: top;
                background-color: #666;
                color: #fff;
                border-radius: 15px;
                position: relative;
            }

            .coursecontainer>div>div p strong {
                color: #ffad33;
            }

            .coursecontainer>div>div .pfont {
                font-size: 18px;
            }

            .coursecontainer>div>div:last-child {
                margin-right: 0;
            }

            /* PHP Evaluation Content Styles */
            .coursecontainer>div>div p {
                margin: 5px 0;
            }

            /* PHP Evaluation Star Rating Styles */
            .coursecontainer>div>div img {
                width: 200px;
                height: 50px;
                margin-right: 5px;
            }

            .coursecontainer>div>div .additional-style {
                color: red;
                font-weight: bold;
            }

            /*  Learn More 按鈕 */
            .coursecontainer>div>div .show-full-content,
            .coursecontainer>div>div .show-partial-content {
                background-color: #c7a4ff;
                color: #555;
                padding: 8px 16px;
                border: 2px solid #555;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s, color 0.3s;
                position: absolute;
                bottom: 15px;
                left: 18px;
            }

            .coursecontainer>div>div .show-full-content:hover,
            .coursecontainer>div>div .show-partial-content:hover {
                background-color: #9c7cf2;
                color: #ffffff;
            }

            .coursecontainer>div>div .show-full-content:hover,
            .coursecontainer>div>div .show-partial-content:hover {
                background-color: #555;
                color: #fff;
            }
        </style>
    </header>
    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h2>國立嘉義大學課程評價系統</h2>
            <p style="font-size: 30px">NCYU<a href=""></a></p>
            <ul class="actions">
                <li><a href="login_front.php" class="button big special">Sign Up</a></li>
                <!--<li><a href="#elements" class="button big alt">Learn More</a></li>-->
            </ul>
        </div>
    </section>

    <!-- Main -->
    <section id="main" class="wrapper style1">
        <h1 style="text-align: center; font-size: 42px;">歡迎使用嘉義大學課程評價系統!</h1>
        <p></p>
        <div class="container_course">
            <div>
                <!--這邊是課程評價結果-->
                <?php
                    
                    // Helper: 發送 GET 請求到 Supabase
                    function supabaseGet($endpoint, $apikey) {
                        $ch = curl_init($endpoint);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                            "apikey: $apikey",
                            "Authorization: Bearer $apikey",
                            "Content-Type: application/json"
                        ]);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        return json_decode($response, true);
                    }
                    
                    // 取得隨機 5 筆課程評價
                    $evaluations = supabaseGet("$supabaseUrl/rest/v1/evaluation?select=*&limit=5&order=random()", $supabaseKey);
                    
                    if (is_array($evaluations) && count($evaluations) > 0) {
                        foreach ($evaluations as $row) {
                            echo '<div class="evaluation-block" >';
                            echo "<p class='scroll'><strong>課程類別 :</strong> <span class='pfont'>" . htmlspecialchars($row['small_category']) . "</p>";
                            echo "<p><strong>課程名稱 :</strong> <span class='pfont'>" . htmlspecialchars($row['course_name']) . "</span></p>";
                            echo "<p><strong>老師 :</strong> <span class='pfont'>" . htmlspecialchars($row['teacher']) . "</span></p>";
                    
                            echo '<div class="full-content" style="display: none;">';
                            echo "<p><strong>Thoughts:</strong> " . htmlspecialchars($row['thoughts']) . "</p>";
                    
                            // 星星顯示函數
                            function displayStars($value) {
                                for ($i = 0; $i < $value; $i++) {
                                    echo "<img src='images/five_star.png'>";
                                }
                            }
                    
                            echo "<p><strong>整體評價:</strong> </p>";
                            displayStars($row['all_evaluation']);
                    
                            echo "<p><strong>給分甜度:</strong> </p>";
                            displayStars($row['credit_sweet']);
                    
                            echo "<p><strong>含金量:</strong> </p>";
                            displayStars($row['learning']);
                    
                            echo "<p><strong>老師78程度:</strong> </p>";
                            displayStars($row['evilking_level']);
                    
                            echo '</div>';
                            echo '<button class="show-full-content">learn more</button>';
                            echo '<button class="show-partial-content" style="display: none;">Show less</button>';
                            echo '</div>';
                        }
                    } else {
                        echo "0 筆結果";
                    }
                    ?>
                    
                    <div class="container">
                        <div class="row">
                            <div class="4u">
                                <section>
                                    <h3>課程分類</h3>
                                    <ul class="alt">
                                        <li><a href="#">通識教育必修</a>
                                            <ul id="class">
                                                <li><a href="#">國文</a></li>
                                                <li><a href="#">英文</a></li>
                                                <li><a href="#">體育</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">通識選修</a></li>
                                        <li><a href="#">專業必修</a></li>
                                        <li><a href="#">專業選修</a></li>
                                        <li><a href="#">共同選修</a></li>
                                        <li><a href="#">網路通識</a></li>
                                    </ul>
                                </section>
                                <hr>
                            </div>
                            <div class="8u skel-cell-important">
                                <form method="GET">
                                    <section>
                                        <h2 style="text-align: center; margin-top: 80px">以課程名稱搜尋</h2>
                                        <input type="text" id="searchInput" name="course" placeholder="例: 網際網路服務">
                                        <button type="submit" id="search">搜尋</button>
                                    </section>
                                </form>
                                <form method="GET">
                                    <section>
                                        <br>
                                        <h2 style="text-align: center; margin-top: 20px">以老師搜尋</h2>
                                        <input type="text" id="searchInput" name="teacher" placeholder="例: 許政穆">
                                        <button type="submit" id="search">搜尋</button>
                                        <p></p>
                                        <p></p>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <section id="main" class="wrapper style1">
                        <h1 style="text-align: center; font-size: 42px;">查詢結果</h1>
                        <div class='coursecontainer'>
                            <div>
                    <?php
                    // 搜尋功能
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        if (!empty($_GET['teacher'])) {
                            $teacher = urlencode($_GET['teacher']);
                            $searchResults = supabaseGet("$supabaseUrl/rest/v1/evaluation?teacher=eq.$teacher", $supabaseKey);
                        } elseif (!empty($_GET['course'])) {
                            $course = urlencode($_GET['course']);
                            $searchResults = supabaseGet("$supabaseUrl/rest/v1/evaluation?course_name=eq.$course", $supabaseKey);
                        }
                    
                        if (isset($searchResults) && is_array($searchResults) && count($searchResults) > 0) {
                            foreach ($searchResults as $row) {
                                echo '<div class="evaluation-block" >';
                                echo "<p class='scroll'><strong>課程類別 :</strong> <span class='pfont'>" . htmlspecialchars($row['small_category']) . "</p>";
                                echo "<p><strong>課程名稱 :</strong> <span class='pfont'>" . htmlspecialchars($row['course_name']) . "</span></p>";
                                echo "<p><strong>老師 :</strong> <span class='pfont'>" . htmlspecialchars($row['teacher']) . "</span></p>";
                    
                                echo '<div class="full-content" style="display: none;">';
                                echo "<p><strong>Thoughts:</strong> " . htmlspecialchars($row['thoughts']) . "</p>";
                    
                                echo "<p><strong>整體評價:</strong> </p>";
                                displayStars($row['all_evaluation']);
                    
                                echo "<p><strong>給分甜度:</strong> </p>";
                                displayStars($row['credit_sweet']);
                    
                                echo "<p><strong>含金量:</strong> </p>";
                                displayStars($row['learning']);
                    
                                echo "<p><strong>老師78程度:</strong> </p>";
                                displayStars($row['evilking_level']);
                    
                                echo '</div>';
                                echo '<button class="show-full-content">learn more</button>';
                                echo '<button class="show-partial-content" style="display: none;">Show less</button>';
                                echo '</div>';
                            }
                        } else {
                            echo "No results found.";
                        }
                    }
                    ?>
                </div>
            </div>
        </section>



    <!-- Footer -->
    <!--leaf change-->
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
            <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <ul class="copyright">
            <li>©Copyright by 第14組</li>
        </ul>
    </footer>

    <!---寫顯示完整內容的按鈕--->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var showButtons = document.querySelectorAll(".show-full-content, .show-partial-content");

            showButtons.forEach(function (button) {
                button.addEventListener("click", function () {
                    var evaluationBlock = button.closest(".evaluation-block");
                    var fullContent = evaluationBlock.querySelector(".full-content");

                    if (fullContent && button.classList.contains("show-full-content")) {
                        // 在顯示完整內容之前儲存原始高度
                        var originalHeight = evaluationBlock.offsetHeight;
                        fullContent.style.display = "block";
                        button.style.display = "none";
                        evaluationBlock.querySelector(".show-partial-content").style.display = "inline-block";

                        // 計算並調整 div 高度以容納完整內容
                        var newHeight = originalHeight + fullContent.offsetHeight;
                        evaluationBlock.style.height = newHeight + "px";

                        // 滑動到該筆資料的 div 最上層，停在頂部一點
                        smoothScrollTo(evaluationBlock.offsetTop - 40, 300); // offsetTop可以調整上滑距離  調整後面數字以控制往上滑的時間
                    } else if (button.classList.contains("show-partial-content")) {
                        // 隱藏完整內容並顯示「繼續閱讀」按鈕
                        fullContent.style.display = "none";
                        button.style.display = "none";
                        evaluationBlock.querySelector(".show-full-content").style.display = "inline-block";

                        // 恢復原始 div 高度
                        evaluationBlock.style.height = "260px"; // 這裡替換為原本的高度，您需要使用原本的高度值

                        // 平滑捲動回到 div 的頂端
                        smoothScrollTo(evaluationBlock.offsetTop - 40, 300);
                    }
                });
            });

            function smoothScrollTo(targetPosition, duration) {
                var startPosition = window.scrollY || window.pageYOffset,
                    distance = targetPosition - startPosition,
                    startTime = null;

                function animation(currentTime) {
                    if (startTime === null) startTime = currentTime;
                    var timeElapsed = currentTime - startTime;
                    var progress = Math.min(timeElapsed / duration, 1);
                    var ease = easeInOutQuad(progress);

                    window.scrollTo(0, startPosition + distance * ease);

                    if (timeElapsed < duration) {
                        requestAnimationFrame(animation);
                    }
                }

                function easeInOutQuad(t) {
                    return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
                }

                requestAnimationFrame(animation);
            }
        });

    </script>
    <!--preloader-->
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            // 延遲 1 秒 (1000 毫秒)
            setTimeout(function () {
                // 延遲後隱藏 preloader
                var preloader = document.getElementById("preloader");
                preloader.style.display = "none";
            }, 1000);
        });

    </script>

</body>


</html>




