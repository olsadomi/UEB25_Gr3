<?php 
    session_start();
    include("db.php");
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

function sendEmail($dataHyrjes, $dataDaljes, $kohaHyrjes, $kohaDaljes,$qmimi){   
    global $conn;
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.ethereal.email';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'harold.robel49@ethereal.email';     
        $mail->Password   = 'Re2je4qvPQ2VjMzBjT';        
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $email = 'default@example.com';
        $name = 'Prishtina Airport User';

        //Derguesi dhe marresi
        if(isset($_SESSION['user_id'])){
           $stmt = $conn->prepare("SELECT name, email from users WHERE id =?");
           $stmt->bind_param("i",$_SESSION['user_id']);
           $stmt->execute();

           $stmt->bind_result($name, $email);
           $stmt->fetch();
           $stmt->close();
        }
        
        $mail->setFrom('harold.robel49@ethereal.email', 'Prishtina Airport');
        $mail->addAddress($email, $name);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Rezervo parking online ne Prishtina Airport';
        $mail->Body    = "Perfundo pagesen per parking.<br>Data hyrjes:".$dataHyrjes."  ".$kohaHyrjes."
        <br>Data Daljes: ".$dataDaljes."  ".$kohaDaljes."<br>Cmimi: ".$qmimi." Euro";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }

}

?>