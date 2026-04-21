<?php
require_once '../config/Database.php';

// Implementação simples de roteamento
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', trim($uri, '/'));

$controllerName = 'DashboardController';
$actionName = 'index';

if (!empty($uri[0])) {
    $controllerName = ucfirst($uri[0]) . 'Controller';
}
if (!empty($uri[1])) {
    $actionName = $uri[1];
}

$controllerFile = "../app/controllers/{$controllerName}.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();

    if (method_exists($controller, $actionName)) {
        // Obter id da URL se houver (ex: paciente/edit/1)
        $id = isset($uri[2]) ? $uri[2] : null;
        $controller->$actionName($id);
    } else {
        echo "Ação não encontrada: 404";
    }
} else {
    echo "Página não encontrada: 404";
}
