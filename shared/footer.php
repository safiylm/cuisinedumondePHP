
<?php
function footer($tab)
{
    echo
    '<div class="footer">
            <div>
                <h1>Categorie</h1>';

    foreach ($tab["sitecuisine"]["liste_categorie"]["categorie"] as $categ) {
        echo   '<a href="./categorie/categorie.php?nom=' . $categ . '">
                        <p>' . $categ . '</p>
                    </a>';
    }
    echo '</div>
            <div>
                <h1>Cuisine du monde </h1>';
    foreach ($tab["sitecuisine"]["liste_cuisine_pays"]["pays"] as $pays) {
        echo '<a href="./categorie/pays.php?nom='. $pays["nom"]. '">
                        <p>'. $pays["nom"].'</p>
                    </a>';
    }
    echo ' </div>
        
            <div>
                <h1>Headline</h1>
                <p>Sample text. Click to select the Text Element.</p>
        
            </div>
        </div>';
}

function footer_($tab)
{
    echo
    '<div class="footer">
            <div>
                <h1>Categorie</h1>';

    foreach ($tab["sitecuisine"]["liste_categorie"]["categorie"] as $categ) {
        echo   '<a href="../categorie/categorie.php?nom=' . $categ . '">
                        <p>' . $categ . '</p>
                    </a>';
    }
    echo '</div>
            <div>
                <h1>Cuisine du monde </h1>';
    foreach ($tab["sitecuisine"]["liste_cuisine_pays"]["pays"] as $pays) {
        echo '<a href="../categorie/pays.php?nom='. $pays["nom"]. '">
                        <p>'. $pays["nom"].'</p>
                    </a>';
    }
    echo ' </div>
        
            <div>
                <h1>Headline</h1>
                <p>Sample text. Click to select the Text Element.</p>
        
            </div>
        </div>';
}
?>