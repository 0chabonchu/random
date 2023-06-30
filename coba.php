<?php
// Membuat daftar nama dan angka acak
$randomData = [];
for ($i = 0; $i < 10; $i++) {
    $randomString = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8/strlen($x)))), 1, 8);
    $randomData[] = $randomString;
}

// Menyimpan daftar nama dan angka ke dalam file teks
$file = fopen("daftar_nama.txt", "w");
foreach ($randomData as $data) {
    fwrite($file, $data . "\n");
}
fclose($file);

echo "File berhasil dibuat dengan daftar nama dan angka acak.";
?>
