<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-color: white;
        }

        form {
            background-color: whitesmoke;
            width: 40vw;
            margin: 30vh auto;
            padding: 40px;
            border-radius: 20px;

            h3 {
                font-size: 23px;
            }

            input {
                margin-top: 20px;
            }

            button {
                width: 100%;
                border: none;
                color: white;
                padding: 10px;
                margin: 30px 0;
                border-radius: 12px;
                font-weight: 600;
                background-color: darkslategrey;
            }
        }

        @media screen and (max-device-width: 800px) {
            form {
                width: 95vw;
                margin: 10vh auto;
                padding: 20px 5px;

                * {
                    margin: 30px 0;
                    ;
                    padding: 15px;
                }
            }
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation e-mail | Cusine </title>

</head>

<body>

    <?php
    include('../../sendmail.php');

    if (file_exists('../../data/recette-utilisateur.xml')) {
        $xml = simplexml_load_file('../../data/recette-utilisateur.xml');
    } else {
        exit('Failed to open test.xml.');
    }

    if (!empty($_POST["email"]) && !empty($_GET['e'])) {
        if (password_verify($_POST["email"], $_GET['e'])) {
            for ($i = 0; $i < count($xml->liste_utilisateur->utilisateur); $i++) {
                if ($_POST['email'] == $xml->liste_utilisateur->utilisateur[$i]->email) {
                    $xml->liste_utilisateur->utilisateur[$i]->isEmailChecked  = "true";

                    $xml->asXML();
                    $xml->asXML('../../data/recette-utilisateur.xml');


                    $subjet = "Mail a été confirmé avec succès";
                    $contenuMail = "Mail a été confirmé avec succès.";
                    $altbody = "Mail a été confirmé avec succès";
                    sendmail("safinazylm@gmail.com", $subjet, $contenuMail, $altbody);
                    
                    header('Location: ../connexion.php');
                    exit();
                }
            }
        }
        else{
            echo "email incorrecte!";
        }
    }
    ?>

    <form action="#" method="post">

        <h3>Saisissez votre email.</h3>
        <input class="form-control" name="email" />
        <button type="submit">Valider</button>
    </form>

</body>

</html>