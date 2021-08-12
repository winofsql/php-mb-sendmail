# php-mb-sendmail
メール送信
```phph
$subject = $_POST['subject'];
$email = $_POST['email'];
$from = $_POST['from'];
$body = $_POST['body'];

// ******************************
// メール部分 始まり
// ******************************
$headers = [
    'From' => mb_encode_mimeheader( '送信者の名前' ) . " <{$from}>",
    'Sender' => mb_encode_mimeheader( '送信者の名前' ) . "<{$from}>",
    'Organization' => mb_encode_mimeheader( '送信者の組織名' ),
];

$ret = mb_send_mail( $email, $subject, $body, $headers );
```

![image](https://user-images.githubusercontent.com/1501327/129197309-d50763d1-70d9-4a9b-a208-665d20dc3ea2.png)
