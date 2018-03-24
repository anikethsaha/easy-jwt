# easy-jwt
this is a jwt creation module coded in php with a simple logic and code base
Anyone Wants to contribute is always welcomed
## Installation
##### Composer 
      Coming soon
##### Simple install
      Download or clone the repository and add the ` jwt.php ` file in your project directory
## how to Use
##### Two function are there with will create the token
## One
 is ` createToken() ` function which requires the mandatory use of the `getHeader() ` ,`getPayload() `, `getSecret() ` function otherwise       it will create an invalid token
 In `getHeader()` function , simple header will be created where algorithm value is `HS256`
 In `getSecret()` function , it consist of two arguments whose default value of `secret : "your secret here" ` and 
      `salt : "your salt here" `which can be overwrite and which will create the md5 hash of the arguments 
 In  ` getPayload()` function will have have the data in an array format and the 'sub' which can be overwrite
 In this the decoding method is `` Coming Soon ``
## Second 
 In ` jwtFullEncode()` function which will create the token just the data and secret passed in the function parameter
 In ` jwtFullDecode()` function which will decode the token with . In this the `tokentobedecode` and the `secretkey` will be passed with        argument
 In ` validToken()` function will have the data , secret and the tokentobeverify will be passed as the argument
 
 ## Example
 
 `
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
 `
 
 ## Contact Details
 Email : anik220798@gmail.com
 
 
 
 
