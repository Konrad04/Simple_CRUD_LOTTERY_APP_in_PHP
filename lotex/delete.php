<?php include "database.php"; ?>
<?php require_once 'layout.php'; ?>

<?php 
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		$record = mysqli_query($con, "SELECT * FROM numberssaved WHERE id=$id");
	}
?>


    <div class="kontent">
        <header>
            <h1>Usuwanie</h1>
        </header>
            <div>
                <h4>Czy na pewno chcesz usunąć te liczby?</h4>
                <form action="process.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <div class="przyciski">
                    <input type="submit" class="resetowanie" name="usun" value="Tak">
                    <a href="index.php" class="zatwierdzanie">Nie</a>
                    </div>
                </form>
            </div>
            
    </div>   
      




