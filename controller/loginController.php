<?php
  class LoginController {

    public function login(array $user): ?string { // verifier que email & password existent bien | ?string--> null or string result (only in php 7)

      if (!isset($user['email']) || !isset($user['password']))
        return "view/no-connect/login.php"; // if it doesn't exist then you go to the login page

      if (empty(trim($user['email'])) || empty(trim($user['password'])// verification - remplie
      ))
        return "view/no-connect/login.php";

      $email = htmlspecialchars(trim($user["email"])); // stops people from injecting HTML/JS into form
      $password = strip_tags(trim($user["password"])); // same (strips HTML/PHP tags)

      if(!$this->validateEmail($email)) // verification email
        return "view/connect/index.php"; // if it's not good then you go back to main index

      if($email == "toto@toto.com" && password == "toto"){ // connexion
        $_SESSION["user"] = $user;
        return "view/connect/index.php";
      }else
        return "view/no-connect/login.php";

      }

    }

    public function validateEmail(string $email): bool {

      return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false; // if the filter is good, return TRUE. if not, FALSE.


    }
  }
