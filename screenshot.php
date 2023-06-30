<?php
require 'vendor/autoload.php';

use JonnyW\PhantomJs\Client;
use Intervention\Image\ImageManagerStatic as Image;
use Telegram\Bot\Api;

// Mengambil screenshot menggunakan PhantomJS
$client = Client::getInstance();
$client->getEngine()->setPath('path/ke/phantomjs');
$request = $client->getMessageFactory()->createCaptureRequest('https://s.id/agent18', 'GET');
$response = $client->getMessageFactory()->createResponse();
$client->send($request, $response);

// Memproses respons screenshot
if ($response->getStatus() === 200) {
    // Mengonversi respons ke gambar menggunakan Intervention Image
    $image = Image::make($response->getContent());
    
    // Menyimpan gambar screenshot
    $image->save('screenshot.png');
    
    // Mengirimkan gambar ke Telegram
    $telegramBotToken = '6391296585:AAFHwz9LRxGaDZZ185vXg6jW0SJSKJILxYE';
    $telegramChatId = '@triexo';
    $telegram = new Api($telegramBotToken);
    $telegram->sendPhoto([
        'chat_id' => $telegramChatId,
        'photo' => fopen('screenshot.png', 'r')
    ]);
    
    // Menghapus gambar setelah dikirim
    unlink('screenshot.png');
} else {
    echo 'Terjadi kesalahan dalam mengambil screenshot.';
}
