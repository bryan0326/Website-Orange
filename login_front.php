<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Log_in_Orange</title>
    <link rel="icon" type="image/png" href="images/orange.png">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
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
    <!-- Header -->
    <header id="header" class="skel-layers-fixed">
        <h1><a href="index.php" class="up">早安美吱澄</a></h1>
        <nav id="nav">
            <ul>
                <li><a href="index.php" class="up">首頁</a></li>
                <li><a href="course.php" class="up">課程評價</a></li>
                <li><a href="feedback_front.php" class="up">意見回饋</a></li>
                <?php
                if (isset($_SESSION["login_session"]) && $_SESSION["login_session"] === true) {
                    echo '<li><a href="users.php"><img src="images/orange.png" alt="User Avatar" style="width: 40px; height: 40px;"></a></li>';
                    echo '<li><a href="logout.php" class="button special">Logout</a></li>';
                } else {
                    echo '<li><a href="login_front.php" class="button special">Login</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>

    <!-- Main -->
    <section id="main" class="wrapper style1" style="background-color: #efba47; color:white;">
        <div class="leaf-container" style="background-color:white; padding:20px; border-radius:10px;">
            <img src="images/orange.png" width="200" height="200">
            <aside>
                <!--  表單送到 login.php，驗證 Supabase -->
                <form method="post" action="login.php">
                    <label for="username" style="font-size: 18px; font-weight: bold; color: #8b4513;">帳號</label>
                    <input type="text" id="username" name="username" required
                        style="margin-bottom: 20px; width: 100%; color: black;" placeholder="你的帳號">
                    
                    <label for="password" style="font-size: 18px; font-weight: bold; color: #8b4513;">密碼</label>
                    <input type="password" id="password" name="password" required
                        style="margin-bottom: 30px; width: 100%; color: black;" placeholder="你的密碼">
                    
                    <input type="submit" name="submit-btn" value="登入"
                        style="width: 100%; background-color:#8b4513; color:white; font-weight:bold; padding:10px; border:none; border-radius:5px;">
                </form>
            </aside>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <ul class="copyright">
            <li>©Copyright by 第14組</li>
        </ul>
    </footer>
</body>
</html>
