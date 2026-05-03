<?php
require __DIR__ ."/../../phpmailer/PHPMailerAutoload.php";
class MailDataConnect
{
    private $conn;
    private $domain;

    public function __construct($connection, $domain)
    {
        $this->conn = $connection;
        $this->domain = $domain;
    }

    public function getDomainData()
    {
        try {
            $query = $this->conn->prepare("SELECT * FROM mail_auth_data WHERE domain = ?");
            $query->execute(array($this->domain));

            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
        return null;
    }
}

class EmailSender
{
    private $mailer;
    private $host;
    private $smtpAuth;
    private $smtpUsername;
    private $password;
    private $smtpSecure;
    private $port;
    private $setFrom;
    private $addReplyTo;
    private $cName;

    public function __construct($config)
    {
        $this->mailer = new PHPMailer;
        $this->initializeEmailSettings($config);
        $this->configureMailer();
    }

    private function initializeEmailSettings($config)
    {
        $this->host = $config['host'];
        $this->smtpAuth = $config['smtpAuth'];
        $this->smtpUsername = $config['smtpUsername'];
        $this->password = $config['password'];
        $this->smtpSecure = $config['smtpSecure'];
        $this->port = $config['port'];
        $this->setFrom = $config['setFrom'];
        $this->addReplyTo = $config['addReplyto'];
        $this->cName = $config['cName'];
    }

    private function configureMailer()
    {
        $this->mailer->isSMTP();
        $this->mailer->Host = $this->host;
        $this->mailer->SMTPAuth = $this->smtpAuth;
        $this->mailer->Username = $this->smtpUsername;
        $this->mailer->Password = $this->password;
        $this->mailer->SMTPSecure = $this->smtpSecure;
        $this->mailer->Port = $this->port;
        $this->mailer->setFrom($this->setFrom, $this->cName);
        $this->mailer->addReplyTo($this->setFrom, $this->cName);
    }

    public function sendMail($recipient, $subject, $message)
    {
        $this->mailer->addAddress($recipient);
        $this->mailer->isHTML(true);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $message;

        if ($this->mailer->send()) {
            return true;
        } else {
            return false;
        }
    }
}

$domain = $_SERVER['HTTP_HOST'];

try {
    $madr = new MailDataConnect($conn, $domain);
    $domainAssoc = $madr->getDomainData();
} catch (PDOException $error) {
    echo $error->getMessage();
}

if ($domainAssoc !== null) {
    $config = [
        'host' => $domainAssoc['host'],
        'smtpAuth' => $domainAssoc['smtp_auth'],
        'smtpUsername' => $domainAssoc['username'],
        'password' => $domainAssoc['password'],
        'smtpSecure' => $domainAssoc['smtp_secure'],
        'port' => $domainAssoc['port'],
        'setFrom' => $domainAssoc['set_from'],
        'addReplyto' => $domainAssoc['add_replyto'],
        'cName' => $domainAssoc['name'],
    ];
} else {
    echo "No domain data found or an error occurred.";
    return false;
}

?>
