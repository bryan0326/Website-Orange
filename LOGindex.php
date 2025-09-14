<!DOCTYPE HTML>
<html>

<head>
    <title>首頁</title>
    <link rel="icon" type="image/png" href="images/orange.png">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
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
            }

            60% {
                transform: translateY(-15px);
            }
        }

        .loadinggif {
            margin-right: 10px;
            width: 180px;
            height: 100px;
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

        #header nav>ul>li .count:hover::after {
            width: 0;
        }

        #header nav>ul>li .count:hover {
            color: #555f66;
        }

        #header nav>ul>li a.button:hover::after {
            width: 0;
        }

        #header nav>ul>li a.button.special:hover {
            color: #629DD1;
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

        .container_course {
            background-color: #f2f2f2;
            width: 100%;
            padding: 40px 20px;
            border-radius: 0;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            box-sizing: border-box;
        }

        .evaluation-block {
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
            transition: height 0.3s ease-in-out;
        }

        .evaluation-block p strong {
            color: #ffad33;
        }

        .evaluation-block .pfont {
            font-size: 18px;
        }

        .evaluation-block:last-child {
            margin-right: 0;
        }

        .evaluation-block p {
            margin: 5px 0;
        }

        .evaluation-block img {
            width: 200px;
            height: 50px;
            margin-right: 5px;
        }

        .evaluation-block .additional-style {
            color: red;
            font-weight: bold;
        }

        .evaluation-block .show-full-content,
        .evaluation-block .show-partial-content {
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

        .evaluation-block .show-full-content:hover,
        .evaluation-block .show-partial-content:hover {
            background-color: #9c7cf2;
            color: #ffffff;
        }

        .evaluation-block .show-full-content:hover,
        .evaluation-block .show-partial-content:hover {
            background-color: #555;
            color: #fff;
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
    </style>
</head>

<body id="top">
    <div id="preloader">
        <img src="images/orange.png" alt="Loading..." class="spinner">
        <img src="images/loading.gif" class="loadinggif">
    </div>

    <header id="header" class="skel-layers-fixed">
        <h1><a href="LOGindex.php" class="up">早安美吱澄</a></h1>
        <nav id="nav">
            <ul>
                <li><a href="LOGindex.php" class="up">首頁</a></li>
                <li><a href="LOGcourse.php" class="up">課程評價</a></li>
                <li><a href="LOGfeedback_front.php" class="up">意見回饋</a></li>
                <li class="user-avatar">
                    <a href="users.php"><img src="images/manage.png" alt="User Avatar"
                            style="width: 40px; height: 40px;"></a>
                    <ul class="dropdown">
                        <li><a href="login_front.php">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <section id="banner">
        <div class="inner">
            <h2>國立嘉義大學課程評價系統</h2>
            <p style="font-size: 30px">NCYU<a href=""></a></p>
            </ul>
        </div>
    </section>

    <section id="main" class="wrapper style1">
        <h1 style="text-align: center; font-size: 42px;">歡迎使用嘉義大學課程評價系統!</h1>
        <div class="container_course">
            <?php
            // PHP 區塊處理課程評價資料
            $supabase_url = getenv('SUPABASE_URL');
            $supabase_anon_key = getenv('SUPABASE_ANON_KEY');

            if (!$supabase_url || !$supabase_anon_key) {
                die("Supabase API URL 或 Key 未設定。");
            }

            $ch = curl_init();
            $api_url = $supabase_url . '/rest/v1/evaluation?select=*';

            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'apikey: ' . $supabase_anon_key,
                'Authorization: Bearer ' . $supabase_anon_key,
                'Content-Type: application/json',
            ]);

            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                die('cURL 錯誤: ' . curl_error($ch));
            }
            curl_close($ch);

            $evaluations = json_decode($response, true);

            // 處理顯示
            if (is_array($evaluations) && count($evaluations) > 0) {
                // 在 PHP 端進行隨機排序
                shuffle($evaluations);
                // 只取前 5 筆資料
                $evaluations = array_slice($evaluations, 0, 5);

                // 評分星星圖片對應函數
                function showStars($value, $label)
                {
                    echo "<p><strong>$label:</strong> </p>";
                    if ($value >= 1 && $value <= 5) {
                        $stars = ["one", "two", "three", "four", "five"];
                        echo "<img src='images/" . $stars[$value - 1] . "_star.png'>";
                    }
                }

                foreach ($evaluations as $row) {
                    echo '<div class="evaluation-block">';
                    echo "<p class='scroll'><strong>課程類別 :</strong> <span class='pfont'>" . htmlspecialchars($row['small_category']) . "</span></p>";
                    echo "<p><strong>課程名稱 :</strong> <span class='pfont'>" . htmlspecialchars($row['course_name']) . "</span></p>";
                    echo "<p><strong>老師 :</strong> <span class='pfont'>" . htmlspecialchars($row['teacher']) . "</span></p>";
                    echo '<div class="full-content" style="display: none;">';
                    echo "<p><strong>Thoughts:</strong> " . htmlspecialchars($row['thoughts']) . "</p>";

                    showStars($row['all_evaluation'], "整體評價");
                    showStars($row['credit_sweet'], "給分甜度");
                    showStars($row['learning'], "含金量");
                    showStars($row['evilking_level'], "老師78程度");

                    echo '</div>';
                    echo '<button class="show-full-content">learn more</button>';
                    echo '<button class="show-partial-content" style="display: none;">Show less</button>';
                    echo '</div>';
                }
            } else {
                echo "沒有找到課程評價或資料庫連線有問題。";
            }
            ?>
        </div>
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
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="main" class="wrapper style1">
        <h1 style="text-align: center; font-size: 42px;">查詢結果</h1>
        <div class='container_course'>
            <div>
                <?php
                // 查詢區塊
                if ($_SERVER["REQUEST_METHOD"] == "GET" && (isset($_GET['teacher']) || isset($_GET['course']))) {
                    $api_url = null;
                    if (isset($_GET['teacher']) && !empty($_GET['teacher'])) {
                        $teacher = urlencode($_GET['teacher']);
                        $api_url = $supabase_url . "/rest/v1/evaluation?teacher=eq.$teacher&select=*";
                    } elseif (isset($_GET['course']) && !empty($_GET['course'])) {
                        $course = urlencode($_GET['course']);
                        $api_url = $supabase_url . "/rest/v1/evaluation?course_name=eq.$course&select=*";
                    }

                    if ($api_url) {
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $api_url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                            'apikey: ' . $supabase_anon_key,
                            'Authorization: Bearer ' . $supabase_anon_key,
                            'Content-Type: application/json',
                        ]);
                        $response = curl_exec($ch);
                        if (curl_errno($ch)) {
                            die('cURL 錯誤: ' . curl_error($ch));
                        }
                        curl_close($ch);

                        $results = json_decode($response, true);

                        if ($results && is_array($results) && count($results) > 0) {
                            foreach ($results as $row) {
                                echo '<div class="evaluation-block">';
                                echo "<p class='scroll'><strong>課程類別 :</strong> <span class='pfont'>" . htmlspecialchars($row['small_category']) . "</span></p>";
                                echo "<p><strong>課程名稱 :</strong> <span class='pfont'>" . htmlspecialchars($row['course_name']) . "</span></p>";
                                echo "<p><strong>老師 :</strong> <span class='pfont'>" . htmlspecialchars($row['teacher']) . "</span></p>";
                                echo '<div class="full-content" style="display: none;">';
                                echo "<p><strong>Thoughts:</strong> " . htmlspecialchars($row['thoughts']) . "</p>";

                                showStars($row['all_evaluation'], "整體評價");
                                showStars($row['credit_sweet'], "給分甜度");
                                showStars($row['learning'], "含金量");
                                showStars($row['evilking_level'], "老師78程度");

                                echo '</div>';
                                echo '<button class="show-full-content">learn more</button>';
                                echo '<button class="show-partial-content" style="display: none;">Show less</button>';
                                echo '</div>';
                            }
                        } else {
                            echo "沒有找到相關課程。";
                        }
                    }
                }
                ?>

            </div>
        </div>
    </section>

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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // 處理所有評價區塊的 learn more/show less 按鈕
            var evaluationBlocks = document.querySelectorAll(".evaluation-block");

            evaluationBlocks.forEach(function (block) {
                var showMoreBtn = block.querySelector(".show-full-content");
                var showLessBtn = block.querySelector(".show-partial-content");
                var fullContent = block.querySelector(".full-content");

                if (showMoreBtn) {
                    showMoreBtn.addEventListener("click", function () {
                        fullContent.style.display = "block";
                        showMoreBtn.style.display = "none";
                        showLessBtn.style.display = "inline-block";
                        block.style.height = 'auto'; // 讓高度自動適應內容

                        // 平滑捲動到該區塊
                        smoothScrollTo(block.offsetTop - 40, 300);
                    });
                }

                if (showLessBtn) {
                    showLessBtn.addEventListener("click", function () {
                        fullContent.style.display = "none";
                        showLessBtn.style.display = "none";
                        showMoreBtn.style.display = "inline-block";
                        block.style.height = "260px"; // 恢復原始高度

                        // 平滑捲動到該區塊
                        smoothScrollTo(block.offsetTop - 40, 300);
                    });
                }
            });

            // 平滑捲動函數
            function smoothScrollTo(targetPosition, duration) {
                var startPosition = window.scrollY || window.pageYOffset;
                var distance = targetPosition - startPosition;
                var startTime = null;

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

        window.addEventListener("load", function () {
            // 延遲 1 秒後隱藏 preloader
            setTimeout(function () {
                var preloader = document.getElementById("preloader");
                preloader.style.display = "none";
            }, 1000);
        });
    </script>
</body>

</html>