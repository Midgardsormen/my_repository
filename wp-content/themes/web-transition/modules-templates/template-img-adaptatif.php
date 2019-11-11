<?php
/*
*	Module Template Name: Module image adaptatif
*	1 à 4 image(s) :
* image_de_fond
* image_de_fond_md
* image_de_fond_sm
* image_de_fond_xs
*/
?>

<div class="image"></div>

<?php
/* Faire un template d'affichage d'image sous WP :
- PHP : Calcule du ratio hauteur/largeur => padding-top
- PHP : création des balises html + style (pour chaque point de rupture). Les images sont identifiées par leur suffixe:
- xs
- sm
- md
- "sans suffixe" pour lg (et xlg)
*/
$id_section = $this->id_section ;// get_row_layout();

?>

<style type="text/css">
<?php
$image = get_sub_field($this->img_lg);
$image_md = get_sub_field($this->img_md);
$image_sm = get_sub_field($this->img_sm);
$image_xs = get_sub_field($this->img_xs);

if( !empty($image) ){
  $pt = ($image['width']>0)?$image['height']/($image['width']/100):100;
  $image_html = "#".$id_section." .bg .image {
    padding-top: ".$pt."%;
    background-image: url('".$image['url']."');
    background-size: 100% auto;
  }";
}
if( !empty($image_md) ){
  $pt = ($image_md['width']>0)?$image_md['height']/($image_md['width']/100):100;
  $image_html_md = "#".$id_section." .bg .image {
    padding-top: ".$pt."%;
    background-image: url('".$image_md['url']."');
    background-size: 100% auto;
  }";
}
if( !empty($image_sm) ){
  $pt = ($image_sm['width']>0)?$image_sm['height']/($image_sm['width']/100):100;
  $image_html_sm = "#".$id_section." .bg .image {
    padding-top: ".$pt."%;
    background-image: url('".$image_sm['url']."');
    background-size: 100% auto;
  }";
}
if( !empty($image_xs) ){
  $pt = ($image_xs['width']>0)?$image_xs['height']/($image_xs['width']/100):100;
  $image_html_xs = "#".$id_section." .bg .image {
    padding-top: ".$pt."%;
    background-image: url('".$image_xs['url']."');
    background-size: 100% auto;
  }";
}




/*
image_de_fond est obligatoire en saisie

8 cas de figure:
$image_md && $image_sm => empty
$image seule
$image_md => empty
$image & $image_sm
$image_sm => empty
$image & $image_md
sinon:
$image & $image_md & $image_sm

*/
if( !empty($image_md) ){
  if( !empty($image_sm) ){
    if( !empty($image_xs) ){
      /* md + sm + xs */?>
      @media (min-width: 1280px) {
        <?php echo $image_html;?>
      }
      @media (min-width: 1024px) and (max-width: 1279px) {
        <?php echo $image_html_md;?>
      }
      @media (min-width: 768px) and (max-width: 1023px) {
        <?php echo $image_html_sm;?>
      }
      @media (max-width: 767px) {
        <?php echo $image_html_xs;?>
      }
      <?php
    }
    else{
      /* md + sm */?>
      @media (min-width: 1280px) {
        <?php echo $image_html;?>
      }
      @media (min-width: 1024px) and (max-width: 1279px) {
        <?php echo $image_html_md;?>
      }
      @media (max-width: 1023px) {
        <?php echo $image_html_sm;?>
      }
      <?php
    }
  }
  else{
    if( !empty($image_xs) ){
      /* md + xs */?>
      @media (min-width: 1280px) {
        <?php echo $image_html;?>
      }
      @media (min-width: 768px) and (max-width: 1279px) {
        <?php echo $image_html_md;?>
      }
      @media (max-width: 767px) {
        <?php echo $image_html_xs;?>
      }
      <?php
    }
    else{
      /* md */?>
      @media (min-width: 1280px) {
        <?php echo $image_html;?>
        }
      @media (max-width: 1279px) {
        <?php echo $image_html_md;?>
        }
      <?php
    }
  }
}
else{
  if( !empty($image_sm) ){
    if( !empty($image_xs) ){
      /* sm + xs */?>
      @media (min-width: 1024px) {
        <?php echo $image_html;?>
      }
      @media (min-width: 768px) and (max-width: 1023px) {
        <?php echo $image_html_sm;?>
      }
      @media (max-width: 767px) {
        <?php echo $image_html_xs;?>
      }
      <?php
    }
    else{
      /* sm */?>
      @media (min-width: 1024px) {
        <?php echo $image_html;?>
      }
      @media (max-width: 1023px) {
        <?php echo $image_html_sm;?>
      }
      <?php
    }
  }
  else{
    if( !empty($image_xs) ){
      /* xs */?>
      @media (min-width: 768px) {
        <?php echo $image_html;?>
      }
      @media (max-width: 767px) {
        <?php echo $image_html_xs;?>
      }
      <?php
    }
    else{
      /* aucun */
      echo $image_html;
    }
  }
}
?>



</style>
