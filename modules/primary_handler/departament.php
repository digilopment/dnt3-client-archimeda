
<div id="page-content">
   <div class="content-fullscreens">
      <div class="animate-fade">
		<img class="step-image" src="<?php echo Settings::getImage($data['meta_settings']['keys']['logo_firmy_2']['value']); ?>" alt="">
         <div class="page-polls content">
            <div class="progress-bar">
               <div class="progress-bar-size p25" style="width:<?php echo $progress?>%"></div>
               <em><?php echo $progress?>%</em>
            </div>
            <div class="polls_cont">
               <div class="input-wrap question">
                  <h3><?php echo PollsFrontend::getCurrentQuestions($poll_id, $question_id); ?></h3>
               </div>
               <?php
                  $db = new Db();
                  $query = Polls::getQuestions($poll_id, $question_id);
                  if($db->num_rows($query)>0){
                  	foreach($db->get_results($query) as $row){
                  ?>
				  
				    <?php if(strtolower($row['value']) == "other"){?>
					<div class="input-wrap has-other area"style="display:none;">
						<div class="text-area-wrap">
						<textarea name="<?php echo $poll_input_name; ?>"></textarea>
						</div>
						
					</div>
					<span class="switch-to-opinions" style="display:none;"><i class="fa fa-toggle-on"></i><?php echo MultyLanguage::translate($data, "switch_back_to_opinions", "translate");?></span>
					
					 <?php } ?>
					 
				   <div class="input-wrap <?php if(strtolower($row['value']) == "other"){ echo "has-other";}else{echo "default";}?>" >
					  <input id="input-<?php echo $row['id_entity']?>" class="" type="radio" name="<?php echo $poll_input_name; ?>" required="" value="<?php echo $row['id_entity']?>">
					  <label for="input-<?php echo $row['id_entity']?>"><?php echo $row['value']?> </label>
					  <div class="check">
						 <div class="inside"></div>
					  </div>
				   </div>
               <?php
                  }
                  }
                  ?>
				  <a href="<?php echo $prevQuestion; ?>" class="button button-blue button-full bold uppercase btn-prev" style="color: #fff;margin-top:10px;"><i class="ion ion-ios-arrow-back"></i> <?php echo MultyLanguage::translate($data, "prev_question", "translate");?></a>
				   <a href="<?php echo $nextQuestion; ?>" class="button button-blue button-full bold uppercase btn-next" style="color: #fff;margin-top:10px;display:none;"><?php echo MultyLanguage::translate($data, "next_question", "translate");?> <i class="ion ion-ios-arrow-forward"></i></a>
            </div>
         </div>
      </div>
   </div>
   <?php /* <div class="poll-steps">
      <a class="float-left" href="<?php echo $prevQuestion; ?>">
		<i class="ion ion-ios-arrow-back"></i>
      </a>
   </div> */?>
</div>
	<script>
	 $( document ).ready(function() {
		 var pollData;
		 
		 $(".switch-to-opinions").click(function() {	
			$(".input-wrap").show();
			$(".btn-prev").show();
			$(".input-wrap.has-other.area").hide();
			$(".btn-next").hide();
			$(".switch-to-opinions").hide();
		 });
		 
		 $(".has-other").click(function() {    
			$(".input-wrap").hide();
			$(".btn-prev").hide();
			
			$(".switch-to-opinions").show();
			$(".input-wrap.question").show();
			$(".input-wrap.has-other").show();
			$(".btn-next").show();
			
			/*if($("input[name=<?php echo $poll_input_name; ?>]").is('change')){
				//getPreloader();
				pollData = $("textarea[name=<?php echo $poll_input_name; ?>]").val();
				setCookie("<?php echo $poll_input_name; ?>", pollData, 60);
				//window.location.href = "<?php echo $nextQuestion ?>";
				console.log(pollData);
			}*/

		});
		
		/*$('input[type=textarea][name=<?php echo $poll_input_name; ?>]').change(function() {
		  console.log(this.value);
		});*/
		
		$("textarea[name=<?php echo $poll_input_name; ?>]").change(function() { 
			pollData = $("textarea[name=<?php echo $poll_input_name; ?>]").val();
			setCookie("<?php echo $poll_input_name; ?>", pollData + "&nbsp;", 60);
			console.log(pollData);
		});
		
		 
		
		
		$(".default input[name=<?php echo $poll_input_name; ?>]").click(function() {    
			if($("input[name=<?php echo $poll_input_name; ?>]").is(':checked')){
				getPreloader();
				pollData = $("input[name=<?php echo $poll_input_name; ?>]:checked").val();
				setCookie("<?php echo $poll_input_name; ?>", pollData, 60);
				window.location.href = "<?php echo $nextQuestion ?>";
				console.log(pollData);
			}

		});
	});
	</script>
<style>#page-content{min-height: auto!important;margin-top: 55px;}.content {margin-top: 30px;}</style>