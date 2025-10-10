# Orange - 課程評價系統專案說明
## **網址** : https://orange-xvxz.onrender.com 
本專案是一個採用 PHP、JavaScript 和 SQL 語言建構的課程評價系統

* 部署與維護：
    * 網站目前部署在 **Render 的免費方案**上，首次啟動可能需要較長時間
    * 資料庫使用 **Supabase** 線上服務，確保資料的即時存取
* 技術架構：
    * 後端：核心邏輯由 PHP 處理，負責資料處理與伺服器溝通
    * 前端：介面使用標準的 HTML、CSS 和 JavaScript 呈現
    * 資料庫：採用 SQL 語法與 Supabase 進行互動
* 開發歷程：
    本系統原本部署於 000webhost 平台並使用 MySQL 資料庫
    但是因為 000webhost 的關閉，我們將整個專案遷移至 Render，並將資料庫改為 Supabase，以確保服務能持續運行
    遷移過程中，部分版面有進行了調整與修復，雖然目前還有一些優化空間，但已確保系統功能完整，並能提供良好的使用體驗

## Security & Sensitive Data
This repository is a demo / educational implementation. For safety:
- No API keys, passwords, or private certificates are included.
- Please create your own `.env` from `.env.example` with credentials.
- If any credential was accidentally committed, it has been revoked/rotated.
- For production hardening: enable HTTPS, use secure credential stores, and run dependency vulnerability scans (e.g., `pip-audit`).
If you find a security issue, please contact me at bryanhan0326@gmail.com.
