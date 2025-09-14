<?php
session_start();
// 讀取環境變數
$supabaseUrl = getenv('SUPABASE_URL');
$supabaseKey = getenv('SUPABASE_ANON_KEY');
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>首頁 - 早安美吱澄</title>
    <link rel="icon" type="image/png" href="images/orange.png">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="國立嘉義大學課程評價系統，提供使用者查詢、瀏覽和分享課程評價。">
    <meta name="keywords" content="嘉義大學, 課程評價, NCYU, 課程, 評價">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <link rel="stylesheet" href="css/skel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-xlarge.css">
    <noscript>
        <link rel="stylesheet" href="css/skel.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-xlarge.css">
    </noscript>

    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
</head>

<body id="top">

    <div id="preloader">
        <img src="images/orange.png" alt="Loading..." class="spinner">
        <img src="images/loading.gif" class="loadinggif">
    </div>

    <header id="header" class="skel-layers-fixed">
        <h1><a href="index.php">早安美吱澄</a></h1>
        <nav id="nav">
            <ul>
                <!-- <li><a id="userCountDisplay" class="count">用戶人數: Loading...</a></li>
                <li><a id="evalCountDisplay" class="count">課程評價: Loading...</a></li> -->
                <li><a href="index.php" class="up">首頁</a></li>
                <li><a href="course.php" class="up">課程評價</a></li>
                <li><a href="feedback_front.php" class="up">意見回饋</a></li>
                <?php if (isset($_SESSION["login_session"]) && $_SESSION["login_session"] === true): ?>
                    <li><a href="users.php"><img src="images/orange.png" alt="User Avatar"
                                style="width: 40px; height: 40px;"></a></li>
                <?php else: ?>
                    <li><a href="login_front.php" class="button special">Login</a></li>
                <?php endif; ?>
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
                }

                60% {
                    transform: translateY(-15px);
                }
            }

            .loadinggif {
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

            #header nav>ul>li .count:hover::after,
            #header nav>ul>li a.button:hover::after {
                width: 0;
            }

            #header nav>ul>li .count:hover {
                color: #555f66;
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

            .coursecontainer>div>div p {
                margin: 5px 0;
            }

            .coursecontainer>div>div img {
                width: 200px;
                height: 50px;
                margin-right: 5px;
            }

            .coursecontainer>div>div .additional-style {
                color: red;
                font-weight: bold;
            }

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

    <section id="banner">
        <div class="inner">
            <h2>國立嘉義大學課程評價系統</h2>
            <p style="font-size: 30px">NCYU<a href=""></a></p>
            <ul class="actions">
                <li><a href="login_front.php" class="button big special">Sign Up</a></li>
            </ul>
        </div>
    </section>

    <section id="main" class="wrapper style1">
        <h1 style="text-align: center; font-size: 42px;">歡迎使用嘉義大學課程評價系統!</h1>
        <p></p>
        <div class="container_course">
            <div>
                <div id="evaluation-results">
                    <p style="text-align: center;">載入中...請稍候</p>
                </div>
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
                                <p></p>
                            </section>
                        </form>
                    </div>
                </div>
            </div>

            <section id="main" class="wrapper style1">
                <h1 style="text-align: center; font-size: 42px;">查詢結果</h1>
                <div class='coursecontainer'>
                    <div id="search-results">
                        <?php
                        // PHP for handling search results
                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                            $supabaseUrl = getenv('SUPABASE_URL');
                            $supabaseKey = getenv('SUPABASE_ANON_KEY');

                            /**
                             * Helper function to fetch data from Supabase.
                             * @param string $endpoint The Supabase API endpoint.
                             * @param string $apikey The Supabase anon key.
                             * @return array|null Decoded JSON response or null on error.
                             */
                            function supabaseGet($endpoint, $apikey)
                            {
                                $ch = curl_init($endpoint);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_TIMEOUT, 6);
                                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                                    "apikey: $apikey",
                                    "Authorization: Bearer $apikey",
                                    "Content-Type: application/json"
                                ]);
                                $response = curl_exec($ch);
                                if ($response === false) {
                                    error_log('cURL Error: ' . curl_error($ch));
                                }
                                curl_close($ch);
                                return json_decode($response, true);
                            }

                            /**
                             * Displays star images based on a numeric value.
                             * @param int $value The number of stars to display.
                             */
                            function displayStars($value)
                            {
                                for ($i = 0; $i < $value; $i++) {
                                    echo "<img src='images/five_star.png'>";
                                }
                            }

                            $searchResults = [];
                            if (!empty($_GET['teacher'])) {
                                $teacher = urlencode($_GET['teacher']);
                                $searchResults = supabaseGet("$supabaseUrl/rest/v1/evaluation?teacher=eq.$teacher", $supabaseKey);
                            } elseif (!empty($_GET['course'])) {
                                $course = urlencode($_GET['course']);
                                $searchResults = supabaseGet("$supabaseUrl/rest/v1/evaluation?course_name=eq.$course", $supabaseKey);
                            }

                            if (is_array($searchResults) && count($searchResults) > 0) {
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
                                echo "查無結果。";
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>
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
        const SUPABASE_URL = "<?php echo $supabaseUrl; ?>";
        const SUPABASE_KEY = "<?php echo $supabaseKey; ?>";

        function displayStars(value) {
            let starsHtml = '';
            for (let i = 0; i < value; i++) {
                starsHtml += `<img src='images/five_star.png'>`;
            }
            return starsHtml;
        }

        async function fetchAndDisplayData() {
            try {
                // Fetch user and evaluation counts
                const [userResponse, evalResponse] = await Promise.all([
                    fetch(`${SUPABASE_URL}/rest/v1/users?select=id`, {
                        headers: { 'apikey': SUPABASE_KEY, 'Authorization': `Bearer ${SUPABASE_KEY}` }
                    }),
                    fetch(`${SUPABASE_URL}/rest/v1/evaluation?select=*&order=random()&limit=5`, {
                        headers: { 'apikey': SUPABASE_KEY, 'Authorization': `Bearer ${SUPABASE_KEY}` }
                    })
                ]);

                const users = await userResponse.json();
                const evaluations = await evalResponse.json();

                //document.getElementById('userCountDisplay').textContent = `用戶人數: ${users.length}`;
                //document.getElementById('evalCountDisplay').textContent = `課程評價: ${evaluations.length}`;

                const container = document.getElementById('evaluation-results');
                container.innerHTML = ''; // Clear the loading message

                if (evaluations.length > 0) {
                    evaluations.forEach(row => {
                        const evaluationBlock = document.createElement('div');
                        evaluationBlock.className = 'evaluation-block';

                        evaluationBlock.innerHTML = `
                            <p class='scroll'><strong>課程類別 :</strong> <span class='pfont'>${row.small_category}</span></p>
                            <p><strong>課程名稱 :</strong> <span class='pfont'>${row.course_name}</span></p>
                            <p><strong>老師 :</strong> <span class='pfont'>${row.teacher}</span></p>
                            <div class="full-content" style="display: none;">
                                <p><strong>Thoughts:</strong> ${row.thoughts}</p>
                                <p><strong>整體評價:</strong> </p>
                                ${displayStars(row.all_evaluation)}
                                <p><strong>給分甜度:</strong> </p>
                                ${displayStars(row.credit_sweet)}
                                <p><strong>含金量:</strong> </p>
                                ${displayStars(row.learning)}
                                <p><strong>老師78程度:</strong> </p>
                                ${displayStars(row.evilking_level)}
                            </div>
                            <button class="show-full-content">learn more</button>
                            <button class="show-partial-content" style="display: none;">Show less</button>
                        `;
                        container.appendChild(evaluationBlock);
                    });
                    attachButtonListeners(); // Re-attach listeners for new buttons
                } else {
                    container.innerHTML = '<p style="text-align: center;">尚無課程評價。</p>';
                }

            } catch (error) {
                console.error('Error fetching data:', error);
                const container = document.getElementById('evaluation-results');
                container.innerHTML = '<p style="text-align: center; color: red;">載入資料失敗。</p>';
            }
        }

        function attachButtonListeners() {
            var showButtons = document.querySelectorAll(".show-full-content, .show-partial-content");
            showButtons.forEach(function (button) {
                button.addEventListener("click", function () {
                    var evaluationBlock = button.closest(".evaluation-block");
                    var fullContent = evaluationBlock.querySelector(".full-content");
                    var originalHeight = 260; // Define original height

                    if (fullContent && button.classList.contains("show-full-content")) {
                        fullContent.style.display = "block";
                        button.style.display = "none";
                        evaluationBlock.querySelector(".show-partial-content").style.display = "inline-block";

                        var fullContentHeight = fullContent.offsetHeight;
                        var newHeight = originalHeight + fullContentHeight;
                        evaluationBlock.style.height = newHeight + "px";
                        smoothScrollTo(evaluationBlock.offsetTop - 40, 300);
                    } else if (button.classList.contains("show-partial-content")) {
                        fullContent.style.display = "none";
                        button.style.display = "none";
                        evaluationBlock.querySelector(".show-full-content").style.display = "inline-block";
                        evaluationBlock.style.height = originalHeight + "px";
                        smoothScrollTo(evaluationBlock.offsetTop - 40, 300);
                    }
                });
            });
        }

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

        // Hide preloader and start fetching data after the page is loaded
        window.addEventListener("load", function () {
            setTimeout(function () {
                var preloader = document.getElementById("preloader");
                if (preloader) {
                    preloader.style.display = "none";
                }
                fetchAndDisplayData();
            }, 1000);
        });
    </script>
</body>

</html>