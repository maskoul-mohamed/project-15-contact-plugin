<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php
/*
plugin name: Form contact

*/

function form_contact(){
    $contact = '';
    $contact .= '<h2>Contact us</h2>';
    $contact .= '<form action="https://localhost/wordpress-plugins/?page_id=9" method="post">';
    
    $contact .= '<label for="">Name</label>';
    $contact .= '<input type="text" name="Name" class="form-control""  >';
    
    $contact .= '<label for="">Email</label>';
    $contact .= '<input type="email" name="Email" class="form-control"  >';
    
    $contact .= '<label for="">Subject</label>';
    $contact .= '<input type="text" name="subject" class="form-control"  >';
    
    $contact .= '<label for="">Message</label>';
    $contact .= '<textarea  name="message" class="form-control"></textarea>';
    
    $contact .= '</br><input type="submit" name="form_submit" class="btn btn-primary" value="submit">';
    $contact .= '</form>';
    return $contact;
    }

    add_shortcode('form', 'form_contact');

    function form_captur(){
        if(isset($_POST["form_submit"])){
    
        $name = sanitize_text_field($_POST['Name']);
        $email = sanitize_text_field($_POST['Email']);
        $subjects= sanitize_text_field($_POST['subject']);
        $your_message = sanitize_textarea_field($_POST['message']);
    
        $to = 'moha1058@gmail.com';
        $subject = $subjects;
        $message = $name. " - " .$email." - " .$your_message ;
    
      wp_mail($to , $subject , $message);
        }
    }
    add_action('wp_head' , 'form_captur');
?>