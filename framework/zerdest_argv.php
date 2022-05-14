<?php

namespace framework;

class zerdest_argv extends framework
{


    public function new_controller($argv)
    {
        //Create the controller
        $exp_controller = file_get_contents(FRAMEWORK_ASSETS.'controller.exp');
        $exp_model = file_get_contents(FRAMEWORK_ASSETS.'model.exp');
    
    
        $controller_file = CONTROLLERS.$argv[2].'/'.$argv[2].'.php';
        $model_file = MODELS.$argv[2].'.php';

        //If there are any file
        if(file_exists($controller_file) || file_exists($model_file) || file_exists(VIEWS.$argv[2].'/home.php') )
        {
            exit("\nThere are some file\n");
        }

        mkdir(CONTROLLERS.$argv[2]);
        if(touch($controller_file) OR touch($model_file))
        {
            //Inlude the controller
            $exp_controller = str_replace("{{controller_name}}", $argv[2], $exp_controller);
            $exp_controller = str_replace("{{php}}", '<?php', $exp_controller);
            file_put_contents($controller_file,  $exp_controller);

            //For the model
            $exp_model = str_replace("{{model_name}}", $argv[2], $exp_model);
            $exp_model = str_replace("{{php}}", '<?php', $exp_model);
            file_put_contents($model_file,  $exp_model);

            //And the view
            mkdir(VIEWS.$argv[2]);
            touch(VIEWS.$argv[2].'/home.php');
            file_put_contents(VIEWS.$argv[2].'/home.php',  '//'.$argv[2]);

        }

        exit;

        }
}