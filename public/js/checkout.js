// hiện
var change_payment_method = document.querySelectorAll('.change-payment-method');
var change_box = document.querySelectorAll('.change_payment_method_box');
var hidden = document.getElementById('hidden');
var body = document.querySelector('body');
var exits = document.querySelectorAll('.exits-method');
change_payment_method.forEach((button, index) => {
    button.addEventListener('click', () => {
        change_box.forEach(box => {
            box.style.display = 'none';
            // if(box !== event.target) box.style.display = 'flex';
        })
        change_box[index].style.display = 'flex';
        hidden.style.display = 'block';
        body.style.overflowY = 'hidden';
    })
})
// đóng
exits.forEach(e => {
    e?.addEventListener('click', closePayment);
});
function closePayment() {
    change_box.forEach(id => {
        id.style.display = 'none';
    });
    // change_box.style.display = 'none';
    hidden.style.display = 'none';
    body.style.overflowY = 'auto';


};
hidden.addEventListener('click', closePayment);
// chỉ dc check box 1 ô và thay đổi html
var payment_checkbox = document.querySelectorAll('.payment-checkbox');
var checkoutPayment = document.querySelector('.checkout-payment form');
var changeButton = document.querySelector('.change-payment-method');
payment_checkbox.forEach(e => {
    e.addEventListener('change', (event) => {
        payment_checkbox.forEach(i => {
            if (i !== event.target) i.checked = false

        });
    });
});
document.addEventListener('DOMContentLoaded', () => {
    fetch('/set-payment-method', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            payment_method: selectedLabel,
            payment_img: selectedImg
        })
    })
    .catch(error => console.error('Lỗi:', error));
})
document.addEventListener('DOMContentLoaded', () => {
    fetch('/get-payment-method')
        .then(response => response.json())
        .then(data => {
            if (data.payment_method && data.payment_method.label) {
                checkoutPayment.innerHTML = `
                    <img src="${data.payment_method.img}" alt="" width="35px">
                    <label>${data.payment_method.label}</label>
                `;
                payment_checkbox.forEach(checkbox => {
                    if (checkbox.value === data.payment_method.label) {
                        checkbox.checked = true;
                    }
                });
            }
        })
        // .then(() => {
        //     window.location.href = '/checkout'; // Chuyển hướng lại trang checkout
        // })
        .catch(error => console.error('Lỗi:', error));
});

//xử lý đặt hàng
var btnCheckout = document.querySelectorAll('.btn-cart button');
btnCheckout.forEach(btn => {
    btn.addEventListener('click', () => {
        fetch('/get-payment-method')
            .then(response => response.json())
            .then(data => {
                // console.log(data.payment_method.label);
                if (data.payment_method.label === "Thanh toán bằng VNPAY") {
                    // window.location.href = '/payment';
                    document.getElementById('frmCreateOrder').submit();
                } else {
                    console.log('xử lý tiếp');
                    alert("chưa xử lý tiền mặc");
                }
            })

    })
})
