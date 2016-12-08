# PHP-Reverse-Proxy-PRP
PHP Reverse Proxy PRP suport that cross domain

# Example： 

```
if (!@include __DIR__ . '/proxy/ProxyHandler.class.php') {
        die('Could not load proxy');
    }

    $proxy = new ProxyHandler('http://b.daoapp.io');

    // Check for a success
    if ($proxy->execute()) {
        //print_r($proxy->getCurlInfo()); // Uncomment to see request info
    } else {
        echo $proxy->getCurlError();
    }

    $proxy->close();
```
