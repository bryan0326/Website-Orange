<!DOCTYPE HTML>
<!--
    Ion by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">

<head>
    <title>早安美吱城_管理者</title>
    <link rel="icon" type="image/png" href="images/orange.png">
    
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-xlarge.css">
    </noscript>
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
            /* 负值表示往上移动 */
            width: 0;
            height: 2px;
            background-color: #ced0d1;
            transition: width 0.3s ease-out, left 0.3s ease-out;
            /* 添加 left 的过渡效果 */
            transform-origin: center;
            /* 设置变换的原点为中心 */
        }

        #header nav>ul>li a.up:hover::after {
            width: 100%;
            /* 鼠标悬停时擴散直线的寬度 */
            left: 0;
            /* 鼠标悬停时调整 left 为 0，使线条从中心向两边扩展 */
        }

        #header nav>ul>li a.up:hover {
            color: #629DD1;
        }

        /*統計人數樣式*/
        #header nav>ul>li .count:hover::after {
            width: 0;
        }

        #header nav>ul>li .count:hover {
            color: #555f66;
        }

        /*Login樣式*/
        #header nav>ul>li a.button:hover::after {
            width: 0;
        }

        .user-avatar {
            position: relative;
            display: inline-block;
        }

        .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: -30px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .user-avatar:hover .dropdown {
            display: block;
        }


        #categorySearch {
            text-align: center;
        }

        #teacherSearch {
            text-align: center;
            margin-top: 23px;
        }

        /* 在 section 中应用样式 */
        #searchInput {
            background-color: #ffffff;
            padding: 20px;
            margin: 50px;
            width: 300px;
            /* 设置宽度 */
            height: 35px;
            /* 可以根据需要修改高度值 */
            border: 5px solid #c4f0cb;
            /* 设置边框为2px的实线，颜色为#333 */
            border-radius: 15px;
            /* 添加圆角，数值可以根据需要调整 */
            margin: auto;
            /* 使元素水平居中 */
            margin-left: 80px;
        }

        #search {
            background-color: #c9ecf7;
            border-radius: 15px;
            /* 添加圆角，数值可以根据需要调整 */
            margin: auto;
            /* 使元素水平居中 */
            width: 60px;
            /* 设置宽度 */
            height: 45px;
            /* 可以根据需要修改高度值 */
            font-size: 16px;
            border: 5px;
        }

        #search:hover {
            color: #629DD1;
        }

        header.major {
            margin-top: -50px;
            /* 负的上边距值，可以根据需要调整 */
        }

        .coursecontainer {
            background-color: #ccc;
            /* 背景颜色 */
            padding: 15px;
            /* 在内容和边框之间添加 20px 的内边距，你可以根据需要调整这个值 */
            border-radius: 8px;
            /* 圆弧形边框 */
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
            /* 灰色背景 */
            color: #fff;
            /* 文字白色 */
            border-radius: 15px;
            /* 圆弧形边框 */
            position: relative;
            /* 使子元素相对于父元素进行定位 */
        }

        .coursecontainer>div>div p strong {
            color: #ffad33;
            /* 文字颜色，亮橙色 */
        }

        .coursecontainer>div>div .pfont {
            font-size: 18px;
            /* 請根據需要調整字體大小的像素值 */
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

        /* 新增樣式 */
        .coursecontainer>div>div .additional-style {
            color: red;
            font-weight: bold;
        }

        /* 新增樣式 - Learn More 按鈕 */
        .coursecontainer>div>div .show-full-content,
        .coursecontainer>div>div .show-partial-content {
            background-color: #c7a4ff;
            /* Learn More 按钮背景颜色，亮橙色 */
            color: #555;
            /* Learn More 按钮文字颜色 */
            padding: 8px 16px;
            /* Learn More 按钮内边距 */
            border: 2px solid #555;
            /* Learn More 按钮边框 */
            border-radius: 5px;
            /* Learn More 按钮圆角边框 */
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            position: absolute;
            /* Learn More 按钮绝对定位 */
            bottom: 15px;
            /* Learn More 按钮距离底部 15px */
            left: 18px;
            /* Learn More 按钮距离左侧 18px */
        }

        .coursecontainer>div>div .show-full-content:hover,
        .coursecontainer>div>div .show-partial-content:hover {
            background-color: #9c7cf2;
            /* 鼠标悬停时的背景颜色 */
            color: #ffffff;
            /* 鼠标悬停时的文字颜色 */
        }

        .coursecontainer>div>div .show-full-content:hover,
        .coursecontainer>div>div .show-partial-content:hover {
            background-color: #555;
            /* 鼠标悬停时的背景颜色 */
            color: #fff;
            /* 鼠标悬停时的文字颜色 */
        }
    </style>
</head>

<body id="top">
    <!--preloader-->
    <div id="preloader">
        <img src="images/orange.png" alt="Loading..." class="spinner">
        <img src="images/loading.gif" class="loadinggif">
    </div>

    <!-- Header -->
    <header id="header" class="skel-layers-fixed">
        <h1><a href="MANindex.php" class="up">早安美吱澄</a></h1>
        <nav id="nav">
            <ul>
                <li><a href="MANindex.php" class="up">首頁</a></li>
                <li><a href="MANcourse.php" class="up">課程評價</a></li>
                <!--<li><a href="right-sidebar.html" class="up">待思考</a></li>-->
                <li><a href="MANfeedback_front.php" class="up">意見回饋</a></li>
                <li class="user-avatar">
                    <a href="manage.php"><img src="images/manage.png" alt="User Avatar"
                            style="width: 40px; height: 40px;"></a>
                    <ul class="dropdown">
                        <li><a href="login_front.php">Log out</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </header>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <!--<h2> 首頁
        </h2>-->
            <h2> 歡迎管理者登入
            </h2>
            <p>恭喜您成功登入早安美吱澄</p>
            <!--<p>A free responsive template by <a href="http://templated.co">TEMPLATED</a></p>-->
            <ul class="actions">
                <!--<li><a href="#content" class="button big special">上傳課程</a></li>-->
                <!--<li><a href="#elements" class="button big alt">Learn More</a></li>-->
            </ul>
        </div>
    </section>

    <!-- One -->
    <section id="one" class="wrapper style1">
        <header class="major">
            <h2>早 安 瑪 卡 巴 卡</h2>
            <p>以下為此網頁的管理者功能，在這裡你就是老大!</p>
        </header>
        <div class="container">
            <div class="row">
                <div class="4u">
                    <section class="special box">
                        <lord-icon
                            src="https://cdn.lordicon.com/xzalkbkz.json"
                            trigger="loop"
                            delay="2500"
                            style="width:160px;height:160px">
                        </lord-icon>
                        <h3>更改暱稱</h3>
                        <p>在登錄後可以使用更改暱稱功能，保證匿名的方式進行評價</p>
                    </section>

                </div>
                <div class="4u">
                    <section class="special box">
                        <lord-icon
                            src="https://cdn.lordicon.com/wzrwaorf.json"
                            trigger="loop"
                            delay="1500"
                            style="width:160px;height:160px">
                        </lord-icon>
                        <h3>評價課程</h3>
                        <p>可以在課程下面留言，或是想想你對這堂課的印象、課程涼度、老師好壞等在你心目中的分數，把它留在我們的評價系統上吧~</p>
                    </section>
                </div>
                <div class="4u">
                    <section class="special box">
                        <lord-icon
                            src="https://cdn.lordicon.com/unukghxb.json"
                            trigger="loop"
                            delay="2000"
                            style="width:160px;height:160px">
                        </lord-icon>
                        <h3>搜尋</h3>
                        <p>看到旁邊的資訊是否擔心你找不到你想找的課程? 沒關係，我們創造了一個搜尋系統，可以輸入關鍵字就可以找到你想找的課程囉~</p>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <!-- Two -->
    <section id="two" class="wrapper style2">
    <header class="major">
        <h2>意見回饋檢視表</h2>
        <p>閱讀前，請確認你的小小心臟是否能接受酸民抨擊</p>
    </header>
    <div style="margin-left: 100px;">
        <?php
        // 讀環境變數 (在 cPanel/本地 .env 設定)
        $supabaseUrl = getenv('SUPABASE_URL');
        $supabaseKey = getenv('SUPABASE_ANON_KEY');

        // 查詢 feedback 資料表
        $ch = curl_init("$supabaseUrl/rest/v1/feedback?select=*");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "apikey: $supabaseKey",
            "Authorization: Bearer $supabaseKey"
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        $feedbacks = json_decode($response, true);

        if (!empty($feedbacks)) {
            echo "<div style='display: flex; flex-wrap: wrap;'>";
            foreach ($feedbacks as $row) {
                echo "<div style='width: 30%; box-sizing: border-box; padding: 10px; margin: 5px; background-color: white; border: 1px solid #ccc; border-radius: 10px; height: auto;'>";
                echo "<div>";
                echo "<img src='images/orange.png' style='float: left; width: 40px; height: 40px; border-radius: 50%;'>";
                echo "<div style='margin-left: 80px; margin-top: 5px; font-size: 16px; color: black;'>匿名小橘子</div><br>";
                echo "</div>";

                echo "<p style='color: black; margin-bottom: 5px;'><strong>評價:</strong></p>";
                $rating = intval($row['rating']);
                echo "<img src='images/{$rating}_star.png' width='230' height='50'>";
                echo "<p style='color: black;'><strong>建議:</strong><br> " . htmlspecialchars($row['message']) . "</p>";
                echo "<p style='margin-bottom: 5px; color: black;'><strong> 更新時間:</strong> " . $row['created_at'] . "</p>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "0 筆結果";
        }
        ?>
    </div>
</section>

<!-- Three -->
<section id="three" class="wrapper style1">
    <header class="major">
        <h2>刪除課程評論</h2>
        <p>刪除前，請先確認是否真的要刪除，否則將一去不復返</p>
    </header>

    <form style="float: left; width: 50%;" method="GET">
        <div id="searchContainer">
            <div id="categorySearch">
                <h2 id="myForm">以課程名稱搜尋</h2>
                <input type="text" id="searchInput" name="course" placeholder="例: 通識選修">
                <button type="submit" name="search">搜 尋</button>
            </div>
        </div>
    </form>

    <form style="float: right; width: 50%;" method="GET">
        <div id="searchContainer">
            <div id="teacherSearch">
                <h2 id="myForm">以老師搜尋</h2>
                <input type="text" id="searchInput" name="teacher" placeholder="例: 許政穆">
                <button type="submit" name="search">搜 尋</button>
            </div>
        </div>
        <br>
    </form>

    <br><br>
    <header class="major">
        <h2>搜尋結果</h2>
    </header>
    <div class="coursecontainer">
        <div>
            <?php
            $query = "";
            if (isset($_GET['teacher']) && !empty($_GET['teacher'])) {
                $teacher = urlencode($_GET['teacher']);
                $query = "teacher=eq.$teacher";
            } elseif (isset($_GET['course']) && !empty($_GET['course'])) {
                $course = urlencode($_GET['course']);
                $query = "course_name=eq.$course";
            }

            if ($query) {
                $ch = curl_init("$supabaseUrl/rest/v1/evaluation?select=*&$query");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "apikey: $supabaseKey",
                    "Authorization: Bearer $supabaseKey"
                ]);
                $response = curl_exec($ch);
                curl_close($ch);

                $evaluations = json_decode($response, true);

                if (!empty($evaluations)) {
                    foreach ($evaluations as $row) {
                        echo '<div class="evaluation-block">';
                        echo "<p class='scroll'><strong>課程類別 :</strong> <span class='pfont'>" . htmlspecialchars($row['small_category']) . "</span></p>";
                        echo "<p><strong>課程名稱 :</strong> <span class='pfont'>" . htmlspecialchars($row['course_name']) . "</span></p>";
                        echo "<p><strong>老師 :</strong> <span class='pfont'>" . htmlspecialchars($row['teacher']) . "</span></p>";

                        echo '<div class="full-content" style="display: none;">';
                        echo "<p><strong>Thoughts:</strong> " . htmlspecialchars($row['thoughts']) . "</p>";

                        // 評分區塊 (動態顯示星星)
                        $fields = [
                            "all_evaluation" => "整體評價",
                            "credit_sweet"   => "給分甜度",
                            "learning"       => "含金量",
                            "evilking_level" => "老師78程度"
                        ];
                        foreach ($fields as $field => $label) {
                            $stars = intval($row[$field]);
                            echo "<p><strong>$label:</strong></p>";
                            echo "<img src='images/{$stars}_star.png'>";
                        }
                        echo '</div>';

                        echo '<button class="show-full-content">learn more</button>';
                        echo '<button class="show-partial-content" style="display: none;">Show less</button>';

                        // 刪除按鈕 (打 Supabase DELETE API)
                        echo '<form method="post" action="delete_evaluation.php">';
                        echo '<input type="hidden" name="evaluation_id" value="' . $row['evaluation_id'] . '">';
                        echo '<button type="submit" class="delete-button">刪除</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo "No results found.";
                }
            }
            echo '<script>window.location.hash = "myForm";</script>';
            ?>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
            <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <ul class="copyright">
            <li>© Copyright by 第14組</li>
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
            // 延遲 2 秒 (2000 毫秒)
            setTimeout(function () {
                // 延遲後隱藏 preloader
                var preloader = document.getElementById("preloader");
                preloader.style.display = "none";
            }, 2000);
        });


    </script>
</body>


</html>
