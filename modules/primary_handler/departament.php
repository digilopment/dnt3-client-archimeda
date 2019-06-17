<div id="page-content">
	<div class="content-fullscreens">
	   <div class="animate-fade">
		
		<link href="http://ankety.markiza.sk/css/polls.css" media="screen" rel="stylesheet" type="text/css">
		<div class="page-polls content">

			
			<div class="progress-bar"><div class="progress-bar-size p25" style="width:<?php echo $progress?>%"></div><em><?php echo $progress?>%</em></div>
			
				<a href="#" class="page-login-logo">
					<img class="preload-image" src="<?php echo Settings::getImage($data['meta_settings']['keys']['logo_firmy']['value']); ?>" alt="img">
				</a>
				
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
					<div class="check"><div class="inside"></div></div>
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
		<a class="float-right" href="<?php echo $nextQuestion; ?>">
			<i class="ion ion-ios-arrow-forward"></i>
		</a>
	</div>
				
 </div>
 

	<script>
	 $( document ).ready(function() {
		 var pollData;
		$("input[name=<?php echo $poll_input_name; ?>]").click(function() {    
			if($("input[name=<?php echo $poll_input_name; ?>]").is(':checked')){
				pollData = $("input[name=<?php echo $poll_input_name; ?>]:checked").val();
				setCookie("<?php echo $poll_input_name; ?>", pollData, 60);
				window.location.href = "<?php echo $nextQuestion ?>";
				console.log(pollData);
			}

		});
	});
	</script>
<style>
#page-content .poll-steps{
	background-color: #1a79b2;
    color: #fff;
    position: absolute;
    bottom: 75px;
    width: 100%;
	padding: 0px 20px;
}
#page-content .poll-steps a{
	color: #fff;
	padding: 5px;
}
#page-content .poll-steps i{
	font-size: 30px;
}
#page-content .poll-steps a.float-left{
	float:left;
}
#page-content .poll-steps a.float-right{
	float:right;
}

.progress-bar {
    background-color: #eee;
    height: 25px;
    border-radius: 0px;
    box-shadow: inset 0px 0px 0px 0px rgba(0,0,0,0.1);
    margin-bottom: 15px;
}
.progress-bar em {
    position: absolute;
    z-index: 10;
    right: 20px;
    font-size: 15px;
    font-style: inherit;
    height: 25px;
    line-height: 25px;
    font-weight: bold;
	color: #111;
    margin-top: 1px;
    margin-right: -15px;
}
.progress-bar-size {
    position: absolute;
    margin-top: 0px;
    margin-left: 0px;
    display: block;
    height: 100%;
    border-radius: 0px;
    border: 0px;
    border-bottom: 0px;
    background-color: #1a79b2 !important;
}

.page-polls {
 margin-top: 75px;
 width: 100%;
}
.page-polls h3 {
    padding: 23px;
    padding-bottom: 1px;
    line-height: 30px;
    font-size: 24px;
	color: #555;
}
.polls_cont input[type=radio]:checked ~ .check::before {
    background: #1a79b2;
}
.polls_cont input[type=radio]:checked ~ .check {
    border: 2px solid #1a79b2;
}
.polls_cont .input-wrap .check {
    border: 2px solid #1a79b2;
}
.polls_cont .input-wrap .check {
    height: 30px;
    width: 30px;
}
.polls_cont .input-wrap .check::before {
    height: 16px;
    width: 16px;
	top: 5px;
    left: 5px;
}
.polls_cont .input-wrap {
    float: none;
	cursor:pointer;
	overflow: inherit;
    height: auto;
}
@media screen and (max-width: 500px) {
	.polls_cont .input-wrap label {
		padding: 30px 0px 0px 60px;
		margin: 5px 0px;
	}
}
.polls_cont .input-wrap label {
    font-size: 15px;
}
</style>
 <?php /* <a href="#" class="back-to-top-badge"><i class="ion-ios-arrow-up"></i></a> */ ?>