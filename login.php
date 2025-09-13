<?php
session_start(); // 確保 session 已啟動

$supabaseUrl = getenv('SUPABASE_URL'); // Supabase 專案 URL
$supabaseKey = getenv('SUPABASE_ANON_KEY'); // Supabase anon key

// Google OAuth 2.0 參數
$clientId = getenv('GOOGLE_CLIENT_ID');
$clientSecret = getenv('GOOGLE_CLIENT_SECRET');
$redirectUri = "https://orange-xvxz.onrender.com/google-callback.php";

// 判斷表單提交類型
if (isset($_POST["submit-btn"])) {
    handleRegularLogin();
} elseif (isset($_POST["google-submit"])) {
    validateGoogleAccount();
} else {
    echo "<center><font color='red'>請輸入使用者名稱和密碼</font></center>";
}

// 一般登入（Supabase）
function handleRegularLogin() {
    global $supabaseUrl, $supabaseKey;

    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if (empty($username) || empty($password)) {
        echo "<script>alert('請輸入使用者名稱和密碼'); window.location.href = 'login_front.php';</script>";
        return;
    }

    // 呼叫 Supabase REST API 查詢 users 表
    $url = $supabaseUrl . "/rest/v1/users?email=eq." . urlencode($username);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "apikey: $supabaseKey",
        "Authorization: Bearer $supabaseKey",
        "Content-Type: application/json",
        "Prefer: return=representation"
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $users = json_decode($response, true);

    if (!empty($users) && $users[0]['password'] === $password) {
        // 登入成功
        $_SESSION["login_session"] = true;
        header("Location: manage.php");
        exit();
    } else {
        // 登入失敗
        $_SESSION["login_session"] = false;
        echo "<script>alert('使用者名稱或密碼錯誤!'); window.location.href = 'login_front.php';</script>";
    }
}

// Google 登入
function validateGoogleAccount() {
    global $clientId, $redirectUri;

    $googleLoginUrl = "https://accounts.google.com/o/oauth2/auth?" .
        "client_id={$clientId}&" .
        "redirect_uri={$redirectUri}&" .
        "response_type=code&" .
        "scope=email profile";

    header("Location: {$googleLoginUrl}");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>login.php</title>
<link rel="icon" type="image/png" href="images/orange.png">
</head>
<body>
<form method="POST">
    <h2>一般登入</h2>
    <input type="text" name="username" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit" name="submit-btn">登入</button>
</form>

<form method="POST">
    <h2>Google 登入</h2>
    <button type="submit" name="google-submit">使用 Google 登入</button>
</form>
</body>
</html>

