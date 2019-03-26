<?php


class MyDirectory
{

    private $current_directory;//<<<<<<<<<<<<<<<<<<<<<Directory repository

    public function __construct($abstract_directory)
    {
        $this->abstract_directory = $abstract_directory;
        $this->current_directory = $abstract_directory;
    }

    public function cd($cd)
    {

        $this->cd = $cd;


            if($cd === $this->abstract_directory)
            {
                $this->current_directory=$cd;
                return $this->current_directory;
            }
            elseif ($cd === "..")


///////////////////////////////////////////////////////////Change $current_directory to parent directory>>>>>>>>>>>>
            {
                $remove_current_directory = preg_split("/\/(?!.*\/).*/" , $this->abstract_directory) ;
                $parent_directory = $remove_current_directory[0];
                $this->current_directory=$parent_directory;
                return $this->current_directory;

            }elseif($cd === "/"){


///////////////////////////////////////////////////////////Change $current_directory to root directory>>>>>>>>>>>>
                $this->current_directory = "/";
                return $this->current_directory;

            }else{


///////////////////////////////////////////////////////////Change $current_directory>>>>>>>>>>>>
                    $remove_current_directory = preg_split("/\/(?!.*\/).*/" , $this->abstract_directory) ;
                    $this->current_directory = $remove_current_directory[0] . "/". $cd;
                    return $this->current_directory;
            }

    }

    public function getPath()
    {
        echo $this->current_directory;
        echo '<br>';
    }


}

$path = new MyDirectory("/one/two/three/Four");

$path->getPath();


$path->cd('TEN');
$path->getPath();


$path->cd('..');
$path->getPath();


$path->cd('/');
$path->getPath();


$path->cd('/one/two/three/Four');
$path->getPath();