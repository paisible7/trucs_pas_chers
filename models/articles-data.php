<?php
$article = 'montre';
$prix = 15;
$devise = 'USD';
$articles_names = [
    'Bracelet',
    'Montre',
    'Cable usb',
    'Ecouteurs',
    'Carnets'
];

//<pres>;
//var_dump($articles_names);
//</pres>;
$articles_prices = [
    'Bracelet' => 5000,
    'Montre' => 13000,
    'Cable usb' => 7500,
    'Ecouteurs' => 25000,
    'Carnets' => 2500
];

$total = 0;
foreach ($articles_prices as $price) {
    $total += $price;
}
