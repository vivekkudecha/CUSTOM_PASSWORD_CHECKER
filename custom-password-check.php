<?php
class PasswordChecker{
	// Checking Ascii values for each char
	
	//Check String Contains The Special Character Or Not
        public function CheckSpecialChar($var,$least=1){
            $count = 0;
            // Check The Special Char Part 1
            for($j=0; $j < strlen($var); $j++){
                for ($i=33; $i < 48; $i++) {
                    if($var[$j] == chr($i)){
                        $count++;
                    }
                }        
            } 
            // Check The Special Char Part 2
            for($j=0; $j < strlen($var); $j++){
                for ($i=58; $i < 65; $i++) { 
                    if($var[$j] == chr($i)){
                        $count++;
                    }
                }
            }
            
            // Check The Special Char Part 3
            for($j=0; $j < strlen($var); $j++){
                for ($i=91; $i < 97; $i++) { 
                    if($var[$j] == chr($i)){
                        $count++;
                    }
                }
            }
            // Check The Special Char Part 4
            for($j=0; $j < strlen($var); $j++){
                for ($i=123; $i < 127; $i++) { 
                    if($var[$j] == chr($i)){
                        $count++;
                    }
                }
            }
            return $count >=  $least ? true : false;
        }
        //Check String Contains Digit Or Not
        public function CheckDigit($var,$least=1){
            $count = 0;
            for($j=0; $j < strlen($var); $j++){
                for ($i=48; $i < 58; $i++) { 
                    if($var[$j] == chr($i)){
                        $count++;
                    }
                }
            }
            return $count >=  $least ? true : false;
        }
        //Check String Contains Small Alphabates Or Not
        public function CheckLowercase($var,$least=1){
            $count = 0;
            for($j=0; $j < strlen($var); $j++){
                for ($i=97; $i < 123; $i++) { 
                    if($var[$j] == chr($i)){
                        $count++;
                    }
                }
            }
            
            return $count >=  $least ? true : false;
        }
        //Check String Contains Uppercase Alphabates Or Not
        public function CheckUppercase($var,$least=1){
            $count = 0;
            for($j=0; $j < strlen($var); $j++){
                for ($i=65; $i < 91; $i++) { 
                    if($var[$j] == chr($i)){
                        $count++;
                    }
                }
            }
            return $count >=  $least ? true : false;
        }
        // Password Checker
        public function CheckPassword($pwd,$min = 6,$max = 16,$leastSpecialChar = 1,$leastDigit = 1,$leastSmallAlpha = 1,$leastUppercase = 1){
            if(strlen($pwd) >= $min && strlen($pwd) <= $max){
                $isSpecialChar = $this->CheckSpecialChar($pwd,$leastSpecialChar);
                $isDigit = $this->CheckDigit($pwd,$leastDigit);
                $isAlpha = ($this->CheckLowercase($pwd,$leastSmallAlpha) && $this->CheckUppercase($pwd,$leastUppercase));
                if($isSpecialChar && $isDigit && $isAlpha){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
            
        }
}
?>


// For The Use import this file or class to your php project and code like this...
<?php
  $var = new PasswordChecker();
	// Check Password With Define Your Rules
  $var->CheckPassword(your_password,min_length,max_length,NoOfSpecialCharContains,NoOfDigitContains,NoOfSmallAlphabateContains,NoOfUppercaseAlphbateContains);
 ?>
