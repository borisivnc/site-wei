<?php

    require('db/BusTable.php');

    function generate_bus($bus_id)
    {
        $bm = new BusTableManager();

        $infos = $bm->getBusInfos($bus_id);

        $seats = $infos['nb_places'];

        $place_actuelle = 0;

        for($k = 0; $k < 2; $k++)
        {
            for($i = 0; $i < 2; $i++)
            {
                for($j = 0; $j < $seats / 4; $j++)
                {
                  $taken = false;
                  $place_actuelle++;

                  foreach($infos['places_prises'] as $place_prise)
                  {
                      if($place_prise == $place_actuelle)
                          $taken = true;
                  }
                  if($taken)
                    echo '<div class="seat taken"><div class="seat-a"><div class="seat-b"></div></div></div>';
                  else
                    echo '<button onclick="bookSeat(' . $place_actuelle . ')" class="seat"><div class="seat-a"><div class="seat-b"></div></div></button>';
                }

                echo '<div class="clear"></div>';
            }

            echo '<br />';
            echo '<br />';
            echo '<br />';
        }



    }

?>
