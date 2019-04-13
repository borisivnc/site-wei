<?php
    require('includes/db/BusTable.php');

    if(isset($_GET['seat']))
    {
        $bm = new BusTableManager();
        $bm->bookSeat(1, 1, $_GET['seat']);
    }


 ?>
