<?php
session_start();

// Google OAuth 2.0 驗證參數
$clientId = getenv('GOOGLE_CLIENT_ID'); // 用戶端 ID
$clientSecret = getenv('GOOGLE_CLIENT_SECRET'); // 客戶端密碼
$redirectUri = getenv('GOOGLE_REDIRECT_URI'); // 回調 URI

// Supabase 設定
$SUPABASE_URL = getenv('SUPABASE_URL');
$SUPABASE_ANON_KEY = getenv('SUPABASE_ANON_KEY');

// 檢查是否有授權碼
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $tokenUrl = "https://oauth2.googleapis.com/token";

    $tokenData = [
        'code' => $code,
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'redirect_uri' => $redirectUri,
        'grant_type' => 'authorization_code'
    ];

    // 取得 access token
    $ch = curl_init($tokenUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($tokenData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $tokenResult = curl_exec($ch);
    curl_close($ch);

    $tokenData = json_decode($tokenResult, true);

    if (isset($tokenData['access_token'])) {
        $accessToken = $tokenData['access_token'];

        // 取得使用者資訊 (改用 cURL)
        $userInfoUrl = "https://www.googleapis.com/oauth2/v1/userinfo?access_token=" . $accessToken;
        $ch = curl_init($userInfoUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $userInfoResult = curl_exec($ch);
        curl_close($ch);

        $userInfo = json_decode($userInfoResult, true);

        if ($userInfo) {
            handleUserInfo($userInfo, $SUPABASE_URL, $SUPABASE_ANON_KEY);
            header("Location: users.php");
            exit();
        } else {
            echo "無法取得使用者資訊";
        }
    } else {
        echo "無法獲取token：" . htmlspecialchars($tokenResult);
    }
} else {
    echo "缺少授權碼。";
}

// 處理使用者資訊，存入 Supabase
function handleUserInfo($userInfo, $SUPABASE_URL, $SUPABASE_ANON_KEY)
{
    if (!isset($userInfo['id']))
        return;

    $googleUserId = $userInfo['id'];
    $googleEmail = $userInfo['email'];
    $googleName = $userInfo['name'];

    // 查詢 Supabase 是否已存在使用者 (改用 cURL)
    $url = "$SUPABASE_URL/rest/v1/users?google_user_id=eq.$googleUserId";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "apikey: $SUPABASE_ANON_KEY",
        "Authorization: Bearer $SUPABASE_ANON_KEY",
        "Content-Type: application/json"
    ]);
    $response = curl_exec($ch);
    curl_close($ch);

    $existingUsers = json_decode($response, true);

    // 若不存在，新增使用者 (改用 cURL)
    if (empty($existingUsers)) {
        $data = json_encode([
            'google_user_id' => $googleUserId,
            'email' => $googleEmail,
            'name' => $googleName
        ]);

        $url = "$SUPABASE_URL/rest/v1/users";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "apikey: $SUPABASE_ANON_KEY",
            "Authorization: Bearer $SUPABASE_ANON_KEY",
            "Content-Type: application/json"
        ]);
        curl_exec($ch);
        curl_close($ch);
    }

    // 將名稱存入 session
    $_SESSION['user_name'] = $googleName;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Google Callback</title>
</head>

<body>
    <p>正在處理登入，請稍候...</p>
</body>

</html>