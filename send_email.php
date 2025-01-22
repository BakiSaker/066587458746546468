<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبال البيانات من النموذج
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // بريدك الإلكتروني
    $to = "mediene.sae@gmail.com"; // البريد الذي تريد استقبال الرسائل عليه

    // عنوان البريد الإلكتروني
    $email_subject = "New Contact Form Submission: $subject";

    // محتوى البريد الإلكتروني
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message\n";

    // رأس البريد الإلكتروني
    $headers = "From: $email\n"; // عنوان المرسل (بريد الزائر)
    $headers .= "Reply-To: $email"; // الرد على بريد الزائر

    // إرسال البريد الإلكتروني
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
}
?>