<?php
require_once __DIR__.'/../vendor/autoload.php';
use Symfony\Component\Validator\Validation;

require 'User.php';
require 'Comment.php';

$validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();

function showValidity(User $user): void {
    global $validator;

    $errors = $validator->validate($user);

    if (0 < count($errors)) {
        echo "User is invalid!<br>";
        foreach ($errors as $error) {
            echo $error->getMessage().'<br>';
        }

        echo '<hr>';
    }
    else {
        echo "User is valid!<br><hr>";
    }
}

$validUser = new User(1, "uservalid", "user@valid.ru", "passwordvalid");
showValidity($validUser);

$invalidIdUser = new User(-1, "userinvalidid", "user@invalidid.ru", "passwordinvalidid");
showValidity($invalidIdUser);

$invalidPasswordUser = new User(2, "userinvalidpass", "user@invalidpass.ru", "1");
showValidity($invalidPasswordUser);

$invalidEmailUser = new User(3, "userinvalidemail", "userinvalidemail", "invalidemail");
showValidity($invalidEmailUser);

$completelyInvalidUser = new User(-1, "in",  "inv", "inv");
showValidity($completelyInvalidUser);



$comments = [];
for ($i = 0; $i < 10; $i++) {
    $user = new User($i, "user{$i}", "user{$i}@mail.ru", "password{$i}");

    $daysToSub = $i * 5;
    $user->created_at = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s', strtotime("-{$daysToSub} day")));
    $comment = new Comment($user, "This is comment with index{$i}");
    $comments[$i] = $comment;
}

$filterParam = $_GET['date_from'];
if ($filterParam === NULL) {
   $filterParam = "2022-06-03";
}
$filterParamDate = DateTime::createFromFormat('Y-m-d', $filterParam);

foreach($comments as $comment) {
    if ($comment->user->created_at >= $filterParamDate) {
        echo $comment->getCommentHTML(), '<br><br>';
    }
}