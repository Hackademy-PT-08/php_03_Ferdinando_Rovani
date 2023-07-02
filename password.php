<?php 

// — Ripetere l’esercizio del controllo password visto a lezione (da soli o rivedendo il video).
// — Implementare un metodo che faccia reinserire la password qualora anche una delle regole non fosse rispettate e che, invece, lo interrompa in caso di password accettata.
// — Visualizzare in console quale regola non e’ stata rispettata.
// — Implementare un metodo che faccia reinserire la password massimo 3 volte. 

function password(){
    // contatore per far ripetere la richiesta
    $counter =0;

    // contatore per verificare che tutte le condizioni siano rispettate
    $passwordChecked = false;

    // numero massimo di tentativi
    $tries = 3;

    // DECLARATIONS

    // funzione per verificare la lunghezza della password inserita
    function length($password){
        if(strlen($password)>=8){
            return true;
           
        }
        else{
            echo("password troppo corta \n");
        }
    }
    // funzione per verificare che sia presente un numero nella password
    function isNumber($password){
        $check= false;
        for($i=0; $i<strlen($password); $i++){
            if(is_numeric($password[$i])){
                $check= true;
                break;
            }
        }
        if($check){
            return true;
        }
        else{
            echo("inserire un numero \n");
        }
    }  
    // funzione per verificare che sia presente una maiuscola nella password
    function upperCase($password){
        $check= false;
        for($i=0; $i<strlen($password); $i++){
            if(ctype_upper($password[$i])){
                $check= true;
                break;
            }
        }
        if($check){
            return true;
        }
        else{
            echo("inserire almeno un carattere maiuscolo \n");
        }
    }  
    // funzione per determinare carattere speciale nella password
    function specialChar($password){
        if (preg_match('/[^a-zA-Z0-9]/', $password)) {
            return true;
        } else {
            echo "La password deve contenere caratteri speciali \n";
        }
    }

    // ciclo che fa ripetere la richiesta di inserimento password
    while($counter<3 && !($passwordChecked)){
        // messaggio che compare dopo aver inserito una password sbagliata
        if($counter>0){
            echo("hai ancora $tries tentativi\n");
        }
        // variabile per far inserire pasword all'utente
        $password=readLine("ineserire password \n");   
               
        $firstRule=length($password);     
        $secondRule=isNumber($password); 
        $thirddRule=upperCase($password); 
        $fourthRule=specialChar($password);

        if($firstRule && $secondRule && $thirddRule && $fourthRule ){
            $passwordChecked = true;
            var_dump("passowrd corretta");
        }


        $counter++;
        $tries--;
        

    }
    // messaggio che compare in caso di 3 password inesrite sbagliate
    if($tries===0 && $passwordChecked ===false){
        echo("tentativi esauriti");
    }
}

password();