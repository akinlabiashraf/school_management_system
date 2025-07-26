<fieldset id="first-field">
	<div class="page-title d-flex align-items-center justify-content-between">
		<h5>My Quiz Attempts</h5>
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
			<?php $percentage = get_answer_percentage($row->test_id, Auth::getUser_id()) ?>
			<span class="fw-semibold text-gray-9">Quiz Progress </span>
			<span class="bg-info px-3 py-1 rounded-3"><?= $percentage ?>% Answered</span>
		</div>
		<div class="progress progress-xs  flex-grow-1 mb-1">
			<div class="progress-bar bg-success rounded" role="progressbar" style="width: <?= $percentage ?>%;"
				aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
		<!-- BUTTON TO SUBMIT TEST -->

		<?php echo "<pre>";
		// print_r($answered_test_row);
		// echo "</pre>";
		?>
		<?php if ($answered_test_row): ?>
			<?php if ($answered_test_row->submitted): ?>
				<div class="text-success">This test has been submitted</div>
			<?php else: ?>
				<div class="text-danger d-flex align-items-center justify-content-between mb-1">
					<span>This test has not yet been submitted</span><br>
					<a onclick="submit_test(event)" href="<?= ROOT ?>/take_test/<?= $row->test_id ?>/?submit=true">
						<button class="btn btn-danger float-end">Submit Test</button>
					</a>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<div class="text-warning">You haven't answered any question yet.</div>
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
						<?php endif; ?>

						<?php if ($question->question_type != 'multiple'): ?>
							<?php if (!$submitted): ?>
								<input type="text" class="form-control mb-3" name="<?= $question->id ?>"
									placeholder="Type your answer here" value="<?= $myanswer ?>">
							<?php else: ?>
								<div>Answer: <?= $myanswer ?></div>
							<?php endif; ?>
						<?php endif; ?>
						</div>
					<?php endforeach; ?>
					<div class="text-end">
						<button type="button" class="btn btn-secondary rounded-pill next_btn">Next<i
								class="isax isax-arrow-right-3 ms-1 fs-10"></i></button>
					</div>
					</div>
					<?php if (!$submitted): ?>
						<code>click save button before clicking next</code> <br>
						<center><button class="btn btn-primary">Save Your Answers</button></center>
			</form>
		<?php endif; ?>
	<?php endif; ?>
	<?php $pager->display() ?>
	</div>

</fieldset>

<script>
	var percent = <?= $percentage ?>;

	function submit_test(e) {

		if (!confirm("Are you sure you want to submit this test!?")) {
			e.preventDefault();
			return;
		}

		if (percent < 100) {
			if (!confirm("You have only answered " + percent + "% of the test. Are you still sure you want to submit bobo?!")) {
				e.preventDefault();
				return;
			}
		}
	}
</script>