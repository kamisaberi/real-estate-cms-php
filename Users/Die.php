<?php

function Dieeeee() {
    if (!(isset($_COOKIE['User'])) || !(isset($_COOKIE['Password']))) {
        die();
    }
}