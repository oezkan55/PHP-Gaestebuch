<?php

//! Verhindern das HTML Tags ode JS Code eingeschleust wird

function e($html) {
    return htmlspecialchars($html, ENT_QUOTES, 'UTF-8', true);
}
