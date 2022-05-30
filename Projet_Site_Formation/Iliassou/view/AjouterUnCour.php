<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="./Style/AfficheCours.css?ts=<?=time()?>" />
</head>
<body>
      <div>

            <form method="post" action=""   enctype="multipart/form-data" >
            
            <fieldset class="form">
              <legend>Mon formulaire de creation d'un cours </legend>

                        <p>
                        <label for=""> Nom du Cours  </label>
                            <input type="text" name="nom">
                        </p>

                        <p>
                        <label for=""> Description du cours </label>
                            <input type="text" name="descript">
                        </p>

                        <p>
                        <label for=""> Ajouter une image </label>
                            <input type="file" name="img">
                        </p>

                   
                    <p>    <input class="btn" type="submit" value="Envoyer" />
                    </p>
                </fieldset> 
            </form>
        </div>
    </body>
</html>