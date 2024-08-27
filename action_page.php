<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $country = htmlspecialchars($_POST['country']);
    $subject = htmlspecialchars($_POST['subject']);

    // Valider les données du formulaire
    if (empty($firstname) || empty($lastname) || empty($email) || empty($subject)) {
        // Rediriger vers le formulaire avec un message d'erreur
        header("Location: index.html?status=error&message=Veuillez remplir tous les champs");
        exit();
    }

    // Adresse e-mail du destinataire (changez ceci par votre adresse e-mail)
    $to = "votre.email@exemple.com";

    // Sujet de l'e-mail
    $subject_email = "Nouveau message du site CV";

    // Contenu de l'e-mail
    $message = "Nouveau message du site CV de la part de " . $firstname . " " . $lastname . " " . $email . " : " . $subject;
    

    // Pour envoyer un e-mail HTML, l'en-tête Content-type doit être défini
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // En-têtes additionnels
    $headers .= 'From: <webmaster@votresite.com>' . "\r\n"; // Remplacez par l'adresse e-mail de votre site

    // Envoyer l'e-mail
    if (mail($to, $subject_email, $message, $headers)) {
        // Rediriger vers le formulaire avec un message de succès
        header("Location: contact.html?status=success&message=Votre message a été envoyé avec succès");
    } else {
        // Rediriger vers le formulaire avec un message d'erreur
        header("Location: index.html?status=error&message=Une erreur s'est produite lors de l'envoi de l'e-mail");
    }
    exit();
} else {
    // Rediriger vers le formulaire si la méthode de requête n'est pas POST
    header("Location: index.html?status=error&message=Méthode de requête invalide");
    exit();
}
?>
