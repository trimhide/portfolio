<?php

mb_language("Japanese");
//↑マルチバイトの言語設定を日本語にします

mb_internal_encoding("UTF-8");
//↑マルチバイトの文字エンコーディングをUTF-8にします

if($_POST) {
  $to = 'trim@trim-d.com';
  //↑このお問い合わせフォームに入力された内容を送る先のメールアドレス。
  //通常は、お問い合わせフォームがあるホームページを管理している人のメールアドレスです。

  $subject = 'お問い合わせがありました';
  //↑送信されるメールの題名です。

  //↓以下は、送信するメールの本文です。1行ずつ$messageに追記する形です。
  // \nは、改行の意味。
  $message = "お問い合わせがありました。\n";
  $message .= "\n";
  $message .= "入力された内容は以下の通りです。\n";
  $message .= "---\n";
  $message .= "\n";
  $message .= "お名前：\n";
  $message .= $_POST["name"]; // name属性がnameの内容が入ります
  $message .= "\n";
  $message .= "メールアドレス:\n";
  $message .= $_POST["email"]; // name属性がemailの内容が入ります
  $message .= "\n";
  $message .= "お問い合わせ本文:\n";
  $message .= $_POST["message"]; // name属性がmessageの内容が入ります

//↓最後に、設定した内容でメールを送る命令です
if(mb_send_mail($to,$subject,$message)) {
    // 送信成功時：大きく、青色、中央配置
    echo "<div style='text-align:center; font-weight: bold; font-size:48px; color:blue; margin-top:128px;'>メールが送信されました</div>";
} else {
    // 送信失敗時：大きく、赤色、中央配置
    echo "<div style='text-align:center; font-weight: bold; font-size:48px; color:red; margin-top:128px;'>メールの送信に失敗しました</div>";
}
} else {
    // POST失敗時：大きく、赤色、中央配置
    echo "<div style='text-align:center; font-weight: bold; font-size:48px; color:red; margin-top:128px;'>HTMLからのPOST送信受信に失敗しました</div>";
}