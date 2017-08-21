<?php
    require_once 'includes/header.inc.php';
?>

<!DOCTYPE ! html>
<html>
    <head>
        <title>SQL executionner</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- stylesheets -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/main.css">

    </head> 
        
    <body>
        <div class="container">
            <header></header>
            <form>
                <div class="row">
                    <fieldset class="col-xs-12 col-md-6">
                        <label for="file" class="col-xs-12">Sélectionnez le dossier à scanner</label>
                        <input type="text" name="file" id="file" class="col-lg-12" />
                    </fieldset>
                    <fieldset class="col-xs-12 col-md-6">
                        <label for="db-server" class="col-lg-12">Adresse du serveur</label>
                        <input type="text" name="db-server" id="db-server" class="col-lg-12" />
                        <label for="db-port" class="col-lg-12">Port</label>
                        <input type="number" name="db-port" id="db-port" class="col-lg-12" />
                        <label for="db-user" class="col-lg-12">Utilisateur</label>
                        <input type="text" name="db-user" id="db-user" class="col-lg-12" />
                        <label for="db-psw" class="col-lg-12">Mot de passe</label>
                        <input type="text" name="db-psw" id="db-psw" class="col-lg-12" />
                        <label for="db-name" class="col-lg-12">Base de données</label>
                        <input type="text" name="db-name" id="db-name" class="col-lg-12" />
                        <input type="button" class="btn btn-outline-primary btn-block" name="db-tester" id="db-tester" class="col-lg-12" value="Tester la connexion" />
                    </fieldset>
                </div>
                
                <div class="row">
                    <fieldset class="col-xs-12 col-md-6">
                        <label for="all-files" class="col-lg-12">Fichiers du répertoire</label>
                        <input list="all-files">
                        <datalist id="all-files" class="col-lg-12"></datalist>
                    </fieldset>
                    <fieldset class="col-xs-12 col-md-6">
                        <label for="selected-files" class="col-lg-12">Fichiers à exécuter</label>
                        <input list="selected-files">
                        <datalist id="selected-files" class="col-lg-12"></datalist>
                        <input type="button" class="btn btn-outline-primary btn-block" name="process-files" id="process-files" class="col-lg-12" value="Exécuter les scripts SQL" />
                    </fieldset>
                </div>
            </form>    
        </div>
    </body>
    
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/584f23e963.js"></script>   
</html>