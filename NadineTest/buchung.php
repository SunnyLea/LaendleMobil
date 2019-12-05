<!DOCTYPE html>
<html>
        <head>
                <link rel="stylesheet" href="css-grid.css">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            
                <meta charset="UTF-8">
                <title>Ländlemobil</title>
                <style type="text/css">
                    body {
                        font-family: Arial, Helvetica, sans-serif;
                        font-size: 150%;
            
                    }
            
                    input {
                        font-family: Arial, Helvetica, sans-serif;
                        font-size: 150%;
                    }
            
                    select {
                        font-family: Arial, Helvetica, sans-serif;
                        font-size: 150%;
                    }
            
                    button {
                        font-family: Arial, Helvetica, sans-serif;
                        font-size: 120%;
                    }
                </style>
            </head>

            <body>

                    <div class="fullscreen">
                            <div class="grid-container">
                                <div class="headerBar">
                                    <img src="../img/LogoWEBFertigRichtig.png" style="width: 40%;height: 250px;">
                    
                                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                                        <!--<a class="navbar-brand" href="#"></a>-->
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                          <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                          <div class="navbar-nav">
                                            <a class="nav-item nav-link active" href="index.html">Home <span class="sr-only">(current)</span></a>
                                            <a class="nav-item nav-link active" href="Fahrt_anbieten.php">Fahrt anbieten</a>
                                            <a class="nav-item nav-link active" href="aboutUs.html">Über uns</a>
                                            <a class="nav-item nav-link active" href="imprint.html">Impressum</a>
                                          </div>
                                        </div>
                                      </nav>
                    
                    
                                      <br/>
                                      
                                    
                                </div>
                    
                                <div class="content">
                                    <br/>
                                    <h2>Ihre Buchung</h2>
                    
                                    <br/>
                                    <?php
                                    echo $buchungsdaten;
                                    ?>
                                    <br />
                    
                                </div>
                            </div>
                    
                        </div>
                    
                        <script type="text/javascript" src="functions.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                    

            </body>

</html>