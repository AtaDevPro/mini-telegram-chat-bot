# Mini Telegram Chat Bot

A simple PHP Telegram bot that allows users to send messages to an admin, and the admin can respond back easily. This is a great starting point for learning Telegram Bot API with PHP.

---

## 💡 Features

- Receives and forwards user messages to the admin.
- Lets the admin reply to any user by sending their ID and message.
- Uses PHP `curl` to communicate with Telegram's Bot API.
- Simple and lightweight, suitable for learning or extending.

---

## 🚀 How it Works

1. User sends a message to the bot.
2. If the message is not `/start`, it's forwarded to the admin.
3. Admin can reply by sending:
USER_ID
Your message here
4. The bot will send the message to that user.

---

## 🛠 Setup

1. Replace `API_TOKEN` with your actual Telegram bot token.
2. Replace `$admin` and `$admin2` with your Telegram user ID(s).
3. Host this script on a PHP-supported server.
4. Set the bot webhook to point to your hosted file:
```bash
https://api.telegram.org/bot<YOUR_TOKEN>/setWebhook?url=https://yourdomain.com/bot.php
```

✍️ Author
Made with ❤️ by AtaDevPro
