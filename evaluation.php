<?php
session_start(); // 確保 session 已啟動

// 取得 Supabase 環境變數
$supabase_url = getenv('SUPABASE_URL');
$supabase_key = getenv('SUPABASE_ANON_KEY');

// 確認使用者已登入
if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
    $name = $_SESSION['user_name'];

    // 檢查表單是否提交
    if (isset($_POST['submit-btn'])) {
        // 獲取表單資料
        $course_id = $_POST['course_id'] ?? '';
        $course_name = $_POST['course_name'] ?? '';
        $big_category = $_POST['big_category'] ?? '';
        $small_category = $_POST['small_category'] ?? '';
        $teacher = $_POST['teacher'] ?? '';
        $thoughts = $_POST['content'] ?? '';
        $all_evaluation = intval($_POST['all_evaluation'] ?? 0);
        $credit_sweet = intval($_POST['credit_sweet'] ?? 0);
        $learning = intval($_POST['learning'] ?? 0);
        $evilking_level = intval($_POST['evilking_level'] ?? 0);

        // 建立要傳給 Supabase 的資料陣列
        $data = [
            "course_id" => $course_id,
            "course_name" => $course_name,
            "big_category" => $big_category,
            "small_category" => $small_category,
            "teacher" => $teacher,
            "thoughts" => $thoughts,
            "all_evaluation" => $all_evaluation,
            "credit_sweet" => $credit_sweet,
            "learning" => $learning,
            "evilking_level" => $evilking_level
        ];

        // 初始化 cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $supabase_url . "/rest/v1/evaluation");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "apikey: $supabase_key",
            "Authorization: Bearer $supabase_key",
            "Content-Type: application/json",
            "Prefer: return=representation" // 可選，回傳插入的資料
        ]);

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpcode == 201) {
            // 插入成功，導向 LOGcourse.php
            header("Location: LOGcourse.php");
            exit();
        } else {
            echo "存入 Supabase 時發生錯誤: HTTP $httpcode<br>";
            echo "回傳內容: $response";
        }
    }
}
?>
