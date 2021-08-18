const btnAddVariantOfQuestion = document.getElementById('btnAddVariantOfQuestion');
const variantsOfQuestionList = document.getElementById('variantsOfQuestionList');
const formAddQuestion = document.getElementById('formAddQuestion');
const countOfAnswers = document.getElementById('countOfAnswers');

let deleteBtnVariantOfQuestion = document.querySelectorAll('.button__delete');
let countsOfDeleteBtn = document.querySelectorAll('.button__delete');
let sumOfVariantsOfQuestion = 0;
let btnSubmit = document.querySelector('.form__submit');

const deleteVariantIfQuestion = () => {
    for (let i = (deleteBtnVariantOfQuestion.length-1); i >=0 ; i--) {
        deleteBtnVariantOfQuestion[i].addEventListener('click', e => {
            deleteBtnVariantOfQuestion[i].parentElement.remove();
            countsOfDeleteBtn = document.querySelectorAll('.button__delete');
            sumOfVariantsOfQuestion = countsOfDeleteBtn.length;
            countOfAnswers.value = sumOfVariantsOfQuestion;
            btnSubmit = document.querySelector('.form__submit');
            if (sumOfVariantsOfQuestion === 0 ){
                btnSubmit.remove();
            }
        });
    }
};

btnAddVariantOfQuestion.addEventListener('click', e => {
    e.preventDefault();
    const questionWrapper = document.createElement('div');
    questionWrapper.classList.add('form__wrapper');
    sumOfVariantsOfQuestion = Number(countOfAnswers.value);

    const answer = document.createElement('input');
    answer.type = 'text';
    answer.name = 'variantOfAnswer-'+ sumOfVariantsOfQuestion;
    answer.required = true;
    answer.classList.add('form__input', 'question__input');

    const checkbox  = document.createElement('input');
    checkbox.type = 'checkbox';
    checkbox.classList.add('form__checkbox');
    checkbox.name = 'rightVariantOfAnswer-'+ sumOfVariantsOfQuestion;

    const deleteBtn = document.createElement('button');
    deleteBtn.type = 'button';
    deleteBtn.classList.add('button', 'button--red', 'button__delete');
    deleteBtn.textContent = 'Удалить';

    questionWrapper.append(checkbox, answer, deleteBtn);
    variantsOfQuestionList.append(questionWrapper);

    sumOfVariantsOfQuestion++;
    if (sumOfVariantsOfQuestion === 1){
        const btnSubmitForm = document.createElement('button');
        btnSubmitForm.classList.add('form__button', 'form__submit');
        btnSubmitForm.type = 'submit';
        btnSubmitForm.textContent = 'Сохранить';
        formAddQuestion.append(btnSubmitForm);
    }
    deleteBtnVariantOfQuestion = document.querySelectorAll('.button__delete');
    countOfAnswers.value = sumOfVariantsOfQuestion;
    deleteVariantIfQuestion();
});

deleteVariantIfQuestion();


