// const answerBtn = document.querySelector('#answer-btn');
// const answerForm = document.querySelector('.answer-form');
// const addCommentPost = document.querySelector('.update-btn');
// const answerDiv = document.querySelector('.post-comment');


// answerBtn.addEventListener('click' , () => {

//     answerForm.classList.toggle('answer-form');
//     answerBtn.classList.toggle('green');

// })


// addCommentPost.addEventListener('click' , () => {
//     alert('تیکت شما با موفقیت ارسال شد')
// })



//----------------------------show_send_post.php

const askArea = document.querySelector('.ask-yes-no');
const activeAnswering = document.querySelector('#active-answer');
const replyTextArea = document.querySelector('.textarea');
const sendAnswerBtn = document.querySelector('send-answer');
const teacherAnswerArea = document.querySelector('.teacher-answer');
const cancelAnswering = document.querySelector('#cancel-answer');
const sendToAnotherTeacherArea = document.querySelector('.send-to-another-teacher');
const activeResending = document.querySelector('#active-send');
const sendToTeacherFormArea = document.querySelector('.form-area');
const cancelResending = document.querySelector('#cancel-resending');

activeAnswering.addEventListener('click' , () => {
    replyTextArea.style.display = 'block';
    askArea.style.display = 'none';
    sendToAnotherTeacherArea.style.display = 'none';
})

cancelAnswering.addEventListener('click' , () => {
    replyTextArea.style.display = 'none';
    askArea.style.display = 'block';
    sendToAnotherTeacherArea.style.display = 'block';
})

activeResending.addEventListener('click' , () => {
    sendToAnotherTeacherArea.style.display = 'none';
    sendToTeacherFormArea.style.display = 'block';
    askArea.style.display = 'none';
})

cancelResending.addEventListener('click' , () => {
    sendToAnotherTeacherArea.style.display = 'block';
    sendToTeacherFormArea.style.display = 'none';
    askArea.style.display = 'block';
})