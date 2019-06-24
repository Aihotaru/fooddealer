<?php
/**
 * Created by PhpStorm.
 * User: Katec
 * Date: 20.06.2019
 * Time: 15:34
 */
$message = '';
$error = '';

if(isset($_POST["submit"]))
{
    if(empty($_POST["name"]))
    {
        $error = "<label class='text-danger'>Enter name</label>";
    }
    else if(empty($_POST["dop"]))
    {
        $error = "<label class='text-danger'>Enter additional ingredients</label>";
    }
    else
    {
        if(file_exists('food.json'))
        {
            $current_data = file_get_contents('food.json');
            $array_data = json_decode($current_data, true);
            $extra = array(
                'name' => $_POST['name'],
                'description' => $_POST['dop'],
                'mainItem' => $_POST['type_of'],
                'type' => $_POST['main_ingr'],
                'img' => $_POST['img']
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if(file_put_contents('food.json', $final_data))
            {
                $message = "<label class='text-success'>File Appended</label>";
            }
        }
        else
        {
            $error = 'JSON File not exits';
        }
    }

}