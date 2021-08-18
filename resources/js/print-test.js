const buttonPrintTest = document.querySelectorAll('.button--print-test');
const variants = document.querySelectorAll('.variants');

buttonPrintTest.forEach(element=>{
    element.addEventListener('click', ()=>{
        variants.forEach(item=>{
            item.open = false;
            item.style.visibility = 'hidden';
        });
        element.parentElement.style.visibility = 'visible';
        element.parentElement.open = true;
        element.parentElement.style.opacity = '1';
        window.print();
        variants.forEach(item=>{
            item.style.visibility = 'visible';
        });
    });
});
