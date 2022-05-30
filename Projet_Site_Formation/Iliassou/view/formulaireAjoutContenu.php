
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="./Style/AfficheCours.css?ts=<?=time()?>" />

</head>
<body>
      <div>
            <form method="post" action=""  enctype="multipart/form-data" >
            <fieldset class="form">
                    <legend>Formulaire pour ajouter un contenu </legend>
                    
                    <p>
                            <label for="">Ajouter fichier </label>
                            <input type="file" name="fichier" >
                        </p> 

                        <p>
                            <label for="">Ajouter un commentaire </label>
                            <input type="text" name="typeFichier" >
                        </p>


                        <input class="btn" type="submit" value="Envoyer"/>
                    </p>
                </fieldset> 
            </form>

        </div>
    </body>
</html>
