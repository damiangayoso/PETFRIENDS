<?php

  return

  array(
    "base_url" => "http://localhost/PETFRIENDS/hydridauth.php",
    "providers" => array(
      "Twitter" => array(
        "enabled" => true,
        "keys" => array(
          "key" => "",
          "secret" => ""
        ),
        "includeEmail" => true
      ),
      "Facebook" => array(
        "enabled" => true,
        "keys" => array(
          "id" => "434099276952369",
          "secret" => "cb6ee417486c452b096e9e771664bce5"
        ),
        "scope" => "email"
      ),
      "Google" => array(
        "enabled" => true,
        "keys" => array(
          "id" => "1050102126139-gmqa5vkcd63jqo6iao1ahotjgdk5s7ik.apps.googleusercontent.com",
          "secret" => "9gdIcDaCzmu9_X_33L7hNC50"
        )
      )
    )
  )

 ?>
