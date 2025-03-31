const buttons = document.querySelectorAll('[id^="click"]');
const menus = [document.querySelectorAll('.menu1'), document.querySelectorAll('.menu2'), document.querySelectorAll('.menu3')];
let check = 0;

function toggleMenu(menu) {
    menu.forEach(element => {
        if (element.style.display === 'none' || element.style.display === '') {
            element.style.display = 'block';
            check += 1;
        } else {
            element.style.display = 'none';
            check = 0;
        }

        if (check === 2) {
            check = 0;
            element.style.display = 'none';
        }
    });
}
    buttons.forEach((button, index) => {
    button.addEventListener('click', () => toggleMenu(menus[index]));
  
});



