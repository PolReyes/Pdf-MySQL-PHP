<?php
include_once './db/mysql_libreria.php';
$sql = "SELECT * FROM users" ;
bd_connectar();
$registros = bd_consultar($sql);
bd_desconectar();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>pdfMySQL</title>
    </head>
    <body>
        
        <div class="container">
             <h2>User List</h2>
            <!-- Trigger the modal with a button -->
            <a href="pdf.php" target="_top" download ><button type="button" class="btn btn-primary " ><span class="glyphicon glyphicon-save"></span>  Pdf</button></a>
            <a href="excel.php" target="_top"><button type="button" class="btn btn-primary " ><span class="glyphicon glyphicon-save"></span>  Excel</button></a>
            <a href="word.php" target="_top"><button type="button" class="btn btn-primary " ><span class="glyphicon glyphicon-save"></span>  Word</button></a>
            <br><br>
            <div class="table-responsive">          
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>city</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>date</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($registros as $vista) { ?>
                            <tr> 
                                <td><?= $vista['id'] ?></td>
                                <td><?= $vista['name'] ?></td>
                                <td><?= $vista['city'] ?></td>
                                <td><?= strtolower($vista['email']) ?></td>
                                <td><?= $vista['phone'] ?></td>
                                <td><?= $vista['date'] ?></td>
                            </tr> <?php } ?>        
                        </tbody>
                </table>

            </div>
            </div>
    </body>
</html>
