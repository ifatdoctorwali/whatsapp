<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #0c1317;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header Styles */
        .header {
            background-color: #202c33;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }

        .header-icons {
            display: flex;
            gap: 20px;
            color: #aebac1;
        }

        .header-icon {
            width: 24px;
            height: 24px;
            cursor: pointer;
        }

        /* Main Container */
        .main-container {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 400px;
            background-color: #111b21;
            border-right: 1px solid #262f34;
            display: flex;
            flex-direction: column;
        }

        /* Search Box */
        .search-container {
            padding: 12px;
        }

        .search-box {
            background-color: #202c33;
            border-radius: 8px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-input {
            background: transparent;
            border: none;
            color: #d1d7db;
            width: 100%;
            font-size: 15px;
        }

        .search-input::placeholder {
            color: #8696a0;
        }

        .search-input:focus {
            outline: none;
        }

        /* Chat List */
        .chat-list {
            flex: 1;
            overflow-y: auto;
        }

        .chat-item {
            display: flex;
            padding: 12px 16px;
            gap: 15px;
            cursor: pointer;
            transition: background-color 0.2s;
            border-bottom: 1px solid #222d34;
        }

        .chat-item:hover {
            background-color: #202c33;
        }

        .chat-item.active {
            background-color: #2a3942;
        }

        .chat-avatar {
            width: 49px;
            height: 49px;
            border-radius: 50%;
        }

        .chat-content {
            flex: 1;
        }

        .chat-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 4px;
        }

        .chat-name {
            color: #e9edef;
            font-weight: 500;
        }

        .chat-time {
            color: #8696a0;
            font-size: 12px;
        }

        .chat-preview {
            color: #8696a0;
            font-size: 14px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Chat Area */
        .chat-area {
            flex: 1;
            background-color: #0b141a;
            display: flex;
            flex-direction: column;
        }

        /* Chat Header */
        .chat-area-header {
            background-color: #202c33;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60px;
        }

        .current-chat-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .current-chat-name {
            color: #e9edef;
            font-weight: 500;
        }

        /* Messages Area */
        .messages-container {
            flex: 1;
            background-image: url('/api/placeholder/800/800');
            background-size: contain;
            overflow-y: auto;
            padding: 20px;
        }

        /* Message Input */
        .message-input-container {
            background-color: #202c33;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .message-input {
            flex: 1;
            background-color: #2a3942;
            border: none;
            border-radius: 8px;
            padding: 12px 16px;
            color: #d1d7db;
            font-size: 15px;
        }

        .message-input:focus {
            outline: none;
        }

        .send-button {
            background-color: #00a884;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .send-button:hover {
            background-color: #02856a;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
            }

            .chat-area {
                display: none;
            }

            .chat-area.active {
                display: flex;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="header">
                <div class="header-left">
                    <img src="/api/placeholder/40/40" alt="Profile" class="profile-img">
                </div>
                <div class="header-icons">
                    <div class="header-icon">⚡</div>
                    <div class="header-icon">+</div>
                    <div class="header-icon">⋮</div>
                </div>
            </div>

            <div class="search-container">
                <div class="search-box">
                    <span>🔍</span>
                    <input type="text" class="search-input" placeholder="Search or start new chat">
                </div>
            </div>

            <div class="chat-list">
                <!-- Sample chat items -->
                <div class="chat-item active">
                    <img src="/api/placeholder/49/49" alt="Avatar" class="chat-avatar">
                    <div class="chat-content">
                        <div class="chat-header">
                            <span class="chat-name">John Doe</span>
                            <span class="chat-time">10:30 AM</span>
                        </div>
                        <div class="chat-preview">Hey, how are you doing?</div>
                    </div>
                </div>

                <div class="chat-item">
                    <img src="/api/placeholder/49/49" alt="Avatar" class="chat-avatar">
                    <div class="chat-content">
                        <div class="chat-header">
                            <span class="chat-name">Family Group</span>
                            <span class="chat-time">Yesterday</span>
                        </div>
                        <div class="chat-preview">Mom: Dinner at 8pm tonight!</div>
                    </div>
                </div>

                <div class="chat-item">
                    <img src="/api/placeholder/49/49" alt="Avatar" class="chat-avatar">
                    <div class="chat-content">
                        <div class="chat-header">
                            <span class="chat-name">Work Team</span>
                            <span class="chat-time">Tuesday</span>
                        </div>
                        <div class="chat-preview">Meeting notes uploaded</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat Area -->
        <div class="chat-area">
            <div class="chat-area-header">
                <div class="current-chat-info">
                    <img src="/api/placeholder/40/40" alt="Current Chat" class="profile-img">
                    <span class="current-chat-name">John Doe</span>
                </div>
                <div class="header-icons">
                    <div class="header-icon">🔍</div>
                    <div class="header-icon">⋮</div>
                </div>
            </div>

            <div class="messages-container">
                <!-- Messages will be dynamically loaded here -->
            </div>

            <div class="message-input-container">
                <div class="header-icon">😊</div>
                <div class="header-icon">📎</div>
                <input type="text" class="message-input" placeholder="Type a message">
                <button class="send-button">➤</button>
            </div>
        </div>
    </div>
</body>
</html>
