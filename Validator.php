<?php



class Validator extends Book
{
    private $errors =  array();

    /**
     * @param string $email
     * @return int
     */
    public function preg_email(string $email){

        $pattern = "/(^[a-z0-9]+)@([a-z])+(\.)([a-z]{2,3})/";
        if(preg_match($pattern, $email) == 1){

            $msg = 1;
        }else{

            $msg = 0;
        }
        return $msg;
    }

    /**
     * @param string $string
     * @return int
     */
    function preg_string(string $string){

        $pattern = "/^-?[a-zA-Z\ ]+$/";
        if(preg_match($pattern, $string) == 1){

            $msg = 1;
        }else{
            $msg = 0;
        }

        return $msg;
    }

    /**
     * @param string $num
     * @return int
     */
    function preg_number(string $num){

        $pattern = "/^(\+)[0-9]{11,12}/";
        if(preg_match($pattern, $num) == 1){

            $msg = 1;
        }else{

            $msg = 0;
        }

        return $msg;
    }

    /**
     * @param string $name
     * @return string
     */
     public function post(string $name){

        if(isset($_POST[$name])) return $this->cleaningString($_POST[$name]);
     }

    /**
     * @param string $name
     * @return mixed
     */
     public function files(string $name){

         if(isset($_FILES[$name])) return $_FILES[$name];
     }



    /**
     * @param string $name
     */
    public function phone(string $name){

        $value = $this->post($name);

        if(!empty($value)){

            if($this->preg_number($value) == 1){

                $this->errors["success"] = "true";
            }else{

                $this->errors[$name] = "Your number is incorrect.<br/> Ex +380633471236";
            }
        }else{

            $this->errors[$name] = "Field $name is required";
        }
    }

    /**
     * @param string $name
     */
    public function text(string $name){

        $value = $this->post($name);

        if(!empty($value)){

            if($this->preg_string($value) == 1){

                $this->errors["success"] = "true";
            }else{

                $this->errors[$name] = "Your $name contains characters  not allowed";
            }
        }else{

            $this->errors [$name] = "Field $name is required";
        }
    }

    public function file(string $name){

        $files = $this->files($name);

        $extensions = ['png', 'jpeg', 'jpg', 'gif'];

        $file_name = $files["name"];
        $file_error = $files['error'];

        if($file_error === 0  && strlen($file_name) > 0){

            $detach = explode('.', $file_name);
            $extension = strtolower(end($detach));

            if(in_array($extension, $extensions)){

                $file_size = $files['size'];
                if($file_size <= 3200000){

                    $new_name = strtolower($this->alphaNumCode(3).'.'.$extension);
                    $tmp_name = $files['tmp_name'];

                    //create the storage location of the files
                    $stone = "storage";
                    if(!is_dir($stone)){
                       mkdir($stone);
                    }
                    $storage = $stone."/".$new_name;

                    if(move_uploaded_file($tmp_name, $storage) == TRUE){

                        $this->errors["success"] = "true";

                        //return "The file has been downloaded successfully";
                    }else{

                        $this->errors[$name] = "There was a problem uploading";
                    }
                }else{

                    $this->errors[$name] = "The file exceeds 32 Mo";
                }

            }else{
                $this->errors[$name] = "The file is not allowed";
            }

        }else{
            $this->errors[$name] = "Select your file";
        }

    }


    /**
     * @param string $name
     */
    public function email(string $name){

        $value = $this->post($name);

        if(!empty($value)){

            if($this->preg_email($value) == 1){

                $this->errors["success"] = "true";
            }else{

                $this->errors[$name] = "Your email is incorrect";
            }
        }else{
            $this->errors[$name] = "Field $name is required";
        }

    }

    /**
     * @param string $name
     * @return mixed
     */
    public function error(string $name){

        if(isset($this->errors[$name])) return $this->errors[$name];
    }

    /**
     * @param $name
     * @param $args
     */
    public function __call($name, $args){

        echo $name," doesn't exist in this class";
    }
}