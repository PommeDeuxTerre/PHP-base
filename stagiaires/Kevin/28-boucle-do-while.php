<?php
require 'array.php';

$depFr = array_values($depFr);
$nbPays = count($depFr);
$nbPaysParPage = 20;
$nbPages = ceil($nbPays / $nbPaysParPage);
$page = 1;
if(!empty($_GET["pg"]) && is_numeric($_GET["pg"])){
    $page = intval($_GET["pg"]);
    if($page > $nbPages || $page < 1) $page = 1;
}
$depFrPageHTML = "";
$i = ($page - 1) * $nbPaysParPage;
do{
    if($i >= $nbPays) break;
    $depFrPageHTML .= "<li>" . $depFr[$i++] . "</li>";
}while($i < $nbPaysParPage * $page);

$navLinkHTML = "";
$i = 1;
do{
    $navLinkHTML .= "<a href='?pg=$i'>Page ".$i++."</a>";
}while($i <= $nbPages);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        nav a, footer a{
            margin-left: 2rem;
        }
        ol li{
            font-size: 1.25rem;
            
            &:nth-child(even){
                color: red;
            }
        }
    </style>
    <title>28-boucle-do-while</title>
</head>
<body>
    <h1>28-boucle-do-while</h1>
    <h2>Les régions de France : Page <?= $page ?></h2>
    <nav>
        <?= $navLinkHTML ?>
    </nav>
    <ol>
        <?= $depFrPageHTML ?>
    </ol>
    <footer>
        <?= $navLinkHTML ?>
    </footer>
</body>
</html>
