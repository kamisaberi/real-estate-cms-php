<?php
include("lib/xmlrpc.inc");

$path = 'http://xmlrpc-c.sourceforge.net/api/sample.php';

printf("\n XMLRPC Service Discovery\n\n for: '%s'\n\n", $path);

$discovery = new Discovery($path);
$methods = $discovery->getMethods();

printf(" Method Summary:\n ===============\n", count($methods));
foreach ($methods as $i => $method)
{
    printf(" %'.-2d %s\n", $i + 1, $method->getName());
}

printf("\n Method Details (%d):\n ===================\n", count($methods));
foreach ($methods as $i => $method)
{
    printf("  %'.-2d %s\n", $i + 1, $method->getName());
    printf("\n       %s\n", $method);
    printf("\n%s\n\n", preg_replace('/^/um', '     ', wordwrap($method->getHelp(), 46)));
}
?>