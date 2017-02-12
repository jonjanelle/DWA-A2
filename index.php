<?php require('BoggleDriver.php');?>
<!doctype html>
<html>
  <head>
    <!-- Latest compiled and minified jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles.css">
    <title>Boggle Solver</title>
  </head>

  <body>
    <div id="container">

      <h1 class="header">Boggle Processor</h1>
      <hr />

      <div class="center-wrapper">

        <div id="mainform">
          <form method="GET" action="index.php">
            <div class="form-group">
              <legend><span class="glyphicon glyphicon-search"></span> Search for word:</legend>

              <input type="text" class="form-control" name="word_search" autofocus>
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="highlight" checked="checked">
                Highlight word on board if found?
              </label>

              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="trackwords">
                Keep track of words found?
              </label>

            </div>
            <div class="form-group">
              <legend><span class="glyphicon glyphicon-plus"></span> Other Options:</legend>
              <label class="form-check-label rad">
                <input type="radio" class="form-check" name="options" value="shuffle">
                Shuffle board
              </label>
              <label class="form-check-label rad">
                <input type="radio" class="form-check" name="options" value="three-letter">
                Show all 3-letter words
              </label>
              <label class="form-check-label rad">
                <input type="radio" class="form-check" name="options" value="four-letter">
                Show all 4-letter words
              </label>
              <label class="form-check-label rad">
                <input type="radio" class="form-check" name="options" value="five-letter">
                Show some 5-letter words
              </label>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
          </form>
        </div>

        <div id="boggle-board">
          <?php
            //output the board
            if (isset($_SESSION["board"])) {

              foreach($_SESSION["board"]->cubes as $cube) {
                echo "<div class=\"boggle-square ".$cube->color."\">".$cube->getUpLetter()."</div>";
              }
            }
           ?>
        </div>

      </div>

      <div id="result-tag">Results:</div>
      <div class="alert <?=$alert_color?> shadowbox" id="result_well">
        <?php
          if (isset($_SESSION["resultString"])) {
            echo $_SESSION["resultString"];
          }
        ?>

      </div>

    </div>
  </body>
</html>
