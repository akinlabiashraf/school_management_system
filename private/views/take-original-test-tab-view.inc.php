<fieldset id="first-field">
	<div class="page-title d-flex align-items-center justify-content-between">
		<h5>My Quiz Attempts</h5>
		<p><b>Total Questions:</b> <?= $total_questions ?></p>
	</div>
	<div class="quiz-attempt-card border-0">
		<?php if (isset($questions) && is_array($questions)): ?>
			<form method="post">

				<?php $num = 0 ?>
				<?php foreach ($questions as $question): $num++ ?>
					<div class="quiz-attempt-body p-0">
						<div class="border p-3 mb-3 rounded-2">
							<div class="bg-light border p-3 mb-3 rounded-2 flex-wrap">
								<div class="row align-items-center">
									<div class="col-md-8">
										<div class="mb-2 mb-md-0">
											<div class="d-flex align-items-center">
												<div class="avatar avatar-lg me-3 flex-shrink-0">
													<!-- <img class="img-fluid rounded-3" src="assets/img/students/quiz.jpg" alt=""> -->
												</div>
												<h5 class="fs-18"><?= esc(ucwords($row->test)) ?></h5>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="text-md-end">
											<p class="d-inline-flex align-items-center mb-0">
												<i class="isax isax-clock me-1"></i>
												00:02:21
												<span class="text-dark ms-1"> / 00:03:00</span>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="mb-3">
								<div class="d-flex align-items-center justify-content-between mb-1">
									<span class="fw-semibold text-gray-9">Quiz Progress</span>
									<span class="bg-primary px-3 py-1 rounded-3">Question #<?= $num ?></span>
								</div>
								<div class="progress progress-xs  flex-grow-1 mb-1">
									<div class="progress-bar bg-success rounded" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="mb-0">
								<h6 class="mb-3"><?= esc($question->question) ?></h6>
								<?php if (file_exists($question->image)): ?>
									<img class="rounded-3" src="<?= ROOT . '/' . $question->image ?>" style="width:50%">
								<?php endif; ?>

								<p class="card-text"><?= esc($question->comment) ?></p>
								<?php
								$type = '';
								?>
								<?php if ($question->question_type == 'objective'):
									$type = '?type=objective';
								?>

								<?php endif; ?>

								<?php if ($question->question_type == 'multiple'):
									$type = '?type=multiple';
								?>
									<?php $choices = json_decode($question->choices); ?>
									<?php foreach ($choices as $letter => $answer): ?>
										<div class="form-check mb-2">
											<input class="form-check-input" style="transform: scale(1.5); cursor: pointer;" type="radio" name="<?= $question->id ?>" value="<?= $letter ?>" id="Radio-sm-1">
											<label class="form-check-label" for="Radio-sm-1">
												<?= $letter ?>: <?= $answer ?>
											</label>
										</div>
									<?php endforeach; ?>

									<!-- <div class="form-check mb-2">
						<input class="form-check-input" type="radio" name="qusetion-1" id="Radio-sm-2">
						<label class="form-check-label" for="Radio-sm-2">
							User Interface
						</label>
					</div>
					<div class="form-check mb-2">
						<input class="form-check-input" type="radio" name="qusetion-1" id="Radio-sm-3">
						<label class="form-check-label" for="Radio-sm-3">
							Universal Interaction
						</label>
					</div>
					<div class="form-check mb-0">
						<input class="form-check-input" type="radio" name="qusetion-1" id="Radio-sm-4">
						<label class="form-check-label" for="Radio-sm-4">
							Usability Information
						</label>
					</div> -->
							</div>
						<?php endif; ?>

						<?php if ($question->question_type != 'multiple'): ?>
							<input type="text" class="form-control" name="<?= $question->id ?>" placeholder="Type your answer here">
						<?php endif; ?>
						</div>
					<?php endforeach; ?>
					<div class="text-end">
						<button type="button" class="btn btn-secondary rounded-pill next_btn">Next<i class="isax isax-arrow-right-3 ms-1 fs-10"></i></button>
					</div>
					</div>
			</form>
		<?php endif; ?>
	</div>

</fieldset>

<nav class="navbar">
	<center>
		<h5>Test Questions</h5>
		<p><b>Total Questions:</b> <?=$total_questions?></p>
	</center>
 
</nav>

<hr>

<?php if(isset($questions) && is_array($questions)):?>

<form method="post">

	<?php $num = 0?>
	<?php foreach($questions as $question): $num++?>
		<div class="card mb-4 ">
		  <div class="card-header">
		    <span  class="bg-primary p-1 text-white rounded">Question #<?=$num?></span> <span class="badge bg-primary float-end p-2"><?=date("F jS, Y H:i:s a",strtotime($question->date))?></span>
		  </div>
		  <div class="card-body">
		    <h5 class="card-title"><?=esc($question->question)?></h5>

		    <?php if(file_exists($question->image)):?>
		    	<img src="<?=ROOT . '/'.$question->image?>" style="width:50%">
		  	<?php endif;?>

		    <p class="card-text"><?=esc($question->comment)?></p>
			  <?php
			  	$type = '';
			  ?>

		    	<?php if($question->question_type == 'objective'):
		    		$type = '?type=objective';
		    	?>
		    	
		    	<?php endif;?>

		    	<?php if($question->question_type == 'multiple'):
		    		$type = '?type=multiple';
		    	?>

		    		<div class="card" style="width: 18rem;">
						  <div class="card-header">
						    Select your answer
						  </div>
						  <ul class="list-group list-group-flush">

						  	<?php $choices = json_decode($question->choices);?>
						  	<?php foreach($choices as $letter => $answer):?>
						    	<li class="list-group-item"><?=$letter?>: <?=$answer?> 

						    	<input class="float-end" style="transform: scale(1.5); cursor: pointer;" type="radio" name="<?=$question->id?>" value="<?=$letter?>">

						    </li>
						    <?php endforeach;?>

 						  </ul>
						</div>
						<br>
		    	
		    	<?php endif;?>

		    <?php if($question->question_type != 'multiple'):?>
  				<input type="text" class="form-control" name="<?=$question->id?>" placeholder="Type your answer here">
  			<?php endif;?>
		  </div>
		 
		</div>
	<?php endforeach;?>

	<center><button class="btn btn-primary">Save Your Answers</button></center>
	</form>
<?php endif;?>

<!-- <div class="container mt-5">
    <form id="test-form">
        <input type="hidden" name="test_id" value="<?= $test_id ?>">
        <div id="question-container">
            <?php foreach ($questions as $index => $q): ?>
                <div class="question-box mb-4" data-question-id="<?= $q['id'] ?>" data-index="<?= $index ?>" style="display: <?= $index === 0 ? 'block' : 'none' ?>;">
                    <h5 class="mb-3">Question <?= $index + 1 ?>:</h5>
                    <p><?= htmlspecialchars($q['question']) ?></p>

                    <?php if ($q['question_type'] === 'objective'): ?>
                        <?php foreach (json_decode($q['options']) as $option): ?>
                            <div class="form-check">
                                <input class="form-check-input answer-radio" type="radio" name="answer_<?= $q['id'] ?>" value="<?= htmlspecialchars($option) ?>">
                                <label class="form-check-label"> <?= htmlspecialchars($option) ?> </label>
                            </div>
                        <?php endforeach; ?>

                    <?php elseif ($q['question_type'] === 'subjective'): ?>
                        <textarea name="answer_<?= $q['id'] ?>" class="form-control answer-text" rows="4"></textarea>

                    <?php elseif ($q['question_type'] === 'multiple'): ?>
                        <?php foreach (json_decode($q['options']) as $option): ?>
                            <div class="form-check">
                                <input class="form-check-input answer-checkbox" type="checkbox" name="answer_<?= $q['id'] ?>[]" value="<?= htmlspecialchars($option) ?>">
                                <label class="form-check-label"> <?= htmlspecialchars($option) ?> </label>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-4">
            <button type="button" id="prev-btn" class="btn btn-secondary">Previous</button>
            <button type="button" id="next-btn" class="btn btn-primary">Next</button>
            <button type="button" id="submit-btn" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>

	<?php $this->view('includes/ajax') ?> -->
