const contactForm = document.querySelector('#area1');
let textCounter = document.querySelector('.text-counter');

contactForm.addEventListener('input', function(e) {
    textCounter.textContent = e.target.value.length;
});

console.log('.text-content');
console.log(textCounter.textContent);



const phoneNumber = document.querySelector('#tel');
const phoneValidation = document.querySelector('.phone-input');
const validationPattern = /^[0-9]{10}$/;

phoneNumber.addEventListener('input', function(e) {
    if (validationPattern. test(phoneNumber.value) !== true) {
        alert("電話番号フォームではありません。");
        phoneValidation.style.backgroundColor = 'pink';
    }
});

phoneNumber.addEventListener('input', function(e) {
    onreset;
}
