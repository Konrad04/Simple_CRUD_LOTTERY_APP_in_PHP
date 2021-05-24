<?php include "database.php"; ?>
<?php require_once 'layout.php'; ?>

    <div class="kontent">
        <header> 
            <h1>Dodanie liczb</h1>
        </header>
            <div>
                <form action="<?php echo htmlspecialchars("process.php")?>" method="post">
                   
                    <h4>Proszę wybrać 6 liczb</h4>
                    
                    <fieldset>
                    <legend>Liczby</legend>
                    
                    <?php for($a=1;$a<=49;$a++) : ?>
                        <div class="jedna-siodma_szerokosci">
                        <label class="labelka_boxy">
                            <input type="checkbox" class="checkboxy" name="boxes[]" value=<?php echo $a ?>><?php echo $a ?>
                            <span class="checkboxy"> </span>
                        </label>   
                        </div>
                    <?php endfor; ?> 
                    
                    </fieldset>

                    <div class="info">
                        <p  id="informacja"></p>
                    </div>

                    <fieldset>
                    <legend>Dane</legend>
                    <div class="polowa_szerokosci">
                        <input type="text" id="poleImie_c" class="polaTekstowe" name="firstn" placeholder="Wpisz imię"  pattern="[A-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ]{2,}" required disabled  />
                        <label class="label_przypomnienie" for="poleImie_c">Dopuszczalne tylko litery, wymagane minimum 2 znaki</label>                
                    </div>
                    <div class="polowa_szerokosci">
                        <input type="text" id="poleMiejsce_c" class="polaTekstowe" name="place_where" placeholder="Wpisz miejscowość"  pattern="[A-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ]+[\sA-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ]{2,}" required disabled/>
                        <label class="label_przypomnienie" for="poleMiejsce_c">Dopuszczalne tylko litery i spacja, wymagane minimum 3 znaki</label>
                    </div>    
                    </fieldset>
                    <div class=przyciski>
                    <input type="submit" class="zatwierdzanie" name="zatwierdz" value="Dodaj" id="submit_create" disabled>
                    <button type="reset" class="resetowanie"  value="Resetuj">Zresetuj</button>
                    </div>
                </form>
               
            </div>

            <div>
                <a href="index.php" class="powracanie">Powrót</a>
            </div>
    </div>

   


<script>
$("button.resetowanie").on('click', function(evt) {
    submit_create.disabled = true;
    informacja.hidden=true;
});

var maxZaznaczonych = 6;  
    $('input.checkboxy').on('change', function(evt) {
    var zaznaczone = $("input[name='boxes[]']:checked"); 
    informacja.hidden=false;

    if(zaznaczone.length < 7) {
        document.getElementById("informacja").innerHTML = "Zaznaczonych liczb: " + zaznaczone.length;
    }
    
    if(zaznaczone.length > maxZaznaczonych) {
        this.checked = false;
    }
    
    if(zaznaczone.length < maxZaznaczonych) {
        poleImie_c.disabled = true;
        poleMiejsce_c.disabled = true;
        submit_create.disabled = true;
    } 
    
    else {
        
        poleImie_c.disabled = false;
        poleMiejsce_c.disabled = false;
        submit_create.disabled = false; 
    }
});

</script>
       




