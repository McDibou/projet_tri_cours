<?php

use Adrien\App;
use Adrien\Auth\Session;
use Adrien\Autoloader;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'Autoloader.php';
require_once dirname(__DIR__) .DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'card.php';

Autoloader::registre();
$session = Session::getInstance();
$app = App::getInstance();

require_once dirname(__DIR__) .DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'header.php';

$admin_pages = [
    "space.admin" => "admin/space.php",

    "insert.content" => "admin/content/insertContent.php",
    "edit.content" => "admin/content/editContent.php",
    "delete.content" => "admin/content/deleteContent.php",

    "edit.category" => "admin/category/editCategory.php",
    "insert.category" => "admin/category/insertCategory.php",
    "delete.category" => "admin/category/deleteCategory.php",

    "edit.subject" => "admin/subject/editSubject.php",
    "insert.subject" => "admin/subject/insertSubject.php",
    "delete.subject" => "admin/subject/deleteSubject.php",

    "edit.format" => "admin/format/editFormat.php",
    "insert.format" => "admin/format/insertFormat.php",
    "delete.format" => "admin/format/deleteFormat.php",

    "space.user" => "user/spaceUser.php",

    "insert.content.user" => "user/content/insertContentUser.php",
    "edit.content.user" => "user/content/editContentUser.php",
    "delete.content.user" => "user/content/deleteContentUser.php",

    "update.favory" => "user/favory/updateFavory.php",

    "profil.user" => "global/profil/profil.php",
    "dashboard" => "global/dashboard.php",
    "search" => "global/search.php",
];

$public_pages = [
    "favory.public" => "favory.php",
    "category.public" => "category.php",
    "subject.public" => "subject.php",

    "login.user" => "profil/login.php",
    "disconnect.user" => "profil/disconnect.php",
    "search" => "search.php",
    "dashboard" => "dashboard.php",
];

if (!isset($_GET['p'])) {
    include "../controller/global/home.php";
} else {
    $p = strtolower($_GET['p']);
    if ($session->verify('role') & array_key_exists($p, $admin_pages)) {
        include "../controller/" . $admin_pages[$p];
    } else if (array_key_exists($p, $public_pages)) {
        include "../controller/global/" . $public_pages[$p];
    } else {
        include "../controller/global/home.php";
    }
}

require_once dirname(__DIR__) .DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'footer.php';