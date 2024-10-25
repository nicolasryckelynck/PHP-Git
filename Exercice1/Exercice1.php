<?php

function calculerSousTotal($produit)
{
    return $produit['prix'] * $produit['quantite'];
}

$produit1 = ["nom" => "Livre", "prix" => 15, "quantite" => 2];
$produit2 = ["nom" => "Stylo", "prix" => 3, "quantite" => 5];
$produit3 = ["nom" => "Sac", "prix" => 25, "quantite" => 1];

$panier = [$produit1, $produit2, $produit3];
$totalPanier = 0;

echo "<h3>Détails du panier :</h3>";
foreach ($panier as $produit) {
    $sousTotal = calculerSousTotal($produit);
    echo "Le sous-total pour le " . $produit['nom'] . " est de " . $sousTotal . " €.<br>";
    $totalPanier += $sousTotal;
}

echo "<h3>Montant total du panier : " . $totalPanier . " €</h3>";
if ($totalPanier > 50) {
    $reduction = $totalPanier * 0.10;
    $totalApresReduction = $totalPanier - $reduction;
    echo "<h3>Montant après réduction (10%) : " . $totalApresReduction . " €</h3>";
} else $totalApresReduction = $totalPanier;

echo "<h3>Panier :</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Produit</th><th>Prix</th><th>Quantité</th><th>Sous-total</th></tr>";
foreach ($panier as $produit) {
    $sousTotal = calculerSousTotal($produit);
    echo "<tr>
            <td>" . $produit['nom'] . "</td>
            <td>" . $produit['prix'] . " €</td>
            <td>" . $produit['quantite'] . "</td>
            <td>" . $sousTotal . " €</td>
          </tr>";
}
echo "<tr><td colspan='3'><strong>Total</strong></td><td><strong>" . $totalApresReduction . " €</strong></td></tr>";
echo "</table>";
