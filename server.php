<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Database Connection

$conn = mysqli_connect('localhost', 'root', '', 'products');

if (!$conn){
    die('Error'. mysqli_error($conn));         
} 

if (isset($_POST['save'])){
    $name = $_POST['name'];
    $image = "";// $_POST['comment'];
    $sql = "INSERT INTO items (name, image) VALUES ('{$name}', '{$image}')";
    if (mysqli_query($conn, $sql)){
        $id = mysqli_insert_id($conn);
        $saved_image = ' <div class="comment_box">
                        <span class="delete" data-id="'.$id.'">delete</span>
                        <span class="edit"  data-id="'.$id.'">edit</span>
                        <div class="display_name">'.$name.'</div>
                        <div class="comment_text">'.$image.'</div>
                    </div>';
        echo $saved_image;
    }
    exit();
}
if (isset($_GET['delete']))
{
    $id = $_GET['id'];
    $sql = "DELETE FROM items WHERE id=".$id;
    mysqli_query($conn, $sql);
    exit();
}
if (isset($_POST['update'])){
    $name = $_POST['name'];
    $id = $_POST['id'];
    $image = $_POST['comment'];
    $sql = "UPDATE items SET name='{$name}', image='{$image}'WHERE id=".$id;
    if (mysqli_query($conn, $sql)){
        $id = mysqli_insert_id($conn);
        $updated_comment = ' <div class="comment_box">
                        <span class="delete" data-id="'.$id.'">delete</span>
                        <span class="edit"  data-id="'.$id.'">edit</span>
                        <div class="display_name">'.$name.'</div>
                        <div class="comment_text">'.$image.'</div>
                    </div>';
        echo $updated_comment;
    }
    exit();
}
$sql = "SELECT * FROM items ";

$result = mysqli_query($conn, $sql);

$comments = '<div id="display_area">';
 while ($row = mysqli_fetch_array($result))
{
    $comments.=' <div class="comment_box">
                        <span class="delete" data-id="'.$row['id'].'">delete</span>
                        <span class="edit"  data-id="'.$row['id'].'">edit</span>
                        <div class="display_name">'.$row['name'].'</div>
                        <div class="comment_text">'.$row['image'].'</div>
                    </div>';
}
$comments.=' </div>';
















