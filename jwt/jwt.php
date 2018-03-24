<?php 

namespace easy\Jwt;
class Jwt{
		protected $header;
		protected $payload;
		protected $signature;
		protected $secret;
		protected $salt;
		protected $secret_key;
		protected $iat;
		protected $exp;

		 public function __construct()
		  {
		    $this->header = [];
		    $this->payload = [];
		    $this->signature = []; 
		    $this->secret = null;
		    $this->salt = null;
		    $this->secret_key = null;
		    $this->iat = time();
		    $this->exp =time()+7200;
		  }

		public function getHeader($alg='HS256'){ //this are the default values and this can be overwrite
			$this->header = [
					"alg"=> $alg,
				  	"typ"=> "JWT"

				];

			$this->header = json_encode($this->header);
			$this->header = base64_encode($this->header);

			return $this->header;

		}
		public function getPayload(array $data = array(), $sub = 'auth'){


		$this->payload = [
			"iss" => $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'],
		    "sub" => $sub,
		    "data" => $data,
			
			"iat" => $this->iat,
			"exp" => $this->exp
		];


			$this->payload = json_encode($this->payload);
			$this->payload = base64_encode($this->payload);
		return $this->payload;
			
		}

		 public function getSecret($secret = "your secret here" , $salt = "your salt here"){


			$this->salt =$salt;
			$this->secret_key = md5($this->secret,$this->salt);

			return $this->secret_key;
		}
		 public function getSignature(){

			
			$signature = hash_hmac('sha256',"$this->header.$this->payload",$this->secret_key,true);
			$this->signature = base64_encode($signature);

			return $this->signature;
		}
/*
                       _______________________


                        one of the token creation function

                        in the the usage of getHeader() , getPayload() ,and getSecret() function are mandatory

                        otherwise the token wont be valid



                       ______________________ 

*/

		public  function createToken(){

			$token ="$this->header.$this->payload.$this->signature";
			return $token;
		}


/*
                       _______________________


                        another token creation  function


                       ______________________ 

*/


		public static function jwtFullEncode(array $data,$secret,$sub = "auth"){
			$header = [
					"alg"=> "HS256",
				  	"typ"=> "JWT"

				];

			$header = json_encode($header);
			$header = base64_encode($header);

			$payload = [
			"iss" => $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'],
		    "sub" => $sub,
		    "data" => $data,
			 "iat" => time(),
			 "exp" => time()+7200
		];


			$payload = json_encode($payload);
			$payload = base64_encode($payload);



			

			$signature = hash_hmac('sha256',"$header.$payload",$secret);
			$signature = base64_encode($signature);

			$token ="$header.$payload.$signature";

			return $token;

		}


/*
                       _______________________


                        FUll decode function coming soon
                        this will just give back the header and payload  but not the secret


                       ______________________ 

*/

		public static function jwtFullDecode($tokentoDecoded,$secret){
				 return (base64_decode("$tokentoDecoded.$secret"));


		}


		public static  function validToken(array $data,$secret,$tokenToVerify){
			if(jwtFullEncode($data,$secret) === $tokenToVerify){
				return true;
			}

			return false;

		} 
		



}


 ?>
