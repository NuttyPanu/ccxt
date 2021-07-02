<?php
include 'ccxt.php';

$poloniex = new \ccxt\poloniex ();
$bittrex  = new \ccxt\bittrex  (array ('verbose' => true));
$quoinex  = new \ccxt\quoinex   ();
$zaif     = new \ccxt\zaif     (array (
    'apiKey' => 'e9EqyEeZkrxFS7NQCU4IGXqTbR7RsXCYXKyX3kp8H39AL3tS26Hxnda6to8w59U2',
    'secret' => 'eW2adRtSStSsSJSsI7ul1CHwIFDYpO4kQPXm1mh7Gvho1cLqObg1zoHgxQa8kT8R',
));
$hitbtc   = new \ccxt\hitbtc   (array (
    'apiKey' => 'e9EqyEeZkrxFS7NQCU4IGXqTbR7RsXCYXKyX3kp8H39AL3tS26Hxnda6to8w59U2',
    'secret' => 'eW2adRtSStSsSJSsI7ul1CHwIFDYpO4kQPXm1mh7Gvho1cLqObg1zoHgxQa8kT8R',
));

$exchange_id = 'binance';
$exchange_class = "\\ccxt\\$exchange_id";
$exchange = new $exchange_class (array (
    'apiKey' => 'e9EqyEeZkrxFS7NQCU4IGXqTbR7RsXCYXKyX3kp8H39AL3tS26Hxnda6to8w59U2',
    'secret' => 'eW2adRtSStSsSJSsI7ul1CHwIFDYpO4kQPXm1mh7Gvho1cLqObg1zoHgxQa8kT8R',
));

$poloniex_markets = $poloniex->load_markets ();

var_dump ($poloniex_markets);
var_dump ($bittrex->load_markets ());
var_dump ($quoinex->load_markets ());

var_dump ($poloniex->fetch_order_book ($poloniex->symbols[0]));
var_dump ($bittrex->fetch_trades ('BTC/USD'));
var_dump ($quoinex->fetch_ticker ('ETH/EUR'));
var_dump ($zaif->fetch_ticker ('BTC/JPY'));

var_dump ($zaif->fetch_balance ());

// sell 1 BTC/JPY for market price, you pay ¥ and receive ฿ immediately
var_dump ($zaif->id, $zaif->create_market_sell_order ('BTC/JPY', 1));

// buy BTC/JPY, you receive ฿1 for ¥285000 when the order closes
var_dump ($zaif->id, $zaif->create_limit_buy_order ('BTC/JPY', 1, 285000));

// set a custom user-defined id to your order
$hitbtc->create_order ('BTC/USD', 'limit', 'buy', 1, 3000, array ('clientOrderId' => '123'));

echo "pass";
?>
