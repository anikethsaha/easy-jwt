<?php 
namespace easy\Jwt;

require_once('./jwt.php');


/*
                         _______________________

           this is one of the method in this customisation can be done

                       __________________________

*/
$jwt = new Jwt();

/*
                       _______________________


                        this the header part


                       ______________________ 

*/
$header =$jwt->getHeader();

/*
                       _______________________


                        this the payload  part

						your data will be the first parameter

						Default sub claim is "auth" can br overwrite

                       ______________________ 

*/
$payload =$jwt->getPayload(array("name" => "aniketh"));

/*

---------------getSecret() will create the md5 hash of the parameter
---------------Default secret : "your secret here"
---------------Default salt : "your salt here"

*/

$secret =$jwt->getSecret("secret","salt"); 

/*
                       _______________________


                        this the token creation part

                       ______________________ 

*/

$token_with_1st_way = $jwt->createToken();


/*
                       _______________________


                        this the 2nd way to get the token 


                       ______________________ 

*/


 $token_with_2nd_way =  Jwt::jwtFullEncode(["name" =>"aniketh"],"easy","qwerty");
 ?>