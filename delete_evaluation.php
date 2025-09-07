<?php
session_start(); // 開啟 session

// 取得 Supabase 環境變數
$supabase_url = getenv('SUPABASE_URL');
$supabase_key = getenv('SUPABASE_ANON_KEY');

// 檢查 POST 請求
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['evaluation_id'])) {
        $evaluation_id = intval($_POST['evaluation_id']); // 確保是整數

        $url = $supabase_url . "/rest/v1/evaluation?id=eq." . $evaluation_id;

        $headers = [
            "apikey: $supabase_key",
            "Authorization: Bearer $supabase_key",
            "Content-Type: application/json",
            "Prefer: return=representation" // 可選，回傳刪除後的資料
        ];

        // 初始化 cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpcode == 204 || $httpcode == 200) {
            // 刪除成功
            header("Location: manage.php");
            exit();
        } else {
            echo "刪除記錄時發生錯誤: HTTP $httpcode<br>";
            echo "回傳內容: $response";
        }
    }
}
?>
