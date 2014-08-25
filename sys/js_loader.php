<?php namespace mdo;

function loadJS($js_arr) {
    foreach($js_arr as $i)
        echo '<script src="js/', $i, '"></script>';
}
