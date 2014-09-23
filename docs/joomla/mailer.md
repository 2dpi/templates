# Mailer

Sending email from extensions example [here](http://docs.joomla.org/Sending_email_from_extensions)

```php
// get mailer
$mailer = JFactory::getMailer();
// send mail
//sendMail($from, $fromname, $recipient, $subject, $body, $htmlmode=0, $cc=null, $bcc=null, $attachment=null, $replyto=null, $replytoname=null )
$mailer->sendMail( $from, $fromName, $dest, $subject, $body, $format, $cc, $bcc, $attach, $replyTo, $replyToName );
```
