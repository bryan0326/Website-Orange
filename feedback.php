<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>意見回饋</title>
</head>
<body>
<?php
// 取得 Supabase 環境變數
$supabase_url = getenv('SUPABASE_URL');
$supabase_key = getenv('SUPABASE_ANON_KEY');

// 確認表單資料存在
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    $rating = intval($_POST['rating'] ?? 0);

    // 建立要傳給 Supabase 的資料
    $data = [
        "name" => $name,
        "email" => $email,
        "message" => $message,
        "rating" => $rating
    ];

    // 初始化 cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $supabase_url . "/rest/v1/feedback");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "apikey: $supabase_key",
        "Authorization: Bearer $supabase_key",
        "Content-Type: application/json",
        "Prefer: return=representation"
    ]);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode == 201) {
        echo "回饋已成功提交";
    } else {
        echo "存入 Supabase 時發生錯誤: HTTP $httpcode<br>";
        echo "回傳內容: $response";
    }
} else {
    echo "請透過表單提交資料";
}
?>
</body>
</html>
