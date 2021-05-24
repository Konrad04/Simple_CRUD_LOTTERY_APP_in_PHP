<?php include "database.php"; ?>
<?php require_once 'layout.php'; ?>

<?php 
	if (isset($_GET['read'])) {
		$id = $_GET['read'];
    
        $wpis_id = mysqli_query($con, "SELECT * FROM numberssaved WHERE id=$id");
        $wiersz = mysqli_fetch_assoc($wpis_id);
	}
?>


    <div class="kontent">
        <header>
            <h1>Szczegóły</h1>
        </header>
        <div>
            <form>  
                <h4>Informacje o danym rekordzie</h4>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="dane">
                    <p>Wybrane liczby: <?php echo $wiersz["numbers"]; ?></p>
                    <p>Imię: <?php echo $wiersz["fname"]; ?></p>
                    <p>Miejscowość: <?php echo $wiersz["place"]; ?></p>
                    <p>Czas dodania: <?php echo $wiersz["add_time"]; ?> </p>
                </div>
            </form>
        </div>
        <div>
            <a href="index.php" class="powracanie">Powrót</a>
        </div>
    </div>
    




