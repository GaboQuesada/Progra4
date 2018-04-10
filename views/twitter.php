<?php
require_once(__LIB_PATH . "html.php");

$html = new HTML();
$twiter = new CTR_twitter();

if (isset($_POST['btn_save'])) {
    $twiter->btn_save_click();
}
?>

<div id="post_box">
<?php echo $html->html_form_tag("frm_service", "", "$target", "post"); ?>
    <br>
    <?php echo $html->html_textarea(4, 6, "txt_post", "txt_post", "textarea", " ", 1, " ", "placeholder = 'Escribe algo! ' ", "required") ?>
    <?php echo $html->html_input_button("submit", "btn_save", "btn_save", "boton", "Publicar", 2, "", "")?>
    <?php echo $html->html_form_end();?>
</div>

<div id="main_panel">
    
    <?php 
    
    $caja_post = "";
    $contposts =0;
    
    foreach ($twiter->obtener_tweets() as $value){
        $caja_post.=" <div class='post_block'> 
                <span class='post_text' id='post_'".$value[0]. " '>
                    <div class='published_date'>
                        <span>Publicado el ".$value[2]."</span>
                   </div> 
                 </span>
                 <div class = 'post_details' >".$value[1]."</div><br/>
                </div>
                </div>";
        $contposts++;
    }
    echo $caja_post;
    ?>
</div>
