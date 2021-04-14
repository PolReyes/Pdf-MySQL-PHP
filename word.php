<?php
include_once './db/mysql_libreria.php';
//date_default_timezone_set('UTC');
date_default_timezone_set('America/Lima');
$name_file='User-list-'.(date('d-m-Y-H:i:s')).'.doc';

$sql = "SELECT * FROM users";
bd_connectar();
$registros = bd_consultar($sql);
bd_desconectar();

header("Content-Type: application/vnd.ms-word; charset=utf-8");
header("Content-type: application/x-msword; charset=utf-8");
header("Content-Disposition: attachment; filename=$name_file"); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body style="font-family: arial; font-size: 12px;">
        <table style="width: 100%;align-content: center" >
            
            <caption><h3> USER LIST</h3></caption>
            <thead>

            <th>NAME</th>
            <th>CITY</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>DATE</th>
        </thead>
        <tbody>
            <?php foreach ($registros as $vista) { ?>
                <tr>
                    <td><?= $vista['name'] ?></td>
                    <td><?= $vista['city'] ?></td>
                    <td><?= strtolower($vista['email']) ?></td>
                    <td><?= $vista['phone'] ?></td>
                    <td><?= $vista['date'] ?></td>
                </tr> <?php } ?>
        </tbody>
    </table><br>
</body>
</html>

