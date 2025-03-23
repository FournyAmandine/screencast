<?php
use Tecgdcs\Response;


/*global $csrf_token;

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
//ne pas faire un return en global pour ne pas retourner à chaque fois la valeur pour chaque appel du fichier

function csrf()
{
    global $csrf_token;
    $csrf_token = $_SESSION['csrf_token'];
    if (isset($_SERVER['$_REQUEST_METHOD'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die('Vérification du Token invalide');
            }
        }
    }
    echo '<input type="hidden" class="input" name="csrf_token" value="' . $csrf_token . '">';
    return true;
}
*/

if (! function_exists('csrf')) {

    #[NoReturn]
    function csrf(): void
    {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        echo <<<HTML
<input name="_csrf" type="hidden" value="{$_SESSION['csrf_token']}">
HTML;
        echo PHP_EOL;
    }
}

if (! function_exists('check_csrf_token')) {
    #[NoReturn]
    function check_csrf_token(): void
    {
        if ($_POST['_csrf'] !== $_SESSION['csrf_token']) {
            Response::abort();
        }
    }
}
function dd(mixed ...$vars): void
{
    foreach ($vars as $var) {
        var_dump($var);
    }
    die();
}

function info(string $message):void
{
    $path = __DIR__.'/../../storage/logs/log.txt';
    file_put_contents($path, $message.PHP_EOL, FILE_APPEND);
}

function redirect(string $url)
{
    Response::redirect($url);
}

function back()
{
    Response::back();
}