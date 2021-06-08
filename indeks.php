<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kasutaja(te) kustutamine</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="validation.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        #thead>tr>th{ color: white; }
    </style>
</head>
<body>
<div style="margin-top: 20px;padding-bottom: 20px;">
    <center>
        <h3>Vali kasutaja(d) mida soovid kustutada</h3>
    </center>
</div>
<div class="container">
    <form action="delete-script.php" method="post">
    <table class="table table-bordered">
        <thead id="thead" style="background-color:#1573ff">
        <tr>
            <th></th>
            <th>E-mail/kasutajanimi</th>
            <th>Eesnimi</th>
            <th>Perekonnanimi</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        require("config.php");
        require("common.php");
        $common = new Common();
        $records = $common->getAllRecords($connection);
        if ($records->num_rows>0){
            $sr = 1;
            while ($record = $records->fetch_object()) {
                $userid = $record->user_id;
                $username = $record->username;
                $firstname = $record->firstname;
                $lastname = $record->lastname;?>
                <tr>
                    <td><?php echo $sr;?></td>
                    <td><?php echo $username;?></td>
                    <td><?php echo $firstname;?></td>
                    <td><?php echo $lastname;?></td>
                    <td><input type="checkbox" name="recordsCheckBox[]" id="recordsCheckBox" value="<?php echo $userid;?>"></td>
                </tr>
                <?php
                $sr++;
            }
        }
        ?>
        </tbody>
    </table>
        <input type="submit" name="deleteBtn" id="deleteBtn" class="btn btn-success" onclick="return validateForm();" value="Kustuta valitud kasutaja(d)" style="float: right"/>
        <input type="button" name="backBtn" id="backBtn" class="btn btn-back" value="Mine tagasi" style="float: right"/>
    </form>
</div>
</body>
</html>