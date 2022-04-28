<?php
//  Plugin Name:Réglage de form
// Plugin URI: http://wordpress.org/plugins/hello-dolly/
// Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
// Author: hy
// Version: 4.7.2


function form_menu(){
    add_menu_page( 'Réglage de form', 'Réglages', 'manage_options', 'test_plugin','wp_form','dashicons-feedback');
}
add_action('admin_menu', 'form_menu');

function wp_form(){
    $activefn ='';
    $disablefn ='';
    $activeln='';
    $disableln='';
    $activeful ='';
    $disableful ='';
    $activeml ='';
    $disableml ='';
    $activephon ='';
    $disablephon ='';
    $activemssg ='';
    $disablemssg ='';
    if ( get_option('wp_fname') == "true"){
        $activefn ='checked';
    }else{
        $disablefn ='checked';
    }
    if ( get_option('wp_lname') == "true"){
        $activeln ='checked';
    }else{
        $disableln ='checked';
    }
    if ( get_option('wp_fullname') == "true"){
        $activeful ='checked';
    }else{
        $disableful ='checked';
    }
    if ( get_option('wp_email') == "true"){
        $activeml ='checked';
    }else{
        $disableml ='checked';
    }
    if ( get_option('wp_number') == "true"){
        $activephon ='checked';
    }else{
        $disablephon ='checked';
    }
    if ( get_option('wp_message') == "true"){
        $activemssg ='checked';
    }else{
        $disablemssg ='checked';
    }
echo'<form action="" method="POST">
    <h4>Fist Name:</h4>
    active:<input type="radio" name="radio" value="true" '.$activefn.'>
    disable:<input type="radio" name="radio" value="false" '. $disablefn.'> <br>';
    
echo'<form action="" method="POST">
    <h4>Last Name:</h4>   
    active:<input type="radio" name="radio1" value="true" '.$activeln.'>
    disable:<input type="radio" name="radio1" value="false" '.$disableln.'> <br>';
    
echo'<form action="" method="POST">
    <h4>Full Name:</h4>
    active:<input type="radio" name="radio2" value="true" '. $activeful.'>
    disable:<input type="radio" name="radio2" value="false" '.$disableful.'> <br>';
    
echo'<form action="" method="POST">
    <h4>Email:</h4>
    active:<input type="radio" name="radio3" value="true" '.$activeml.'>
    disable:<input type="radio" name="radio3" value="false" '.$disableml.'> <br>';
    
echo'<form action="" method="POST">
    <h4>Phone Number:</h4>
    active:<input type="radio" name="radio4" value="true" '.$activephon.'>
    disable:<input type="radio" name="radio4" value="false" '.$disablephon.'> <br>';
    
echo'<form action="" method="POST">
    <h4>Message:</h4>
    active:<input type="radio" name="radio5" value="true" '.$activemssg.'>
    disable:<input type="radio" name="radio5" value="false" '.$disablemssg.'> <br>
    <input type="submit" name="submit" style ="background: #2271B1; border-radius: 8px;width:81px;margin-left:50px; margin-top:10px; height: 30px; color:white;">';
    
echo'</form>';
if (isset($_POST["submit"])) {
    echo '<div class = "updated"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The operation was completed successfully!!!! </div>';
    }
}
$option = "wp_fname";
    if (isset($_POST["submit"])) {
        $value = $_POST['radio'];
    update_option( $option, $value );
    }  
$option = "wp_lname";
    if (isset($_POST["submit"])) {
        $value = $_POST['radio1'];
    update_option( $option, $value );
    }
$option = "wp_fullname";
    if (isset($_POST["submit"])) {
        $value = $_POST['radio2'];
    update_option( $option, $value );
    }
$option = "wp_email";
    if (isset($_POST["submit"])) {
        $value = $_POST['radio3'];
    update_option( $option, $value );
    }
$option = "wp_number";
    if (isset($_POST["submit"])) {
        $value = $_POST['radio4'];
    update_option( $option, $value );
    }
$option = "wp_message";
    if (isset($_POST["submit"])) {
        $value = $_POST['radio5'];
    update_option( $option, $value );
    }

function add_form(){
        $form_added = false;
        echo "
        <div class='container'>
        <form action='' method='POST'>
    ";
        if(get_option("wp_fname") == "true"){
            echo '<label>First Name<input type="text"></label>';
            $form_added = true;
        }
        if(get_option("wp_lname") == "true"){
            echo '<label>Last Name<input type="text"></label>';
            $form_added = true;
        }
        if(get_option("wp_fullname") == "true"){
            echo '<label>Last Name<input type="text"></label>';
            $form_added = true;
        }
        if(get_option("wp_email") == "true"){
            echo '<label>Email<input type="text"></label>';
            $form_added = true;
        }
        if(get_option("wp_number") == "true"){
            echo '<label>Phone number<input type="text"></label>';
            $form_added = true;
        }
        if(get_option("wp_message") == "true"){
            echo '<label>Message:<textarea name="message" cols="30" rows="10"></textarea></label>';
            $form_added = true;
        }
        if($form_added){
            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Submit">';        
        }
        echo "
        </form>
        </div>  
    ";
    }
    add_shortcode('inputs','add_form');
?>