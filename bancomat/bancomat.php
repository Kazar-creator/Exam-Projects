<html>
    <head>
        <title>Bancomat Completo</title>
    </head>
    <body style="text-align: center; margin-top: 50px;">

        <div style="border: 2px solid black; width: 350px; margin: 0 auto; padding: 20px;">
            
            <!-- DISPLAY -->
            <input id="display" value="" style="width: 280px; text-align: center; margin-bottom: 20px;" readonly>

            <!-- SCHERMATA PIN (Tastierino Numerico) -->
            <div id="schermata_tastierino">
                <div style="margin-bottom: 5px;">
                    <button type="button" onclick="document.getElementById('display').value = document.getElementById('display').value + '1'"> 1 </button>
                    <button type="button" onclick="document.getElementById('display').value = document.getElementById('display').value + '2'"> 2 </button>
                    <button type="button" onclick="document.getElementById('display').value = document.getElementById('display').value + '3'"> 3 </button>
                </div>
                <div style="margin-bottom: 5px;">
                    <button type="button" onclick="document.getElementById('display').value = document.getElementById('display').value + '4'"> 4 </button>
                    <button type="button" onclick="document.getElementById('display').value = document.getElementById('display').value + '5'"> 5 </button>
                    <button type="button" onclick="document.getElementById('display').value = document.getElementById('display').value + '6'"> 6 </button>
                </div>
                <div style="margin-bottom: 5px;">
                    <button type="button" onclick="document.getElementById('display').value = document.getElementById('display').value + '7'"> 7 </button>
                    <button type="button" onclick="document.getElementById('display').value = document.getElementById('display').value + '8'"> 8 </button>
                    <button type="button" onclick="document.getElementById('display').value = document.getElementById('display').value + '9'"> 9 </button>
                </div>
                <div style="margin-bottom: 10px;">
                    <button type="button" onclick="document.getElementById('display').value = ''"> C </button>
                    <button type="button" onclick="document.getElementById('display').value = document.getElementById('display').value + '0'"> 0 </button>
                    <button type="button" onclick="verificaPin()" style="background-color: green; color: white;"> ENTRA </button>
                </div>
            </div>

            <!-- SCHERMATA MENU (Nascosta all'inizio) -->
            <div id="schermata_opzioni" style="display: none;">
                <div style="margin-bottom: 15px;">MENU PRINCIPALE</div>
                
                <button type="button" onclick="mostraSaldo()"> VEDI SALDO </button>
                
                <div style="margin-top: 20px;">
                    <div style="margin-bottom: 10px;">QUANTO VUOI PRELEVARE?</div>
                    <button type="button" onclick="prelevaVenti()"> 20 EURO </button>
                    <button type="button" onclick="prelevaCinquanta()"> 50 EURO </button>
                </div>

                <div style="margin-top: 20px;">
                    <button type="button" onclick="tornaIndietro()" style="background-color: red; color: white;"> ESCI </button>
                </div>
            </div>

        </div>

        <script>
            // Usiamo CONST per il PIN (non cambia mai)
            const pin_giusto = "22222";
            // Usiamo LET per il SALDO (cambia quando prelevi)
            let saldo_attuale = 500; 

            function verificaPin() {
                if (document.getElementById('display').value === pin_giusto) {
                    document.getElementById('display').value = "BENVENUTO";
                    document.getElementById('schermata_tastierino').style.display = "none";
                    document.getElementById('schermata_opzioni').style.display = "block";
                } else {
                    document.getElementById('display').value = "PIN ERRATO";
                }
            }

            function mostraSaldo() {
                document.getElementById('display').value = "SALDO: " + saldo_attuale + " EURO";
            }

            function prelevaVenti() {
                if (saldo_attuale >= 20) {
                    saldo_attuale = saldo_attuale - 20;
                    document.getElementById('display').value = "PRELEVATI 20 EURO";
                } else {
                    document.getElementById('display').value = "SALDO INSUFFICIENTE";
                }
            }

            function prelevaCinquanta() {
                if (saldo_attuale >= 50) {
                    saldo_attuale = saldo_attuale - 50;
                    document.getElementById('display').value = "PRELEVATI 50 EURO";
                } else {
                    document.getElementById('display').value = "SALDO INSUFFICIENTE";
                }
            }

            function tornaIndietro() {
                document.getElementById('display').value = "";
                document.getElementById('schermata_tastierino').style.display = "block";
                document.getElementById('schermata_opzioni').style.display = "none";
            }
        </script>

    </body>
</html>
