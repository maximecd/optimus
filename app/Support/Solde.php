<?php

/**
 * @param Transaction[] $transactions
 */
function getSolde(array $transactions)
{

    $solde = 0;
    foreach ($transactions as $t) {
        if ($t->sens_transaction == "entrant") {
            $solde += $t->montant;
        } else {
            $solde -= $t->montant;
        }
    }
    return $solde;
}
