<?php
use Telegram\Bot\Api;

// Fungsi untuk mengirim pesan ke Telegram
function sendMessageToTelegram($message, $chatId, $telegramBotToken) {
    $telegram = new Api($telegramBotToken);
    $telegram->sendMessage([
        'chat_id' => $chatId,
        'text' => $message
    ]);
}

// Mendapatkan pembaruan terbaru dari Telegram menggunakan metode polling
$telegramBotToken = '6391296585:AAFHwz9LRxGaDZZ185vXg6jW0SJSKJILxYE';
$telegram = new Api($telegramBotToken);
$updates = $telegram->getUpdates();
$latestUpdate = end($updates);
$chatId = $latestUpdate->getMessage()->getChat()->getId();

// Menghasilkan nomor acak antara 1000 dan 9999
$randomNumber = rand(1000, 9999);

// Mengirim nomor acak ke Telegram
$message = 'Nomor acak: ' . $randomNumber;
sendMessageToTelegram($message, $chatId, $telegramBotToken);

echo "Nomor acak berhasil dikirim ke Telegram.";
?>
