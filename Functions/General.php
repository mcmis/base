<?php

function checkActiveURL($uri){
    return ('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) == $uri ? 'active' : '';
}

function sys($key){
    return app($key);
}


