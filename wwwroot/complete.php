<?php
session_start();
session_destroy();
include "php/buildingTools.php";
include "php/querys.php";
$scoreBoard   = getTop20();  // mysqli object , must extract it as rows
$styleSheets  = array("css/default.css");
createHeader($styleSheets,"Thanks for Participating");
createlogo();

echo "<div class='container'>",
          "<form method='post' action='index.php'>",
            "<button type='submit' id='tryAgain'> Try Again </button>",
          "</form>",
      "</div>";
echo "
    <h1 class='container'> High Scores </h1>
    <table cellspacing='0'>
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Score</th>
          </tr>
        </thead>
        <tbody>";
$even= false;
foreach($scoreBoard as $row){
  if ($even){
    echo "<tr class='even'>";
  }
  else{
    echo "<tr>";
  }
  echo "  <td>{$row['first_name']}</td>
          <td>{$row['last_name']}</td>
          <td>{$row['score']}</td>
        </tr>
  ";
}
echo "
      </tbody>
      </div>
      </body>
      </html>";
