<?php
/*Template name: Nous Joindre*/
//à mettre dans la page pour afficher les responsables
//**************************************************

get_header();

//Requête pour obtenir les infos des responsables
$args = array(
    'post_type' => 'responsables',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order_by' => 'post_date',
    'order' => 'ASC',
);

if(isset($_GET["ID"])){
    $destinataire = $_GET["ID"];

}
else{
    $destinataire = "";
}

$the_query = new WP_Query( $args );
if(isset($_POST["g-recaptcha-response"])){
    $captcha = $_POST["g-recaptcha-response"];
}
if(isset($_POST['Submit'])){
    $arrValidation = array();
    $responsable = trim($_POST['responsable']);
    $role = trim($_POST['role']);
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $courriel = trim($_POST['courriel']);
    $objet = trim($_POST['objet']);
    $message = trim($_POST['message']);

    $prenomValide = verifierChamp('nom', $prenom, "/^[A-Z][A-Za-zÀ-ÿ -'-]*$/");
    $nomValide = verifierChamp('nom', $nom, "/^[A-Z][A-Za-zÀ-ÿ -'-]*$/");
    $courrielValide = verifierChamp('courriel', $courriel, "/^[^@]+@[^@]+\.[^@]+$/");
    $objetValide = verifierChamp('sujet', $objet, "/(.*[a-z]){3}/");
    $messageValide = verifierChamp('message', $message, "/(.*[a-z]){10}/");
    array_push($arrValidation, $prenomValide);
    array_push($arrValidation, $nomValide);
    array_push($arrValidation, $courrielValide );
    array_push($arrValidation, $objetValide );
    array_push($arrValidation, $messageValide );

    if($responsable != "Sélectionnez un destinataire"){
        $responsableValide =  array("destinataire", "valide", $responsable);
    }
    else{
        $responsableValide =  array("destinataire", "invalide", "Veuillez sélectionner un destinataire");
    }
    array_push($arrValidation, $responsableValide);
    if($role == "employeur" || $role == "etudiant"){
        $roleValide = array("role", "valide", $role);
    }
    else{
        $roleValide = array("role", "invalide", "Vous devez sélectionner un role");
    }
    array_push($arrValidation, $roleValide);

    $allValide = false;
    for($cpt = 0; $cpt < sizeof($arrValidation); $cpt++){
        if($arrValidation[$cpt][1] == "valide"){
            $allValide = true;

        }
        else{
            $allValide = false;
            break;
        }
    }
    if($allValide == true){
        unset($arrValidation);
        $messageConfirmation = "Courriel envoyé avec succès!";
    }

}
if($captcha != false){
    if($allValide == true){
        $secretKey="6Ld2xZAUAAAAAKTP2SAEIyikTTN2uzxmgcNRaiLv";
        $ip=$_SERVER["REMOTE_ADDR"];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha . "&remoteip=.$ip");
        $responseKeys = json_decode($response, true);
        if(intval($responseKeys["success"])===1){
            $post=get_post($destinataire);
            $to = get_option('admin_email');
            $subject = "Quelqu'un a envoyé un message depuis le site " . get_bloginfo('name');
            $headers = 'From: ' . $courriel . "\r\n" . 'Reply-to: ' . $courriel . "\r\n";

            $envoi = wp_mail($to, $subject, strip_tags($message), $headers);
            if($envoi){
                $messageConfirmation = "Courriel envoyé avec succès!";
            }
            else{
                $messageConfirmation = "Erreur dans la validation du captcha";
            }
        }
    }
}

function verifierChamp($nomChamp, $valeur, $regex): array
{
    $arrMessagesErreurs = array (
        'nom' =>
            array (
                'label' => 'Nom complet',
                'erreurs' =>
                    array (
                        'vide' => 'Entrez votre prénom et nom complet',
                        'motif' => 'Votre prénom et/ou votre nom comporte des caractères illégaux!',
                    ),
            ),
        'courriel' =>
            array (
                'label' => 'Courriel',
                'erreurs' =>
                    array (
                        'vide' => 'Veuillez entrer votre adresse courriel, s\'il-vous-plaît.',
                        'motif' => 'Veulliez entrer une adresse courriel valide!',
                    ),
            ),
        'destinataire' =>
            array (
                'label' => 'Destinataire',
                'erreurs' =>
                    array (
                        'vide' => 'Sélectionnez un ou une destinataire!',
                    ),
            ),
        'sujet' =>
            array (
                'label' => 'Sujet',
                'erreurs' =>
                    array (
                        'vide' => 'Entrez le sujet du courriel!',
                        'motif' => 'Le sujet du courriel comporte des caractères illégaux!',
                    ),
            ),
        'message' =>
            array (
                'label' => 'Message',
                'erreurs' =>
                    array (
                        'vide' => 'Votre message est absent!',
                        'motif' => 'Votre message comporte des caractères illégaux!',
                    ),
            ),
        'humain' =>
            array (
                'erreurs' =>
                    array (
                        'vide' => 'Êtes-vous un robot?',
                        'motif' => 'Votre réponse n\'est pas adéquate! Veuillez recommencer.',
                    ),
            ),
        'consentement' =>
            array (
                'label' => 'Autorisez-vous le partage de ce numéro?',
                'erreurs' =>
                    array (
                        'vide' => 'Veuillez, s\'il-vous-plaît, cocher la boîte pour consentir au partage de votre no cellulaire avec un.e étudiant.e qui vous accueillera lors de cette journée',
                    ),
            ),
        'telephone' =>
            array (
                'label' => 'Téléphone',
                'erreurs' =>
                    array (
                        'vide' => 'Entrez votre numéro de téléphone (format:(123) 456-7890)!',
                        'motif' => 'Veuillez entrer un numéro de téléphone de format valide (format:(123) 456-7890)!',
                    ),
            ),
        'retroactions' =>
            array (
                'courriel' =>
                    array (
                        'completer' => 'Veuillez compléter le formulaire, s\'il-vous-plaît.',
                        'envoyer' => 'Le courriel a été envoyé.',
                        'avorter' => 'L\'envoi du courriel a avorté.',
                    ),
            ),
    );

    if(preg_match($regex, $valeur)){
        $arrReponse = array($nomChamp, "valide", "");
    }
    else if($valeur == ""){
        $arrReponse = array($nomChamp, "vide", $arrMessagesErreurs[$nomChamp]['erreurs']["vide"]);
    }
    else{
        $arrReponse = array($nomChamp, "invalide", $arrMessagesErreurs[$nomChamp]['erreurs']["motif"]);
    }
    return $arrReponse;
}
?>

<main class="page__joindre">
<?php
if($the_query->have_posts()){ ?>
    <ul class="listeResponsables">
   <?php while($the_query->have_posts()) {
        $the_query->the_post();?>
        <li class="li__responsable">
            <a href="<?php echo get_page_link( get_page_by_title( "Nous joindre" )->ID); ?>?ID=<?php echo get_post()->ID; ?>">
            <?php //Photo obtient un tableau (sizes) contenant les différentes tailles d'image
            $photo=get_field("photo");
            //ici on affiche seulement la taille thumbnail
            ?>
            <img src="<?php echo $photo["sizes"]["thumbnail"]; ?>" alt="<?php echo get_field("prenom"); ?> <?php echo get_field("nom"); ?>"/>

            <ul>
                <li><?php echo get_field("prenom");?> <?php echo get_field("nom"); ?></li>
                <li><?php echo get_field("responsabilite");?></li>
                <li><?php echo get_field("courriel");?></li>
                <li><?php echo get_field("telephone");?></li>
            </ul>
            </a>
        </li>



    <?php }
    ?>
    </ul>
    <?php
}
?>
<form name="contact" id="contact" method="post" action="">
    <fieldset>
        <legend>Qui souhaitez vous contacter?</legend>
        <label for="responsable">Choisissez un responsable:</label>
        <select id="responsable" name="responsable">
            <option value="Sélectionnez un destinataire">Sélectionnez un destinataire</option>
            <?php while($the_query->have_posts()) {
                $the_query->the_post();?>
                        <option value="<?php echo get_field("nom"); ?>" <?php if($destinataire == get_the_ID() || $arrValidation[5][2] == get_field("nom")){ ?> selected <?php } ?>><?php echo get_field("prenom");?> <?php echo get_field("nom"); ?> - <?php echo get_field("responsabilite"); ?></option>
            <?php }
            ?>
        </select>
        <p class="messageErreur" id="responsableMessage"><?php if(isset($arrValidation) && $arrValidation[5][2] == "Veuillez sélectionner un destinataire"){ echo $arrValidation[5][2]; }?></p>
    </fieldset>
    <fieldset>
        <legend>Vous êtes...?</legend>
        <input type="radio" id="employeur" name="role" value="employeur" <?php if (isset($arrValidation) && $arrValidation[6][2] == "employeur"){?> checked <?php }?>>
        <label for="employeur">Un employeur</label>
        <input type="radio" id="etudiant" name="role" value="etudiant" <?php if (isset($arrValidation) && $arrValidation[6][2] == "etudiant"){?> checked <?php }?>>
        <label for="etudiant">Un/une étudiant.e</label>
        <p id="roleMessage" class="messageErreur"><?php if(isset($arrValidation) && $arrValidation[6][2] != "etudiant" && $arrValidation[6][2] != "employeur"){ echo $arrValidation[6][2]; }?></p>
        <label for="prenom">Prénom*:</label>
        <input type="text" name="prenom" id="prenom"  <?php if (isset($arrValidation)){?> value="<?php echo $prenom; ?>" <?php }?>>
        <p id="prenomMessage" class="messageErreur"><?php if(isset($arrValidation)){ echo $arrValidation[0][2]; }?></p>
        <label for="nom">Nom*:</label>
        <input type="text" name="nom" id="nom" <?php if (isset($arrValidation)){?> value="<?php echo $nom; ?>" <?php }?>>
        <p id="nomMessage" class="messageErreur"><?php if(isset($arrValidation)){ echo $arrValidation[1][2]; }?></p>
        <label for="courriel">Courriel*:</label>
        <input type="text" name="courriel" id="courriel" <?php if (isset($arrValidation)){?> value="<?php echo $courriel; ?>" <?php }?>>
        <p id="courrielMessage" class="messageErreur"><?php if(isset($arrValidation)){ echo $arrValidation[2][2]; }?></p>
        <label for="objet">Objet*:</label>
        <input type="text" name="objet" id="objet" <?php if (isset($arrValidation)){?> value="<?php echo $objet; ?>" <?php }?>>
        <p id="objetMessage" class="messageErreur"><?php if(isset($arrValidation)){ echo $arrValidation[3][2]; }?></p>
        <label for="message">Message*:</label>
        <textarea name="message" id="message"><?php if (isset($arrValidation)){ echo $message; }?></textarea >
        <p id="messageMessage" class="messageErreur"><?php if(isset($arrValidation)){ echo $arrValidation[4][2]; }?></p>
        <div class="g-recaptcha" data-sitekey="6Ld2xZAUAAAAAJ2AKX2HBkO1X3vSb6vuQ4ireXAK"></div>
        <p id="captchaMessage" class="messageErreur"></p>
    </fieldset>
    <p class="messageSucces"><?php if(isset($messageConfirmation)){ echo $messageConfirmation; } ?></p>
    <button disabled type="submit" name="Submit" value="Submit" id="boutonSubmit">Envoyer</button>
    
</form>
</main>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php get_footer(); ?>