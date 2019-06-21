
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
               <div class="input-wrap">
                  <h3><?php echo PollsFrontend::getCurrentQuestions($poll_id, $question_id); ?></h3>
               </div>
               <?php
                  $db = new Db();
                  $query = Polls::getQuestions($poll_id, $question_id);
                  if($db->num_rows($query)>0){
                  	foreach($db->get_results($query) as $row){
                  ?>
				   <div class="input-wrap">
					  <input id="input-<?php echo $row['id_entity']?>" type="radio" name="<?php echo $poll_input_name; ?>" required="" value="<?php echo $row['id_entity']?>">
					  <label for="input-<?php echo $row['id_entity']?>"><?php echo $row['value']?> </label>
					  <div class="check">
						 <div class="inside"></div>
					  </div>
				   </div>
               <?php
                  }
                  }
                  ?>
            </div>
         </div>
      </div>
   </div>
   <div class="poll-steps">
      <a class="float-left" href="<?php echo $prevQuestion; ?>">
		<i class="ion ion-ios-arrow-back"></i>
      </a>
   </div>
</div>
	<script>
	 $( document ).ready(function() {
		 var pollData;
		$("input[name=<?php echo $poll_input_name; ?>]").click(function() {    
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