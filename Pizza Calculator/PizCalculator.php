<?php

  define("LARGE_SLIZE", 8); //Number of Slizes in a Large Sized Pizza
  define("MEDIUM_SLIZE", 6); //Number of Slizes in a Medium Sized Pizza
  define("SMALL_SLIZE", 4); //Number of Slizes in a Small Sized Pizza

  function getPizOrder($numSlices) {
      $numLg = 0;
      $numMd = 0;
      $numSm = 0;

      echo "Total Slices: $numSlices <br />";

      //Get Number of Large Pizzas
      if ($numSlices >= LARGE_SLIZE) {
          $numLg = intval($numSlices/LARGE_SLIZE);
          $numSlices %= LARGE_SLIZE;
      } else if ($numSlices == 7) {
          $numLg++;
          $numSlices -= $numSlices;
      }

      //Get Number of Medium Pizzas
      if ($numSlices >= MEDIUM_SLIZE) {
          $numMd = intval($numSlices/MEDIUM_SLIZE);
          $numSlices %= MEDIUM_SLIZE;
      } else if ($numSlices == 5) {
          $numMd++;
          $numSlices -= $numSlices;
      }

      //Get Number of Small Pizzas
      if ($numSlices >= SMALL_SLIZE) {
          $numSm = intval($numSlices/SMALL_SLIZE);
          $numSlices %= SMALL_SLIZE;
      } else if ($numSlices > 0) {
          $numSm++;
          $numSlices -= $numSlices;
      }

      echo "Large Pizzas: $numLg <br />";
      echo "Medium Pizzas: $numMd <br />";
      echo "Small Pizzas: $numSm <br />";
  }

?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Codulab Challenge</title>
    <style type="text/css">
        #pzCalc {
          width: 40%;
          height: auto;
          border: 2px solid #cfd8dc;
          border-radius: 4px;
          margin: 5% auto;
          padding: 0;
        }
        #pzcalc-header {
          background-color: #f5f5f5;
          padding: 1px 15px;
          border-bottom: 2px solid #cfd8dc;
          border-top-left-radius:3px;
          border-top-right-radius:3px;
          font-family: "Myriad Pro";
        }
        #pzcalc-body {
          padding: 20px;
          font-family: "Comic Sans Ms", cursive;
          text-align: center;
        }
        label {
          width: 20%;
        }
        input {
          width: 70%;
          height: 25px;
          border: 2px solid #cfd8dc;
          border-radius: 2px;
          margin-left: 5px;
          margin-top: 10px;
        }
        .pzcalc-info {
            font-size: 14px;
        }
        button {
          margin: 0 auto;
          height: 30px;
          width: 80px;
          font-size: 15px;
          cursor: pointer;
          border: none;
          border-radius: 5px;
          background-color: #004d40;
          color: #fff;
        }
        button:hover {
          background-color: #4db6ac;
        }
        #pzcalc-response {
          margin: 0 auto;
          background-color: #f5f5f5;
          border: 2px solid #cfd8dc;
          width: 40%;
          height: auto;
          border-radius: 5px;
          padding: 10px;
          font-family: "Myriad Pro";
        }
    </style>
  </head>
  <body>
    <div id="pzCalc">
      <form action="" method="post">
          <div id="pzcalc-header">
            <h2>Pizza Calculator</h2>
          </div>
          <div id="pzcalc-body">
              <label for="oneSlice">1 Slice of Pizza: </label>
              <input type="number" id="oneSlice" name="oneSlice" />
              <span class="pzcalc-info">People that eats 1 slice of pizza</span>
              <br />
              <label for="twoSlices">2 Slices of Pizza: </label>
              <input type="number" id="twoSlices" name="twoSlices" />
              <span class="pzcalc-info">People that eats 2 slices of pizza</span>
              <br />
              <label for="threeSlices">3 Slices of Pizza: </label>
              <input type="number" id="threeSlices" name="threeSlices" />
              <span class="pzcalc-info">People that eats 3 slices of pizza</span>
              <br />
              <label for="fourSlices">4 Slices of Pizza: </label>
              <input type="number" id="fourSlices" name="fourSlices" />
              <span class="pzcalc-info">People that eats 4 slices of pizza</span>
              <br /><br />
              <button type="submit">Calculate</button>
          </div>
      </form>
    </div>
    <div id="pzcalc-response">

    <?php
        //When the user clicks on the submit button, it calculates the number of large, medium and small pizzas to order
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $oneSlice = intval($_POST['oneSlice']); //number of people that eats one slice
          $twoSlices = intval($_POST['twoSlices']); //number of people that eats two slices
          $threeSlices = intval($_POST['threeSlices']); //number of people that eats three slices
          $fourSlices = intval($_POST['fourSlices']); //number of people that eats four slices
          getPizOrder(($oneSlice + ($twoSlices*2) + ($threeSlices*3) + ($fourSlices*4)));
        }

    ?>

    </div>
  </body>
</html>
