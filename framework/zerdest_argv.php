<?php

class zerdest_argv
{


    public function new_controller($argv)
    {
        //Controllereke nu saz bike.
        $exp_controller = file_get_contents(FRAMEWORK_ASSETS.'controller.exp');
        $exp_model = file_get_contents(FRAMEWORK_ASSETS.'model.exp');
    
    
        $controller_file = CONTROLLERS.$argv[2].'/'.$argv[2].'_controller.php';
        $model_file = MODELS.$argv[2].'_model.php';

        //Heger dosye hebin
        if(file_exists($controller_file) || file_exists($model_file) || file_exists(VIEWS.$argv[2].'/home.php') )
        {
            exit("\nBazı dosyalar zetedatabasen var\n");
        }

        mkdir(CONTROLLERS.$argv[2]);
        if(touch($controller_file) OR touch($model_file))
        {
            //Controllerı çeke.
            $exp_controller = str_replace("{{controller_name}}", $argv[2], $exp_controller);
            $exp_controller = str_replace("{{php}}", '<?php', $exp_controller);
            file_put_contents($controller_file,  $exp_controller);

            //Ji bo modele
            $exp_model = str_replace("{{model_name}}", $argv[2], $exp_model);
            $exp_model = str_replace("{{php}}", '<?php', $exp_model);
            file_put_contents($model_file,  $exp_model);

            //U view'e
            mkdir(VIEWS.$argv[2]);
            touch(VIEWS.$argv[2].'/home.php');
            file_put_contents(VIEWS.$argv[2].'/home.php',  '//'.$argv[2]);

        }

        exit;

        }
}