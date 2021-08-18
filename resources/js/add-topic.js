const subjectsSelect = document.getElementById('subjects');
const formAddTopics = document.getElementById('formAddTopics');
const amountOfTopics = document.getElementById('amountOfTopics');
const topicsOfQuestions = document.querySelectorAll('.topicsOfQuestions');
const url = 'http://127.0.0.1:8000/tests/topics';

const addTopics = async () => {
    let formBtnSubmit = document.querySelector('.form__submit');
    let labelForTopicsEl = document.getElementById('labelForTopics');
    let topicsBlock = document.getElementById('topics');
    if (topicsBlock){
        topicsBlock.remove();
    }
    if(formBtnSubmit){
        formBtnSubmit.remove();
    }
    if(labelForTopicsEl){
        labelForTopicsEl.remove();
    }
    const topicsList = await fetch(url);
    const topicsJson = await topicsList.json();
    let sumOfTopics = 0;

    if (topicsJson.topics.length>0){
        topicsBlock = document.createElement('div');
        topicsBlock.id = 'topics';

        const LabelForTopics = document.createElement('label');
        LabelForTopics.htmlFor = 'topics';
        LabelForTopics.classList.add('form__label');
        LabelForTopics.innerHTML = 'Выберете темы';
        LabelForTopics.id = 'labelForTopics';
        formAddTopics.append(LabelForTopics, topicsBlock);

        for (let i=0; i<topicsJson.topics.length; i++){
            if (topicsJson.topics[i].subject_id == subjectsSelect.value){
                const topicsWrapper = document.createElement('div');
                topicsWrapper.classList.add('form__wrapper', 'form__test-wrapper');

                const topicsInput = document.createElement('input');
                topicsInput.type = 'checkbox';
                topicsInput.id = 'topicId-' + i;
                topicsInput.classList.add('form__checkbox', 'test__checkbox');
                topicsInput.value = topicsJson.topics[i].id;
                topicsInput.name = 'topicId-' + i;
                if(topicsOfQuestions.length>0){
                    for (let i=0; i<topicsOfQuestions.length; i++){
                        if (topicsOfQuestions[i].value == topicsInput.value){
                            topicsInput.checked = true;
                        }
                    }
                }

                const topicsLabel = document.createElement('label');
                topicsLabel.innerHTML = topicsJson.topics[i].name;
                topicsLabel.htmlFor = 'topicId-' + i;
                topicsLabel.classList.add('text', 'test__topics-label');

                topicsWrapper.append(topicsInput, topicsLabel);
                topicsBlock.append(topicsWrapper);
                sumOfTopics++;
            }
        }
        amountOfTopics.value = sumOfTopics;
        if (sumOfTopics > 0) {
            const btnSubmitForm = document.createElement('button');
            btnSubmitForm.classList.add('form__button', 'form__submit');
            btnSubmitForm.type = 'submit';
            btnSubmitForm.textContent = 'Сохранить';
            formAddTopics.append(btnSubmitForm);
        }
    }
}

subjectsSelect.onchange = async () => {
    await addTopics();
}

window.addEventListener('load', ()=>{
    addTopics().then();
})
