<?php include "database.php"; ?>
<?php require_once 'layout.php'; ?>

<?php
    $query = "SELECT * FROM numberssaved";
    $wpisy = mysqli_query($con, $query);
    
?>

    <div class="kontent">
        <header>
            <h1>LOTEX</h1>
            
           
        </header>
        <nav>
        <div class="przyciski">
            <a href="los.php" class="zatwierdzanie" id="nav_los">Wylosuj liczby</a>
        
            <a href="create.php" class="zatwierdzanie" id="nav_create">Dodaj nowe numery</a>
        </div>
         </nav>

         <div id="wylosowane_index" class="lista">
        <?php
            if(isset($_POST['wylosowana'])) {
                $wylosowane = $_POST['wylosowana'];
                echo "Wylosowane liczby to: $wylosowane";
               
                } else {
                    $wylosowane=false;
                    echo 'Brak wylosowanych';
                };
        ?> 
        </div>
            
        <div id="wpisy" >
        <h4 id="h_glowna">Zapisane liczby</h4>
            <ul>   
                <?php
                    $grats = false;
                    while($wiersz = mysqli_fetch_assoc($wpisy)) : ?>
                        <li class="lista<?php if($wiersz['numbers'] == $wylosowane){ echo ' lista_wip';}?>">
                            <?php echo $wiersz["numbers"]; ?>
                            <?php if($wiersz["numbers"] == $wylosowane) {
                                echo " WYGRANA";
                                $grats = true;
                                
                            }
                            ?> 
                            <a class='glyphicon pull-right glyphicon-trash' href="delete.php?del=<?php echo $wiersz['id'];?>"></a>
                            <a class='glyphicon pull-right glyphicon-pencil' href="edit.php?edit=<?php echo $wiersz['id'];?>"></a>
                            <a class='glyphicon pull-right glyphicon-star' href="read.php?read=<?php echo $wiersz['id'];?>"></a>
                        </li>
                    <?php endwhile; ?>
            </ul>   
        </div>
    </div>
    
