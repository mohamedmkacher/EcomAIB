<?php

namespace commande;

enum EtatCommande
{
    case EN_PREPARATION;
    case PRETE;
    case EN_LIVRAISON;
    case LIVREE;
    case PAYEE;
    case ANNULEE;


}
