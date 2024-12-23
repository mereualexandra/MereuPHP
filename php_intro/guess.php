<?php
function get($key, $default = null)
{
    return isset($_GET[$key]) ? $_GET[$key] : $default;
}

function validate($guess)
{
    return is_numeric($guess) && $guess >= 1 && $guess <= 100;
}

function get_guess_result($guess)
{
    if ($guess == 50) {
        return "Bravo! Ai ghicit numarul!";
    } elseif ($guess < 50) {
        return "Numarul este prea mic!";
    } elseif ($guess > 50) {
        return "Numarul este prea mare!";
    }
}

$guess = get('guess');

if (!validate($guess)) {
    $response = "Introdu un numar!";
} else {
    $response = get_guess_result($guess);
}
?>


<html>
<p>Zi un numar da la 1 la 100</p>
<form>
    <p><label for=" guess">Numar</label>
        <input type="text" name="guess" size="40" id="guess" />
    </p>
    <p><?= $response ?></p>
    <input type="submit" />
</form>