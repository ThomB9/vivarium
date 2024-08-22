<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $captcha = $_POST['captcha'];

    // Vérifier le captcha (dans ce cas, la somme 4 + 15)
    if ($captcha != 10) {
        echo "Captcha incorrect. Veuillez réessayer.";
        exit;
    }

    // Adresse e-mail de destination
    $to = "cafe.bio.udem@gmail.com";  // Remplacez par l'adresse de destination

    // Sujet de l'e-mail
    $subject = "Nouveau message de $name via le formulaire de contact";

    // Contenu de l'e-mail
    $body = "Nom: $name\n";
    $body .= "Courriel: $email\n\n";
    $body .= "Message:\n$message\n";

    // En-têtes de l'e-mail
    $headers = "From: $email";

    // Envoyer l'e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Échec de l'envoi du message.";
    }
} else {
    echo "Méthode de requête non autorisée.";
}


?>
