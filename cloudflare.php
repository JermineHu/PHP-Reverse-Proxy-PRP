<?php

if (!@include __DIR__ . '/proxy/ProxyHandler.class.php') {
    die('Could not load proxy');
}

/**
 * CloudFlare doesn't allow a request to certain IPs
 * Namely the same IP the request is coming from.
 * Stripping CloudFlare headers allows this.
 */
class CloudFlareSafeProxy extends ProxyHandler
{
    public function setClientHeader($headerName, $value) {
        if (substr($headerName, 0, 3) !== 'Cf-') {
            parent::setClientHeader($headerName, $value);
        }
    }
}

$proxy = new CloudFlareSafeProxy('http://internal.example.org');

// Check for a success
if ($proxy->execute()) {
    //print_r($proxy->getCurlInfo()); // Uncomment to see request info
} else {
    echo $proxy->getCurlError();
}

$proxy->close();
