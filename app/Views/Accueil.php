<!DOCTYPE html>
<html lang="fr-Fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="Style.css" media="all" />
        <title>Accueil</title>
    </head>
    <style>
        .footer {
            height: 75px;
        }
        #right {
            font-size: 20px;
            text-align: center;
            width: 1000px;
        }
        #indication {
            margin-top: 40px;
            color: white;
            background-color: black;
            font-size: 20px;
        }
    </style>
    <body>
        <div class="nav">
            <?php echo view('template/header.php') ?>
        </div>
        <div class="Accueil">
            <h4>se réferrer au Note Patch actuel disponible depuis la barre de navigation</h4>
            <div class="Corp">
                <p>
                <h2>TRAVAIL EN COUR ...</h2>
                </p>
                <div class="DernierAjout">
                    <div>

                    </div>
                </div>

                <div class="DerniereRecherche">
                    <div>

                    </div>
                </div>       
            </div>
        </div>
        <div class="footer">
            <?php echo view('template/footer.php') ?>
        </div>
    </body>
</html>