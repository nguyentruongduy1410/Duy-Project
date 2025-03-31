var boximg = document.querySelectorAll('.box-img');
boximg.forEach(box => {
    box.addEventListener('click', () => {
        boximg.forEach(item => item.classList.remove('outline'));
        box.classList.add('outline');
    })
})


var box_size_right = document.querySelectorAll('.box-size-right');
box_size_right.forEach(boxSize => {
    boxSize.addEventListener('click', () => {
        box_size_right.forEach(item2 => item2.classList.remove('outline-size'));
        boxSize.classList.add('outline-size');
    })
})

var favourite = document.querySelector('.favourite');
var heart = document.querySelector('.add-to-cart .favourite i'); 

favourite.addEventListener('click', () => {
    if (heart.classList.contains('bx-heart')) {
        heart.classList.remove('bx-heart');
        heart.classList.add('bxs-heart');
    } else {
        heart.classList.remove('bxs-heart');
        heart.classList.add('bx-heart');
    }
});


const detailsHeaders = document.querySelectorAll('.details-header');

detailsHeaders.forEach(header => {
    const detailsContent = header.nextElementSibling; 
    const toggleIcon = header.querySelector('i');

    header.addEventListener('click', () => {
        if (detailsContent.style.display === 'none' || detailsContent.style.display === '') {
            detailsContent.style.display = 'block';
            toggleIcon.classList.remove('bx-chevron-down');
            toggleIcon.classList.add('bxs-chevron-up');
        } else {
            detailsContent.style.display = 'none';
            toggleIcon.classList.remove('bxs-chevron-up');
            toggleIcon.classList.add('bx-chevron-down');
        }
    });
});

var quantitynumber = 1;
var up = document.querySelector('.up-quantity');
var douwn = document.querySelector('.douwn-quantity');
var quantity = document.getElementById('quantity');

up.addEventListener("click", () => {
    if(quantitynumber<10){
        quantity.value = parseInt(quantity.value) + 1;
        quantitynumber++;
    }
});

douwn.addEventListener("click", () => {
    if(quantitynumber>1){
        quantity.value = parseInt(quantity.value) - 1;
        quantitynumber--;
    }
});


