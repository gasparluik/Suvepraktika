<?php
//require ("header.php");
?>
<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />
        <title>Searchbar</title>
        <script src ="jquery.js"></script>
        <script src ="js/bootstrap.js"></script>
        <link href="universalCSS.css" rel="stylesheet"/>
    </head>
    <body>  
        <div class="container">
            <br>
            <h2 align = "center">Ajax Live Data Search </h2>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Osting</span>
                    <input type="text" name="search" id="search" placeholder="Otsi rakendust..." class="form-control" />
                </div>
            </div>
            <br>
            <div id="result"></div>
        </div>
    </body>
</html>

<script>
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