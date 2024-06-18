<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $societe = htmlspecialchars($_POST['societe']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "ff.rossignol@yahoo.fr";
    $subject = "Nouveau message de contact";
    $body = "Nom: $nom\nSociété: $societe\nTéléphone: $telephone\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message envoyé avec succès!";
    } else {
        echo "Échec de l'envoi du message.";
    }
} else {
    echo "Méthode de requête invalide.";
}
?>