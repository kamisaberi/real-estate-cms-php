<?php

require_once '../Classes/OptionEx.inc';
//$myBlogName = 'My Blog Title';
$myBlogName = OptionEx::GetValue('SiteTitle');

$ht = 'HTTP';
$ht = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
    $myBlogUrl = $ht . "://" . $_SERVER['SERVER_NAME'] . "/RealEstate";
    $myBlogUpdateUrl = $ht . "://" . $_SERVER['SERVER_NAME'] . "/RealEstate";
} else {
    $myBlogUrl = $ht . "://" . $_SERVER['SERVER_NAME'];
    $myBlogUpdateUrl = $ht . "://" . $_SERVER['SERVER_NAME'];
}

//$myBlogUrl = 'http://MyBlogDomain.com';
//$myBlogUpdateUrl = 'http://MyBlogDomain';
$myBlogRSSFeedUrl = 'http://MyBlogDomain/feed';

// Just and example so you need to put your own list here
// I haven't used many of these for years
// List of Servers to Ping
$xmlRpcPingUrls[] = 'http://rpc.technorati.com/rpc/ping';
$xmlRpcPingUrls[] = 'http://api.moreover.com/RPC2';
$xmlRpcPingUrls[] = 'http://api.my.yahoo.com/RPC2';
$xmlRpcPingUrls[] = 'http://blogupdate.org/ping/';
$xmlRpcPingUrls[] = 'http://ping.bloggers.jp/rpc/';
$xmlRpcPingUrls[] = 'http://ping.feedburner.com';
$xmlRpcPingUrls[] = 'http://ping.syndic8.com/xmlrpc.php';
$xmlRpcPingUrls[] = 'http://ping.weblogalot.com/rpc.php';
$xmlRpcPingUrls[] = 'http://rpc.icerocket.com:10080/';
$xmlRpcPingUrls[] = 'http://rpc.weblogs.com/RPC2';
$xmlRpcPingUrls[] = 'http://services.newsgator.com/ngws/xmlrpcping.aspx';
$xmlRpcPingUrls[] = 'http://www.blogpeople.net/servlet/weblogUpdates';
$xmlRpcPingUrls[] = 'http://www.feedsky.com/api/RPC2';
$xmlRpcPingUrls[] = 'http://ping.blogoon.net/';
$xmlRpcPingUrls[] = 'http://ping.blogs.yandex.ru/RPC2';
$xmlRpcPingUrls[] = 'http://ping.syndic8.com/xmlrpc.php';
$xmlRpcPingUrls[] = 'http://www.blogpeople.net/ping';
$xmlRpcPingUrls[] = 'http://www.blogpeople.net/servlet/weblogUpdates';
$xmlRpcPingUrls[] = 'http://www.pubsub.com/ping';
$xmlRpcPingUrls[] = 'http://www.syndic8.com/xmlrpc.php';
$xmlRpcPingUrls[] = 'http://xping.pubsub.com/ping/';
$xmlRpcPingUrls[] = 'http://api.moreover.com/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.ae/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.at/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.be/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.bg/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.ca/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.ch/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.cl/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.co.cr/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.co.hu/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.co.id/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.co.il/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.co.in/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.co.it/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.co.jp/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.co.ma/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.co.nz/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.co.th/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.co.uk/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.co.ve/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.co.za/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.ar/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.au/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.br/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.co/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.do/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.mx/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.my/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.pe/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.sa/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.sg/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.tr/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.tw/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.ua/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.uy/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com.vn/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.de/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.es/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.fi/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.fr/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.gr/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.hr/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.ie/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.in/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.it/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.jp/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.lt/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.nl/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.pl/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.pt/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.ro/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.ru/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.se/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.sk/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blogsearch.google.tw/ping/RPC2';



// $xmlRpcPingUrls[] ='http://rpc.pingomatic.com/';
// $xmlRpcPingUrls[] ='http://rpc.autopinger.com';
// $xmlRpcPingUrls[] ='http://1470.net/api/ping';
// $xmlRpcPingUrls[] ='http://www.a2b.cc/setloc/bp.a2b';
// $xmlRpcPingUrls[] ='http://api.feedster.com/ping';
// $xmlRpcPingUrls[] ='http://api.moreover.com/RPC2';
// $xmlRpcPingUrls[] ='http://api.moreover.com/ping';
// $xmlRpcPingUrls[] ='http://api.my.yahoo.com/RPC2'; 
// $xmlRpcPingUrls[] ='http://api.my.yahoo.com/rss/ping';
// $xmlRpcPingUrls[] ='http://www.bitacoles.net/ping.php'; 
// $xmlRpcPingUrls[] ='http://bitacoras.net/ping'; 
// $xmlRpcPingUrls[] ='http://blogdb.jp/xmlrpc'; 
// $xmlRpcPingUrls[] ='http://www.blogdigger.com/RPC2';
// $xmlRpcPingUrls[] ='http://blogmatcher.com/u.php'; 
// $xmlRpcPingUrls[] ='http://www.blogoole.com/ping/'; 
// $xmlRpcPingUrls[] ='http://www.blogoon.net/ping/'; 
// $xmlRpcPingUrls[] ='http://www.blogpeople.net/servlet/weblogUpdates';
// $xmlRpcPingUrls[] ='http://www.blogroots.com/tb_populi.blog?id=1'; 
// $xmlRpcPingUrls[] ='http://www.blogshares.com/rpc.php'; 
// $xmlRpcPingUrls[] ='http://www.blogsnow.com/ping'; 
// $xmlRpcPingUrls[] ='http://www.blogstreet.com/xrbin/xmlrpc.cgi';
// $xmlRpcPingUrls[] = 'http://blog.goo.ne.jp/XMLRPC';
// $xmlRpcPingUrls[] = 'http://bulkfeeds.net/rpc'; 
// $xmlRpcPingUrls[] = 'http://coreblog.org/ping/'; 
// $xmlRpcPingUrls[] = 'http://www.lasermemory.com/lsrpc/';
// $xmlRpcPingUrls[] = 'http://mod-pubsub.org/kn_apps/blogchatt';
// $xmlRpcPingUrls[] = 'http://www.mod-pubsub.org/kn_apps/blogchatter/ping.php';
// $xmlRpcPingUrls[] = 'http://www.newsisfree.com/xmlrpctest.php'; 
// $xmlRpcPingUrls[] = 'http://ping.amagle.com/'; 
// $xmlRpcPingUrls[] = 'http://ping.bitacoras.com'; 
// $xmlRpcPingUrls[] = 'http://ping.blo.gs/'; 
// $xmlRpcPingUrls[] = 'http://ping.bloggers.jp/rpc/';
// $xmlRpcPingUrls[] = 'http://ping.blogmura.jp/rpc/'; 
// $xmlRpcPingUrls[] = 'http://ping.cocolog-nifty.com/xmlrpc';
// $xmlRpcPingUrls[] = 'http://ping.exblog.jp/xmlrpc'; 
// $xmlRpcPingUrls[] = 'http://ping.feedburner.com'; 
// $xmlRpcPingUrls[] = 'http://ping.myblog.jp'; 
// $xmlRpcPingUrls[] = 'http://ping.rootblog.com/rpc.php';
// $xmlRpcPingUrls[] = 'http://ping.syndic8.com/xmlrpc.php';
// $xmlRpcPingUrls[] = 'http://ping.weblogalot.com/rpc.php';
// $xmlRpcPingUrls[] = 'http://ping.weblogs.se/';
// $xmlRpcPingUrls[] = 'http://pingoat.com/goat/RPC2';
// $xmlRpcPingUrls[] = 'http://www.popdex.com/addsite.php'; 
// $xmlRpcPingUrls[] = 'http://rcs.datashed.net/RPC2/'; 
// $xmlRpcPingUrls[] = 'http://rpc.blogbuzzmachine.com/RPC2';
// $xmlRpcPingUrls[] = 'http://rpc.blogrolling.com/pinger/'; 
// $xmlRpcPingUrls[] = 'http://rpc.icerocket.com:10080/'; 
// $xmlRpcPingUrls[] = 'http://rpc.technorati.com/rpc/ping';
// $xmlRpcPingUrls[] = 'http://rpc.weblogs.com/RPC2';
// $xmlRpcPingUrls[] = 'http://www.snipsnap.org/RPC2'; 
// $xmlRpcPingUrls[] = 'http://trackback.bakeinu.jp/bakeping.php';
// $xmlRpcPingUrls[] = 'http://topicexchange.com/RPC2'; 
// $xmlRpcPingUrls[] = 'http://www.weblogues.com/RPC/'; 
// $xmlRpcPingUrls[] = 'http://xping.pubsub.com/ping/'; 
// $xmlRpcPingUrls[] = 'http://xmlrpc.blogg.de/'; 
// $xmlRpcPingUrls[] = 'http://bblog.com/ping.php'; 
// $xmlRpcPingUrls[] = 'http://blogsearch.google.com/ping/RPC2';
// $xmlRpcPingUrls[] = 'http://xping.pubsub.com/ping'; 
// $xmlRpcPingUrls[] = 'http://pingoat.com/goat/RPC2/'; 
// $xmlRpcPingUrls[] = 'http://pingqueue.com/rpc/'; 
// $xmlRpcPingUrls[] = 'http://www.bloglines.com/ping';
// $xmlRpcPingUrls[] = 'http://rpc.newsgator.com/'; 
// $xmlRpcPingUrls[] = 'http://rpc.pingomatic.com'; 
// $xmlRpcPingUrls[] = 'http://www.newsisfree.com/RPCCloud';
// $xmlRpcPingUrls[] = 'http://xmlrpc.blogg.de';
// $xmlRpcPingUrls[] = 'api.moreover.com/RPC2';
// $xmlRpcPingUrls[] = 'api.my.yahoo.co.jp/RPC2';
// $xmlRpcPingUrls[] = 'api.my.yahoo.com/RPC2';
// $xmlRpcPingUrls[] = 'audiorpc.weblogs.com/RPC2';
// $xmlRpcPingUrls[] = 'blog.goo.ne.jp/XMLRPC';
// $xmlRpcPingUrls[] = 'blogpeople.net/ping';
// $xmlRpcPingUrls[] = 'blogsearch.google.ae/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.at/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.be/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.bg/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.ca/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.ch/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.cl/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.co.cr/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.co.hu/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.co.id/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.co.il/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.co.in/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.co.it/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.co.jp/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.co.ma/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.co.nz/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.co.th/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.co.uk/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.co.ve/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.co.za/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.ar/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.au/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.br/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.co/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.do/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.mx/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.my/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.pe/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.sa/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.sg/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.tr/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.tw/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.ua/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.uy/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com.vn/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.com/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.de/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.es/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.fi/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.fr/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.gr/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.hr/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.ie/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.in/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.it/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.jp/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.lt/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.nl/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.pl/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.pt/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.ro/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.ru/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.se/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.sk/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.tw/ping/RPC2';
// $xmlRpcPingUrls[] = 'blogsearch.google.us/ping/RPC2';
// $xmlRpcPingUrls[] = 'feedsky.com/api/RPC2';
// $xmlRpcPingUrls[] = 'hamo-search.com/ping.php';
// $xmlRpcPingUrls[] = 'holycowdude.com/rpc/ping/';
// $xmlRpcPingUrls[] = 'newsblog.jungleboots.org/ping.php';
// $xmlRpcPingUrls[] = 'ping.blogoon.net/';
// $xmlRpcPingUrls[] = 'ping.blogs.yandex.ru/RPC2';
// $xmlRpcPingUrls[] = 'ping.fc2.com/';
// $xmlRpcPingUrls[] = 'ping.feedburner.com/';
// $xmlRpcPingUrls[] = 'ping.kutsulog.net/';
// $xmlRpcPingUrls[] = 'ping.myblog.jp/';
// $xmlRpcPingUrls[] = 'ping.namaan.net/rpc';
// $xmlRpcPingUrls[] = 'ping.snap.com/ping/RPC2';
// $xmlRpcPingUrls[] = 'ping.syndic8.com/xmlrpc.php';
// $xmlRpcPingUrls[] = 'ping.weblogalot.com/rpc.php';
// $xmlRpcPingUrls[] = 'ping.wordblog.de/';
// $xmlRpcPingUrls[] = 'r.hatena.ne.jp/rpc';
// $xmlRpcPingUrls[] = 'rpc.bloggerei.de/ping/';
// $xmlRpcPingUrls[] = 'rpc.blogrolling.com/pinger/';
// $xmlRpcPingUrls[] = 'rpc.icerocket.com:10080/';
// $xmlRpcPingUrls[] = 'rpc.pingomatic.com';
// $xmlRpcPingUrls[] = 'rpc.reader.livedoor.com/ping';
// $xmlRpcPingUrls[] = 'rpc.technorati.com/rpc/ping';
// $xmlRpcPingUrls[] = 'rpc.technorati.jp/rpc/ping';
// $xmlRpcPingUrls[] = 'rpc.twingly.com/';
// $xmlRpcPingUrls[] = 'rpc.weblogs.com/RPC2';
// $xmlRpcPingUrls[] = 'wasalive.com/ping/';
// $xmlRpcPingUrls[] = 'www.blogpeople.net/servlet/weblogUpdates';
// $xmlRpcPingUrls[] = 'xmlrpc.blogg.de';
// $xmlRpcPingUrls[] = 'xping.pubsub.com/ping/';
// $xmlRpcPingUrls[] = 'zhuaxia.com/rpc/server.php';
//fclose(STDIN);
fclose(STDOUT);
//fclose(STDERR);
//$STDIN = fopen('/dev/null', 'r');
//$STDOUT = fopen('myscript.log', 'wb');
//echo count($xmlRpcPingUrls);
$test = count($xmlRpcPingUrls) . "\n";
//file_put_contents('test.txt' , count($xmlRpcPingUrls));
require_once( 'IXR_Library.php' );

function xmlRpcPing($url) {
    global $myBlogName, $myBlogUrl, $myBlogUpdateUrl, $myBlogRSSFeedUrl;
    $client = new IXR_Client($url);
    $client->timeout = 30;
    $client->useragent .= ' -- PingTool/1.0.0';
    $client->debug = false;

    if ($client->query('weblogUpdates.extendedPing', $myBlogName, $myBlogUrl, $myBlogUpdateUrl, $myBlogRSSFeedUrl)) {
        return $client->getResponse();
    }

    echo 'Failed extended XML-RPC ping for "' . $url . '": ' . $client->getErrorCode() . '->' . $client->getErrorMessage() . '<br />';

    if ($client->query('weblogUpdates.ping', $myBlogName, $myBlogUrl)) {
        return $client->getResponse();
    }

    echo 'Failed basic XML-RPC ping for "' . $url . '": ' . $client->getErrorCode() . '->' . $client->getErrorMessage() . '<br />';

    return false;
}

foreach ($xmlRpcPingUrls as $url) {
    echo count($xmlRpcPingUrls);

    // echo '<h1>XML-RPC pinging ' . $url . '</h1>';
    //file_put_contents('test.txt', $url ."\n" );
    // echo '<pre>';
    //print_r(xmlRpcPing( $url));
    //foreach ($results as $value) {
    $test.="Test\n";
    //}

    xmlRpcPing($url);
    print_r(xmlRpcPing($url));
    // //file_put_contents('test.txt', xmlRpcPing( $url ) ."\n" );
    //echo '</pre>';
    ob_flush();
    flush();
}

file_put_contents('test.txt', $test . "\n");
