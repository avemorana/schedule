<?php

require_once 'models/Feedback.php';

class FeedbackController
{
    public function actionIndex()
    {

        if (isset($_POST['done'])) {
            $name = htmlspecialchars($_POST["name"]);
            $email = htmlspecialchars($_POST["email"]);
            $message = htmlspecialchars($_POST["message"]);

            $send = Feedback::sendFeedbackToDb($name, $email, $message);
            if ($send) {
                header('Location: success');
                exit;
            }
        }
        require_once 'views/feedback/index.php';
        return true;
    }
}
