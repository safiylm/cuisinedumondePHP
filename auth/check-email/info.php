<!DOCTYPE html>
<html>

<head>


    <style>
        #div-info {
            margin: 15% auto;
            text-align: center;
            min-width: 700px;
            min-height: 50vh;
            padding: 20vh;
            background-color: whitesmoke ;
            font-size: 22px;
            color: darkslategrey !important;
            font-weight: 600;
        }
    </style>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aller confirmer son email</title>
    <script>
        tempsInitial = 15

        setInterval(() => {
            if (tempsInitial > 0) {
                tempsInitial--;
                document.getElementById("tempsrestant").innerText = tempsInitial;

            } else {
                // Simulate a mouse click:
                window.location.href = "../connexion.php";

            }

        }, 1000);
    </script>
</head>

<body>


    <div id="div-info">
        <h3>Un mail de confirmation de votre e-mail vous a été envoyé dans votre boite e-mail.</h3>
        <p>Veuillez confirmez votre e-mail en un click.</p>
        <p>Redirection dans <span id='tempsrestant'>30</span> secondes</p>
    </div>
</body>

</html>