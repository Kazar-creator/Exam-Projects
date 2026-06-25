<?php
session_start();

// 1. Inizializzazione Saldo (se la sessione è vuota o resettata)
if (!isset($_SESSION['saldo'])) {
    $_SESSION['saldo'] = 500;
}

// 2. Variabili di controllo
const PIN_GIUSTO = "22222";
$messaggio = ""; 
$mostra_menu = false;

// 3. Logica Server (PHP)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Azione: ENTRA
    if ($_POST['azione'] == 'ENTRA') {
        if ($_POST['pin_digitato'] === PIN_GIUSTO) {
            $messaggio = "BENVENUTO";
            $mostra_menu = true;
        } else {
            $messaggio = "PIN ERRATO";
            $mostra_menu = false;
        }
    }

    // Azione: VEDI SALDO
    if ($_POST['azione'] == 'VEDI_SALDO') {
        $messaggio = "SALDO: " . $_SESSION['saldo'] . " EURO";
        $mostra_menu = true;
    }

    // Azione: PRELEVA 20
    if ($_POST['azione'] == 'PRELEVA_20') {
        if ($_SESSION['saldo'] >= 20) {
            $_SESSION['saldo'] = $_SESSION['saldo'] - 20;
            $messaggio = "PRELEVATI 20 EURO";
        } else {
            $messaggio = "SALDO INSUFFICIENTE";
        }
        $mostra_menu = true;
    }

    // Azione: PRELEVA 50
    if ($_POST['azione'] == 'PRELEVA_50') {
        if ($_SESSION['saldo'] >= 50) {
            $_SESSION['saldo'] = $_SESSION['saldo'] - 50;
            $messaggio = "PRELEVATI 50 EURO";
        } else {
            $messaggio = "SALDO INSUFFICIENTE";
        }
        $mostra_menu = true;
    }

    // Azione: RICARICA (Per i tuoi test se finisci i soldi)
    if ($_POST['azione'] == 'RICARICA') {
        $_SESSION['saldo'] = 500;
        $messaggio = "SALDO RESETTATO A 500€";
        $mostra_menu = true;
    }

    // Azione: ESCI
    if ($_POST['azione'] == 'ESCI') {
        $messaggio = "ARRIVEDERCI";
        $mostra_menu = false;
    }
}
?>

<html>
<head>
    <title>Bancomat Completo PHP</title>
</head>
<body style="text-align: center; margin-top: 50px; font-family: sans-serif;">

    <div style="border: 3px solid black; width: 360px; margin: 0 auto; padding: 20px; background-color: #f0f0f0;">
        
        <form method="POST">
            <!-- DISPLAY -->
            <input id="display" name="pin_digitato" value="<?php echo $messaggio; ?>" 
                   style="width: 300px; height: 45px; text-align: center; font-size: 20px; margin-bottom: 20px;" readonly>

            <?php if ($mostra_menu == false): ?>
                <!-- SCHERMATA PIN (Tastierino 3x3) -->
                <div>
                    <div style="margin-bottom: 5px;">
                        <button type="button" onclick="pulisci(); document.getElementById('display').value += '1'"> 1 </button>
                        <button type="button" onclick="pulisci(); document.getElementById('display').value += '2'"> 2 </button>
                        <button type="button" onclick="pulisci(); document.getElementById('display').value += '3'"> 3 </button>
                    </div>
                    <div style="margin-bottom: 5px;">
                        <button type="button" onclick="pulisci(); document.getElementById('display').value += '4'"> 4 </button>
                        <button type="button" onclick="pulisci(); document.getElementById('display').value += '5'"> 5 </button>
                        <button type="button" onclick="pulisci(); document.getElementById('display').value += '6'"> 6 </button>
                    </div>
                    <div style="margin-bottom: 5px;">
                        <button type="button" onclick="pulisci(); document.getElementById('display').value += '7'"> 7 </button>
                        <button type="button" onclick="pulisci(); document.getElementById('display').value += '8'"> 8 </button>
                        <button type="button" onclick="pulisci(); document.getElementById('display').value += '9'"> 9 </button>
                    </div>
                    <div>
                        <button type="button" onclick="document.getElementById('display').value = ''"> C </button>
                        <button type="button" onclick="pulisci(); document.getElementById('display').value += '0'"> 0 </button>
                        <button type="submit" name="azione" value="ENTRA" style="background-color: green; color: white; font-weight: bold;"> ENTRA </button>
                    </div>
                </div>
            <?php else: ?>
                <!-- SCHERMATA MENU OPZIONI -->
                <div>
                    <button type="submit" name="azione" value="VEDI_SALDO" style="width: 220px; height: 35px; margin-bottom: 10px;"> VEDI SALDO </button>
                    
                    <div style="margin-top: 10px;">
                        <button type="submit" name="azione" value="PRELEVA_20" style="width: 105px; height: 35px;"> PRELEVA 20€ </button>
                        <button type="submit" name="azione" value="PRELEVA_50" style="width: 105px; height: 35px;"> PRELEVA 50€ </button>
                    </div>

                    <!-- Tasto speciale per resettare il saldo durante le prove -->
                    <button type="submit" name="azione" value="RICARICA" style="background-color: orange; width: 220px; margin-top: 15px;"> RICARICA 500€ </button>
                    
                    <div style="margin-top: 25px;">
                        <button type="submit" name="azione" value="ESCI" style="background-color: red; color: white; width: 120px; height: 40px; font-weight: bold;"> ESCI </button>
                    </div>
                </div>
            <?php endif; ?>
        </form>

    </div>

    <script>
        function pulisci() {
            const d = document.getElementById('display');
            // Se c'è un messaggio di errore o di chiusura, pulisci prima di scrivere il numero
            if (d.value === "PIN ERRATO" || d.value === "ARRIVEDERCI" || d.value === "BENVENUTO") {
                d.value = "";
            }
        }
    </script>

</body>
</html>
