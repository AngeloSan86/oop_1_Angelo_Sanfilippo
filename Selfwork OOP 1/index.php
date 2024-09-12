<?php

/*Crea una classe Company che abbia i seguenti attributi pubblici:
name: nome dell’azienda;
location: stato in cui e' ubicata la sede dell’azienda;
tot_employees: numero di dipedenti assunti in quella sede (di default, 0);
Crea 5 istanze di 5 aziende diverse
Crea un metodo che permetta di stampare a terminale la seguente frase: “L’ufficio Aulab con sede in Italia ha ben 50 dipendenti“; se la sede non ha dipendendi, allora stampa: “L’ufficio Aulab con sede in Italia non ha dipendenti“;
Implementa un nuovo metodo che, per ogni oggetto Company istanziati, calcoli la spesa annuale e la stampi per ogni oggetto.
Implementa un nuovo metodo che e' in grado di calcolare l’insieme totale delle spese di tutte le aziende create.
Implementa un metodo statico che permetta di stampare a terminale questo totale assoluto di tutte le aziende messe insieme.
*/


class Company{
    //ATTRIBUTI
    public $nomeAzienda;
    public $sede;
    public $numeroDipendenti = 0;
    public $spesaAnnuaDipendente;

    public function __construct($_nomeAzienda, $_sede, $_numeroDipendenti = 0, $_spesaAnnuaDipendente){

        $this->nomeAzienda = $_nomeAzienda;
        $this->sede = $_sede;
        $this->numeroDipendenti = $_numeroDipendenti;
        $this->spesaAnnuaDipendente = $_spesaAnnuaDipendente;

    }

    public function presentazione(){


        if($this->numeroDipendenti == 1){
            echo"L’ufficio " . $this->nomeAzienda . " con sede in " . $this->sede . " ha " . $this->numeroDipendenti . " solo dipendente.\n";
        }
        else if($this->numeroDipendenti >0){
            echo"L’ufficio " . $this->nomeAzienda . " con sede in " . $this->sede . " ha ben " . $this->numeroDipendenti . " dipendenti.\n";
        }else{
            echo"L’ufficio " . $this->nomeAzienda . " con sede in " . $this->sede . " non ha dipendenti.\n";
        }
        
    }

    public function speseAnnue(){
        
         echo"L’ufficio " . $this->nomeAzienda . " ha un ammontare di spese annue pari a " . $this->numeroDipendenti*$this->spesaAnnuaDipendente . " $.\n";
           
    }

    static function speseTotAziende($companies){

        $totale = 0;

        foreach ($companies as $company) {
            $totale += $company->spesaAnnuaDipendente * $company->numeroDipendenti;

        }
        echo "La spesa totale di tutte le aziende è di " . $totale . " $.\n";
          
   }
}

$azienda1 = new Company("Aulab", "Italia", 50, 15000);
$azienda2 = new Company("Plasmom", "America" ,0,24000);
$azienda3 = new Company("Fiat", "Italia", 120, 30000);
$azienda4 = new Company("Tenshin Pix Studio", "Italia", 1, 7200);
$azienda5 = new Company("Tesla", "USA", 2548, 36000);

$companies = [$azienda1, $azienda2, $azienda3, $azienda4, $azienda5];


foreach ($companies as $company) {
    $company->presentazione();
}

foreach ($companies as $company) {
    $company->speseAnnue(); 
}

Company::speseTotAziende($companies);

?>