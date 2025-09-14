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
        <div style="display: flex; justify-content: center; align-items: center; padding: 20px;">
            <div class="leaf-container"
                style="background-color:white; padding:20px; border-radius:10px; display: flex; align-items: center;">
                <img src="images/orange.png" width="200" height="300" style="margin-right: 20px;">
                <aside style="padding: 10px;">
                    <form method="post" action="login.php">
                        <label for="username" style="margin-bottom: 5px;">帳號</label>
                        <input type="text" id="username" name="username" required placeholder="你的帳號"
                            style="width: 100%; margin-bottom: 5px;">

                        <label for="password" style="margin-top: 10px; margin-bottom: 5px;">密碼</label>
                        <input type="password" id="password" name="password" required placeholder="你的密碼"
                            style="width: 100%; margin-bottom: 5px;">

                        <input type="submit" name="submit-btn" value="登入"
                            style="width: 100%; background-color:#8b4513; color:white; margin-left: 0px ; margin-bottom: -10px;">
                    </form>

                    <form method="post" action="login.php" style="margin-top: 20px;">
                        <input type="submit" name="google-submit" value="使用 Google 登入"
                            style="width: 100%; background-color:#db4437; color:white; margin-left: 0px;">
                    </form>
                </aside>
            </div>
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