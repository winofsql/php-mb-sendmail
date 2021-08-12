<?php
require_once( "setting.php" );
header( "Content-Type: text/html; charset=utf-8" );

// ******************************
// FORM からの POST を受け取る
// コントロール部分
// ******************************
if ( $_SERVER['REQUEST_METHOD'] =="POST" ){

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

}

// ******************************
// HTML インジェクション
// 対策関数
// ******************************
function hsc( $s ){
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

// ******************************
// 画面定義
// ******************************
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<style>
span {
    display: inline-block;
    width: 150px;
}
textarea {
    width: 600px;
    height: 200px;
}
</style>
</head>
<body>
<h3 class="alert alert-primary">メール送信</h3>
<div id="base" class="m-4">
<form action="" method="post">
    <p>
        <span>件名</span> 
        <input type="text"
            required
            name="subject"
            value="<?= hsc($_POST['subject']) ?>">
    </p>
    <p>
        <span>宛先</span>
        <input type="text"
            required
            name="email"
            value="<?= hsc($_POST['email']) ?>">
    </p>

    <p>
        <span>差出人</span>
        <input type="text"
            required
            name="from"
            value="<?= hsc($_POST['from']) ?>">
    </p>

    <p>本文</p>

    <p>
        <textarea name="body"
            required><?= hsc($_POST['body']) ?></textarea>
    </p>

    <p>
        <input name="send"
            type="submit"
            value="送信"
            class="btn btn-primary">
    </p>

</form>
</div>
</body>
</html>