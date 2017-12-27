<?php

  require_once "controller.php";

  class RegisterController extends Controller {

    public function register(array $user): ?string { // verifier que email & password existent bien | ?string--> null or string result (only in php 7)

      if (!isset($user['email']) || !isset($user['password']) || !isset($user["username"]))
        return "view/no-connect/register.php"; // if it doesn't exist then you go to the login page

      if (empty(trim($user['email'])) || empty(trim($user['password'])) || empty(trim($user["username"])))// verification - remplie

        return "view/no-connect/register.php";

      $email = htmlspecialchars(trim($user["email"])); // stops people from injecting HTML/JS into form
      $password = strip_tags(trim($user["password"])); // same (strips HTML/PHP tags)
      $username = strip_tags(trim($user["username"]));

      if(!$this->validateEmail($email)) // verification email
        return "view/connect/index.php"; // if it's not good then you go back to main index

      if($email == "toto@toto.com" && password == "toto"){ // connexion
        $_SESSION["user"] = $user;
        return "view/connect/index.php";
      }else
        return "view/no-connect/login.php";

      }

    }
