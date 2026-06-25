<?php
// --- LOGICA SERVER SIDE ---
$pin_segreto = "1234";
$valore_display = "";
$colore_sfondo = "white";

// Controlliamo se è stato inviato il modulo tramite il nome dell'input "display"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['display'])) {
    $pin_utente = $_POST['display'];

    if ($pin_utente === $pin_segreto) {
        $valore_display = "APERTA";
        $colore_sfondo = "#90EE90"; // Verde
    } else {
        $valore_display = "ERR";
        $colore_sfondo = "#ff4d4d"; // Rosso
    }
}
?>

<html>
    <head>
        <title>Cassaforte PHP</title>
    </head>
    <body>
        <div style="border: 1px solid black; height: 700px; width: 600px">
            <div style="border: 1px solid black; height: 500px; width: 400px; margin: 0 auto; margin-top: 100px">
                <div style="border: 1px solid black; height: 350px; width: 110px; margin: 0 auto; margin-top: 100px">
                    
                    <form method="POST">
                        <!-- Usiamo le variabili PHP corrette per valore e colore -->
                        <input id="display" name="display" style="width: 100px; background-color: <?php echo $colore_sfondo; ?>;" value="<?php echo $valore_display; ?>" readonly>
                        
                        <!-- I tuoi bottoni originali con getElementById -->
                        <button type="button" onclick="pulisci(); document.getElementById('display').value+='1'"> <div> 1 </div> </button><!--
                        --><button type="button" onclick="pulisci(); document.getElementById('display').value+='2'"> <div> 2 </div> </button><!--
                        --><button type="button" onclick="pulisci(); document.getElementById('display').value+='3'"> <div> 3 </div> </button>
                        
                        <button type="button" onclick="pulisci(); document.getElementById('display').value+='4'"> <div> 4 </div> </button><!--
                        --><button type="button" onclick="pulisci(); document.getElementById('display').value+='5'"> <div> 5 </div> </button><!--
                        --><button type="button" onclick="pulisci(); document.getElementById('display').value+='6'"> <div> 6 </div> </button>
                        
                        <button type="button" onclick="pulisci(); document.getElementById('display').value+='7'"> <div> 7 </div> </button><!--
                        --><button type="button" onclick="pulisci(); document.getElementById('display').value+='8'"> <div> 8 </div> </button><!--
                        --><button type="button" onclick="pulisci(); document.getElementById('display').value+='9'"> <div> 9 </div> </button>
                        
                        <button type="button" onclick="pulisci(); document.getElementById('display').value+='0'"> <div> 0 </div> </button>
                        
                        <button type="button" onclick="document.getElementById('display').value=document.getElementById('display').value.slice(0,-1);"><div> C </div></button>
                
                        <button type="submit" style="background-color:green; color:white; width:100px; cursor:pointer; margin-top: 5px;">
                            <div> PROVA </div>
                        </button>
                    </form>

                </div>
            </div>
        </div>

        <script>
            // Questa funzione serve a pulire il display se c'è scritto ERR quando ricominci a digitare
            function pulisci() {
                const display = document.getElementById('display');
                if (display.value === "ERR" || display.value === "APERTA") {
                    display.value = "";
                    display.style.backgroundColor = "white";
                }
            }
        </script>
    </body>
</html>
