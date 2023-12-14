<style>
    .footer {
        margin-top: 20px;
        padding: 70px;
        background-color: black;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        align-items: center;
        justify-content: space-evenly;

        h1,
        p {
            color: white;
        }
        a {
            text-decoration: none;
        }
    }
</style>
<div class="footer">
    <div>
        <h1>Categorie</h1>
        <?php foreach ($tab['sitecuisine']['liste_categorie']['categorie'] as $categ) { ?>
            <a href="categorie.php?nom=<?php echo $categ; ?>">
                <p><?php echo $categ; ?></p>
            </a>
        <?php } ?>
    </div>
    <div>
        <h1>Cuisine du monde </h1>
        <?php foreach ($tab['sitecuisine']['liste_cuisine_pays']['pays'] as $pays) { ?>
            <a href="pays.php?nom=<?php echo $pays['nom']; ?>">
                <p><?php echo $pays['nom']; ?></p>
            </a>
        <?php } ?>
    </div>

    <div>
        <h1>Headline</h1>
        <p>Sample text. Click to select the Text Element.</p>

    </div>
</div>