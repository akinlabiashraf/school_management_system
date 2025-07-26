<script>
    // assets/js/ajax-save-answer.js

document.addEventListener('DOMContentLoaded', () => {
    const questions = document.querySelectorAll('.question-box');
    let current = 0;

    const showQuestion = (index) => {
        questions.forEach(q => q.style.display = 'none');
        questions[index].style.display = 'block';
    };

    const saveAnswer = (index) => {
        const box = questions[index];
        const qid = box.dataset.questionId;
        let answer = '';

        if (box.querySelector('.answer-radio')) {
            const selected = box.querySelector('.answer-radio:checked');
            if (selected) answer = selected.value;
        } else if (box.querySelector('.answer-text')) {
            answer = box.querySelector('.answer-text').value;
        } else if (box.querySelector('.answer-checkbox')) {
            const checked = box.querySelectorAll('.answer-checkbox:checked');
            answer = Array.from(checked).map(c => c.value);
        }

        const payload = {
            question_id: qid,
            answer: answer
        };

        fetch('save-answer.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });
    };

    document.getElementById('next-btn').addEventListener('click', () => {
        saveAnswer(current);
        if (current < questions.length - 1) {
            current++;
            showQuestion(current);
        }
    });

    document.getElementById('prev-btn').addEventListener('click', () => {
        saveAnswer(current);
        if (current > 0) {
            current--;
            showQuestion(current);
        }
    });

    document.getElementById('submit-btn').addEventListener('click', () => {
        saveAnswer(current);
        alert('Test submitted!');
        // You can optionally redirect or finalize submission here
    });

    showQuestion(current);
});

</script>