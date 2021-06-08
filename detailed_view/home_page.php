<?php
//require ("header.php");
?>
<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />
        <title>Searchbar</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="universalCSS.css" rel="stylesheet"/>
    </head>
    <body>  
        <div class="container">
            <br>
            <h2 align = "center">Ajax Live Data Search </h2>
            <ul>
            <li><a href="add_page.php">Lisa rakendus</a>
            </li>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Osting</span>
                    <input type="text" name="search" id="search" placeholder="Otsi rakendust..." class="form-control" />
                </div>
            </div>
            <br>
            <div id="result"></div>
        </div>

<script> // script mis loeb reaalajas klaviatuuri vajutusi
    $(document).ready(function(){
        $('#search').keyup(function(){
            var txt = $(this).val();
            if(txt != ''){
                $('$result').html('');
                $.ajax({
                    url: "fetch.php",
                    method: "post",
                    data:{search:txt},
                    dataType:"text",
                    success:function(data)
                    {
                        $('#result').html('data');
                    }
                });
            }
        });
    });
</script>
    </body>
</html>
