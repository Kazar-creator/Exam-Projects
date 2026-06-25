<html>
    <head>
        <title>Distributore Semplice</title>
    </head>
    <body style="text-align: center; margin-top: 50px;">

        <div style="border: 1px solid black; width: 350px; margin: 0 auto; padding: 20px;">
            
            <!-- DISPLAY PRINCIPALE -->
            <input id="display" value="SCEGLI BEVANDA" style="width: 280px; text-align: center;" readonly>

            <!-- SELEZIONE BEVANDE -->
            <div style="margin: 20px 0;">
                <button type="button" onclick="selezionaCaffe()"> CAFFE </button>
                <button type="button" onclick="selezionaCioccolato()"> CIOCCOLATO </button>
            </div>

            <!-- REGOLAZIONE ZUCCHERO -->
            <div style="margin-bottom: 20px;">
                <span>Zucchero:</span>
                <button type="button" onclick="togliZucchero()"> - </button>
                <input id="zucchero" value="0" style="width: 30px; text-align: center;" readonly>
                <button type="button" onclick="aggiungiZucchero()"> + </button>
            </div>

            <!-- TASTO EROGA -->
            <button id="bottone_eroga" type="button" disabled style="background-color: green; color: white; width: 200px;" onclick="preparaBevanda()"> 
                EROGA 
            </button>

        </div>

        <script>
            // FUNZIONI DI SELEZIONE
            function selezionaCaffe() {
                document.getElementById('display').value = "CAFFE SELEZIONATO";
                document.getElementById('bottone_eroga').disabled = false;
            }

            function selezionaCioccolato() {
                document.getElementById('display').value = "CIOCCOLATO SELEZIONATO";
                document.getElementById('bottone_eroga').disabled = false;
            }

            // FUNZIONI ZUCCHERO (Senza abbreviazioni)
            function aggiungiZucchero() {
                if (document.getElementById('zucchero').value < 5) {
                    document.getElementById('zucchero').value++;
                }
            }

            function togliZucchero() {
                if (document.getElementById('zucchero').value > 0) {
                    document.getElementById('zucchero').value--;
                }
            }

            // FUNZIONE EROGAZIONE
            function preparaBevanda() {
                // 1. Spegniamo il tasto per non farlo premere ancora
                document.getElementById('bottone_eroga').disabled = true;

                // 2. Messaggio di caricamento
                document.getElementById('display').value = "PREPARAZIONE IN CORSO...";

                // 3. Aspettiamo 3 secondi (erogazione)
                setTimeout(function() {
                    document.getElementById('display').value = "PRENDI LA TUA BEVANDA";

                    // 4. Aspettiamo altri 3 secondi e resettiamo tutto allo stato iniziale
                    setTimeout(function() {
                        document.getElementById('display').value = "SCEGLI BEVANDA";
                        document.getElementById('zucchero').value = "0";
                        document.getElementById('bottone_eroga').disabled = true;
                    }, 3000);

                }, 3000);
            }
        </script>

    </body>
</html>
