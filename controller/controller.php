<?php

    class Controller {

      protected function validateEmail(string $email): bool {

      return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false; // if the filter is good, return TRUE. if not, FALSE.

    }
