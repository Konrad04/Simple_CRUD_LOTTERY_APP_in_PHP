<?php include "database.php"; ?>
<?php require_once 'layout.php'; ?>

<?php 
	if (isset($_GET['edit'])) {
	    $id = $_GET['edit'];
        $wpis_id = mysqli_query($con, "SELECT * FROM numberssaved WHERE id=$id");
        $wiersz = mysqli_fetch_assoc($wpis_id);	
	}
?>


    <div class="kontent">
        <header>
            <h1>Edytowanie</h1>
        </header>
        <?php 
            $porownanie = explode(",",$wiersz['numbers']);     
            $imie = $wiersz['fname'];
            $miejsce = $wiersz['place'];
        ?>

        <div>
            <form action="<?php echo htmlspecialchars('process.php')?>" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <h4>6 liczb musi być zaznaczonych</h4>
                
                <fieldset>
                <legend>Liczby</legend>
               
                <?php for($a=1;$a<=49;$a++) : ?>
                    <div class="jedna-siodma_szerokosci">
                    <label>
                        <input type="checkbox" class="checkboxy" name="boxes[]" value=<?php echo $a ?>
                        <?php if(in_array($a,$porownanie)) { echo "checked";}?>><?php echo $a ?> 
                    </label>    
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php endfor; ?>          
                
                </fieldset>

                <div class="info">
                        <p  id="informacjae"></p>
                    </div>

                <fieldset>
                <legend>Dane</legend>
                <div class="polowa_szerokosci">
                <input type="text" name="firstn" id="poleImie_e" value='<?php echo $imie ?>' placeholder="wpisz imię" pattern="[A-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ]{2,}" required/>
                <label class="label_przypomnienie" for="poleImie_e">Dopuszczalne tylko litery, wymagane minimum 2 znaki</label>  
                </div>

                <div class="polowa_szerokosci">
                <input type="text" name="place_where" id="poleMiejsce_e" value='<?php echo $miejsce ?>' placeholder="wpisz miejscowosc" pattern="[A-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ]+[\sA-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ]{2,}" required/>
                <label class="label_przypomnienie" for="poleMiejsce_e">Dopuszczalne tylko litery i spacja, wymagane minimum 3 znaki</label>
                </div>
                </fieldset>
                    
                <div class="przyciski">
                <input type="submit" name="update" id="submit_edit" class="zatwierdzanie" value="Zmien" >
                <button type="reset" class="resetowanie" value="Resetuj">Przywróć poprzednie</button>
                </div>

            </form>      
             
        </div>
        <div>
            <a href="index.php" class="powracanie">Powrót</a>
        </div>
    </div>
    


<script>
$('form').each(function() { this.reset() });



$("button.resetowanie").on('click', function(evt) {
    submit_edit.disabled = false;
    informacjae.hidden = true;
    

});


var maxZaznaczonych = 6; 
    $('input.checkboxy').on('change', function(evt) {
    var zaznaczone = $("input[name='boxes[]']:checked").length;
    informacjae.hidden=false;


    if(zaznaczone< 7 ) {
        document.getElementById("informacjae").innerHTML = "Zaznaczonych liczb: " + zaznaczone;
    }
    
    if(zaznaczone > maxZaznaczonych) {
        this.checked = false;
    }
    
    if(zaznaczone < maxZaznaczonych) {
        submit_edit.disabled = true;
    } 
    
    else {
        submit_edit.disabled = false; 
    }
});

</script>




