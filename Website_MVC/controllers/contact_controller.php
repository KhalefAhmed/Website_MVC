<?php



if (!empty($_POST) && isset($_POST['btnContact'])){
    if (isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['message'])){
        if (!empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['message'])) {
            $email = str_secur($_POST['email']);
            $firstname = str_secur($_POST['firstname']);
            $message = str_secur($_POST['message']);

            $message .=' - email envoyer par '.$firstname .' :'. $email;
            //Envoyer un email
            mail('khalef.ahmedkhalil@gmail.com','On me contact',$message);
            //debug($message);

        }else {
            $error = "vous devez remplir tous les champs";
        }
    }else{
        $error = "Une erreur c'est produite. Reessayer";

    }

//debug($_POST);
}

