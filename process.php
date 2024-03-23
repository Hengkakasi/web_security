<?php 

function encrypt($password, $s){
    $result = "";

    // traverse text
    for($i = 0; $i < strlen($password); $i++)
    {
        // apply transformation to each
        // character encryption uppercase letters
        if(ctype_upper($password[$i])){
            $result .= chr((ord($password[$i]) + $s - 65) % 26 + 65);
        }
        else{
            $result .= chr((ord($password[$i]) + $s - 97) % 26 + 97);
        }
    }
    return $result;
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $s = 4; 

    echo "Username: " . $username . "<br>";
    echo "Password Before Encryption: " . $password . "<br>";
    echo "Password After Encryption: " . encrypt($password, $s) . "<br>";
    echo "Password Using password_hash : " . password_hash($password, PASSWORD_DEFAULT);

}
?>
