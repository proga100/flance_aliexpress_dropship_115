<?php
$ch = curl_init();

// установка URL и других необходимых параметров
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


// загрузка страницы и выдача её браузеру
$res = curl_exec($ch);

// завершение сеанса и освобождение ресурсов
curl_close($ch);

print_r ($res );
?>