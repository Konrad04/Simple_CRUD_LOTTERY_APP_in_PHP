<?php include "database.php"; ?>
<?php require_once 'layout.php'; ?>



    <div class="kontent">
        <header>
            <h1>Losowanie</h1>
        </header>
        <div>
        <h4>W celu wylosowania kliknij przycisk losuj, a nastepnie przkeaż.</h4>
           <div id="info_wylosowane" class="info">
            <?php
                    $wylosowane=0;
                    if(isset($_POST['losowanie'])) { 
                        $zakres = range(1, 7);
                        shuffle($zakres); 
                        $wypadly = array_slice($zakres,  -6); 
                        sort($wypadly);
        
                        $wylosowane = implode(",", $wypadly); 
                        echo "Wylosowane liczby to: $wylosowane";
                    } 
                    
                ?> 
            </div>

            <div class=przyciski>
            <form method="post"> 
                <input type="submit" class="zatwierdzanie" id="losow" name="losowanie" value="Losuj" 
                <?php if($wylosowane!=null) { echo "hidden";}?>> 
            </form> 
            <form method="post"  action="index.php"> 
                <input type="hidden" name='wylosowana' value="<?php echo $wylosowane ?>">
                <input type="submit" class="zatwierdzanie" id="submit_przekaz" name="losowanko" value="Przekaż" 
                <?php if($wylosowane==null) { echo "hidden";}?>> 
            </form> 
        </div>
            </div>
    
        <div>
            <a href="index.php" class="powracanie">Powrót</a>
        </div>
    </div> 
      

