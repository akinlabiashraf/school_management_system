<fieldset id="first-field">
	<div class="page-title d-flex align-items-center justify-content-between">
		<h5>Test Questions</h5>
		<p><b>Total Questions:</b> <?= $total_questions ?></p>
	</div>
	<?php
	$submitted = false;

	if (isset($answered_test_row->submitted) && $answered_test_row->submitted == 1) {
		$submitted = true;
	}

	?>

	<div class="mb-3">
		<div class="d-flex align-items-center justify-content-between mb-1">
			<?php $percentage = get_answer_percentage($row->test_id, $user_id) ?>
			<?php $marked_percentage = get_mark_percentage($row->test_id, $user_id) ?>
			<span class="fw-semibold text-gray-9">Mark Progress </span>
			<span class="bg-info px-3 py-1 rounded-3"><?= $percentage ?>% Answered</span>
			<span class="bg-info px-3 py-1 rounded-3"><?= $marked_percentage ?>% Marked</span>
		</div>
		<div class="progress progress-xs  flex-grow-1 mb-1">
			<div class="progress-bar bg-success rounded" role="progressbar" style="width: <?= $marked_percentage ?>%;"
				aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
		<?php if ($marked): ?>
			<center>
				<?php $score_percentage = get_score_percentage($row->test_id, $user_id) ?>
				<small style="font-size:20px">Test Score:<br></small>
				<div style="font-size: 60px;margin-top: -20px;"><?= $score_percentage ?>%</div>
			</center>
		<?php endif; ?>
		<!-- BUTTON TO SUBMIT TEST -->

		<?php echo "<pre>";
		// print_r($answered_test_row);
		// echo "</pre>";
		?>
		<?php if ($answered_test_row): ?>
			<?php if ($answered_test_row->submitted && !$marked): ?>
				<div class="text-danger d-flex align-items-center justify-content-between mb-1">
					<a onclick="unsubmit_test(event)" href="<?= ROOT ?>mark_test/<?= $row->test_id ?>/<?= $answered_test_row->user_id ?>/?unsubmit=true">
						<button class="btn mx-1 btn-danger float-end">unSubmit Test</button>
					</a>
					<a onclick="set_test_as_marked(event)" href="<?= ROOT ?>mark_test/<?= $row->test_id ?>/<?= $answered_test_row->user_id ?>/?set_marked=true">
						<button class="btn mx-1 btn-primary float-end">Set Test as Marked</button>
					</a>

					<a onclick="auto_mark(event)" href="<?= ROOT ?>mark_test/<?= $row->test_id ?>/<?= $answered_test_row->user_id ?>/?auto_mark=true">
						<button class="btn mx-1 btn-warning float-end">Auto mark</button>
					</a>
				</div>

			<?php endif; ?>

		<?php endif; ?>




		<!-- BUTTON TO SUBMIT TEST END -->
	</div>
	<div class="quiz-attempt-card border-0">
		<?php if (isset($questions) && is_array($questions)): ?>
			<form method="post">

				<?php $num = $pager->offset;; ?>
				<?php foreach ($questions as $question): $num++ ?>
					<?php
					$myanswer = get_answer($saved_answers, $question->id);
					$mymark = get_answer_mark($saved_answers, $question->id);
					?>
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
									<span class="fw-semibold text-gray-9"> </span>
									<span class="bg-primary px-3 py-1 rounded-3">Question #<?= $num ?></span>
								</div>
								<!-- <div class="progress progress-xs  flex-grow-1 mb-1">
									<div class="progress-bar bg-success rounded" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
								</div> -->
							</div>
							<div class="mb-0">
								<h6 class="mb-3"><?= esc($question->question) ?></h6>
								<?php if (is_string($question->image) && file_exists($question->image)): ?>
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
											<?php if (!$submitted): ?>
												<input class="form-check-input" style="transform: scale(1.5); cursor: pointer;" type="radio"
													name="<?= $question->id ?>" <?= $myanswer == $letter ? ' checked ' : '' ?>
													value="<?= $letter ?>" id="Radio-sm-1">
											<?php else: ?>
												<?php if ($myanswer == $letter): ?>
													<i class="fa fa-check float-end"></i>
												<?php endif; ?>
											<?php endif; ?>
											<label class="form-check-label" for="Radio-sm-1">
												<?= $letter ?>: <?= $answer ?>
											</label>
										</div>
									<?php endforeach; ?>
							</div>
							<hr>
							Teacher's mark:
							<?php if (!$marked): ?>
								<div class="form-check">
									<input <?= ($mymark == 1) ? ' checked ' : '' ?> class="form-check-input" type="radio" name="<?= $question->id ?>" value="1" id="flexRadioDefaultcorrect<?= $num ?>">
									<label class="form-check-label" for="flexRadioDefaultcorrect<?= $num ?>">
										Correct
									</label>
								</div>
								<div class="form-check">
									<input <?= ($mymark == 2) ? ' checked ' : '' ?> class="form-check-input" type="radio" name="<?= $question->id ?>" value="2" id="flexRadioDefaultwrong<?= $num ?>">
									<label class="form-check-label" for="flexRadioDefaultwrong<?= $num ?>">
										Wrong
									</label>
								</div>
							<?php else: ?>
								<div style="font-size: 45px;">
									<?= ($mymark == 1) ? '<i class="fa fa-check float-end"></i>' : '<i class="fa fa-times float-end"></i>' ?>
								</div>
							<?php endif; ?>
						<?php endif; ?>

						<?php if ($question->question_type != 'multiple'): ?>

							<div>Answer: <?= $myanswer ?></div>
							<hr>
							Teacher's mark:
							<?php if (!$marked): ?>
								<div class="form-check">
									<input <?= ($mymark == 1) ? ' checked ' : '' ?> class="form-check-input" type="radio" name="<?= $question->id ?>" value="1" id="flexRadioDefaultcorrect<?= $num ?>">
									<label class="form-check-label" for="flexRadioDefaultcorrect<?= $num ?>">
										Correct
									</label>
								</div>
								<div class="form-check">
									<input <?= ($mymark == 2) ? ' checked ' : '' ?> class="form-check-input" type="radio" name="<?= $question->id ?>" value="2" id="flexRadioDefaultwrong<?= $num ?>">
									<label class="form-check-label" for="flexRadioDefaultwrong<?= $num ?>">
										Wrong
									</label>
								</div>
							<?php else: ?>
								<div style="font-size: 35px;">
									<?= ($mymark == 1) ? '<i class="fa fa-check float-end"></i>' : '<i class="fa fa-times float-end"></i>' ?>
								</div>
							<?php endif; ?>
						<?php endif; ?>
						</div>
					<?php endforeach; ?>

					</div>
					<?php if (!$marked): ?>
						<center>
							<small>Click save marks before moving to another page to save</small><br>
							<button class="btn btn-primary">Save Marks</button>
						</center>
			</form>
		<?php endif; ?>
	<?php endif; ?>
	<?php $pager->display() ?>
	</div>

</fieldset>

<script>
	function unsubmit_test(e) {

		if (!confirm("Are you sure you want to remove this test from the submission list!?")) {
			e.preventDefault();
			return;
		}

	}


	function auto_mark(e) {
		if (!confirm("This action may override any custom marks you have saved. Are you sure you want to auto mark this test?!")) {
			e.preventDefault();
			return;
		}
	}

	function set_test_as_marked(e) {
		var percent = <?= $marked_percentage ?>;

		if (percent < 100) {
			e.preventDefault();
			alert("You have only marked " + percent + "% of the questions. You can only set a test as marked after marking all questions");
			return;
		}
		if (!confirm("You wont be able to mark questions after this action. continue?!")) {
			e.preventDefault();
			return;
		}
	}
</script>