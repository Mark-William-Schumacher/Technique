<?php
/**
 * This function echos a header for the top of your webpage, hopefully saving me time and energy
 *
 * @param  [String] $styleSheet         array of stylesheets example: css/default.css
 * @param  String $title                appears at the top of the page
 * @return null
 */
function createHeader($styleSheet,$title){
    echo "<!DOCTYPE html>\n",
    "<html lang='en'>\n",
    "<head>\n",
        "<meta charset='utf-8'>\n";
    foreach($styleSheet as $file){
        echo "<link rel='stylesheet' href='{$file}'>\n";
    }
    echo "<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700|",
        "Vollkorn|Lobster|Source+Sans+Pro:500' rel='stylesheet' type='text/css'>\n",
    "<title>{$title}</title>\n",
    "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>\n",
    "</head>\n",
    "<body>";
}


function createLogo(){
    echo    "<div class='container'>\n",
                "<div class = 'logo'> Tecnique </div>\n",
                "<div class = 'logo logo-subtext'> Coding Puzzles and Interview prep</div>",
            "</div>\n";
}

function createFooter($rightsReserved){
    // This function will add hearts just outside its parent container
    echo"<footer>",
            "<p><i>Copyright &copy 2014 {$rightsReserved}</i></p>",
            "<p><i>All Rights Reserved</i></p>",
        "</footer>",
        "</body>",
        "</html>";
}

?>
