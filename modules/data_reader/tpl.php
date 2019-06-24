<div id="page-content">
   <div class="content-fullscreen content">
      <div class="animate-fade">
         <img class="nav-img" src="<?php echo Settings::getImage($data['meta_settings']['keys']['logo_firmy_2']['value']); ?>" alt="">
         <div class="content">
		 
				<?php if(isset($data['patient_data']->departament_id)){?>
					<h3><b><?php echo MultyLanguage::translate($data, "department", "translate");?>:</b> <?php echo ArticleView::getPostParam("name",  $data['patient_data']->departament_id); ?><br/></h3>
				 <?php } ?>
							 
             <h4><?php echo $data['patient_data']->form->form_name; ?></h4>
			<p>
               <?php echo $data['patient_data']->form->form_content; ?>
            </p>
			<div class="decoration"></div>
				<p><?php  echo $data['patient_data']->user->name . " " . $data['patient_data']->user->surname . ", " . $data['patient_data']->user->vyska. "cm, " . $data['patient_data']->user->vaha. "kg, " . floor((time() - strtotime($data['patient_data']->user->datetime_publish)) / 31556926)."";?><?php echo MultyLanguage::translate($data, "years", "translate");?></p>
			 <div class="decoration"></div>
            <?php 
               $i = 1;
               foreach($data['patient_data']->data[0] as $item){ 
               ?>
			   <h4><?php echo $item->question; ?></h4>
				<p>
				   <?php echo $item->ans; ?>
				</p>
            <?php $i++; } ?>
			
			<?php if(isset($data['patient_data']->attachments[0])){ ?>
				<div class="decoration"></div>
				<div class="mini-gallery">
				<?php foreach($data['patient_data']->attachments as $item){ ?>
					<img src="<?php echo WWW_PATH."dnt-view/data/external-uploads/".$item ?>">
				<?php } ?>
				</div>
			<?php } ?>
			<div class="decoration"></div>
			
			<div class="qr-wrapper">
				<img src="<?php echo WWW_PATH."dnt-view/data/external-uploads/".$data['patient_data']->qr_image ?>">
			</div>
            <a href="<?php echo WWW_PATH.$this->redirect ?>" class="button button-blue button-full bold uppercase"><?php echo MultyLanguage::translate($data, "back_to_home", "translate");?></a>
         </div>
      </div>
   </div>
</div>
<style>
#page-content{min-height: auto!important;margin-top: 55px;}.content {margin-top: 30px;}.qr-wrapper img{margin: 0px auto;margin-bottom: 25px;}.mini-gallery img{width: 100%;margin: 0px auto;margin-bottom: 10px;margin-top: 10px}
</style>