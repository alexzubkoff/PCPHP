<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle='SoftServe ITAcademy'. ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<style>
  .nb-error {
  margin: 0 auto;
  text-align: center;
  max-width: 480px;
  padding: 60px 30px;
  background-color: #009;
}

 .error-code {
  color:#F8F8F8;
  font-size: 96px;
  line-height: 100px;
}

.error-desc .font-bold{
  color:#F8F8F88;
  font-size: 12px;
}

</style>

<div class="nb-error">
      <div class="error-code"><?php echo $code; ?></div>
      <h3 class="font-bold" style="color: white;">We couldn't find the page.<?php echo CHtml::encode($message); ?></h3>
      
      <div class="error-desc" style="color: white;">
          Sorry, but the page you are looking for was either not found or does not exist. <br/>
          Try refreshing the page or click the button to go back to the Homepage.  
      </div>
  </div>