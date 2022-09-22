<?php

### SYNTEX :-> setcookie(name, value, expire, path, domain, secure, httponly);

$cookie = setcookie("HelloCart", "Yogesh", time()+(60*60*24));

if($cookie){
    echo "Created <br>";
}

echo $_COOKIE['HelloCart'];

// ##### Replace and Append Cookie #####

setcookie("Cart", "HelloYogesh");                   ## Replace
setcookie("Cart", "Pandey");                        ## Replace

setcookie("CartVal", "Mr.Yogesh");                  ## Append
setcookie("CartVAlue", "YogeshPandey");             ## Append

// ##### Deleting Cookies ##### 

$delete_cookie = setcookie("HelloCart", "Yogesh", time()-(60*60*24));

