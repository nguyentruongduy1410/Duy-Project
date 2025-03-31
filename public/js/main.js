var find = document.querySelector('.find');
var hide_find = document.querySelector('.hide-find');
var hidden = document.getElementById('hidden');
var container = document.getElementById('container');
var body = document.querySelector('body');
find.addEventListener('click', () => {
    find.style.borderRadius = '20px 20px 0 0';
    hide_find.style.display = 'block';
    hidden.style.display = 'block';
    container.style.overflow = 'hidden';
    body.style.overflowY = 'hidden';
    hidden.style.zIndex = 999;

})
hidden.addEventListener('click', () => {
    hidden.style.top = 'auto';
    hidden.style.display = 'none';

    find.style.borderRadius = '20px';
    hide_find.style.display = 'none';

    hide_right_language.classList.remove('active');
    setTimeout(() => {
        hide_right_language.style.display = 'none';
    }, 300);

    hide_right_login.classList.remove('active');
    setTimeout(() => {
        hide_right_login.style.display = 'none';

    }, 300);
})

// ngôn ngữ
var hide_right_language = document.getElementById('hide-right');
var out_right_language = document.querySelector('#hide-right .bx');
var language = document.querySelector('.language');
language.addEventListener('click', () => {
    hide_right_language.style.display = 'block';
    hidden.style.display = 'block';
    hidden.style.top = '0';
    setTimeout(() => {
        hide_right_language.classList.add('active');
    }, 10);



})
out_right_language.addEventListener('click', () => {
    hide_right_language.classList.remove('active');
    setTimeout(() => {
        hide_right_language.style.display = 'none';
        hidden.style.display = 'none';
    }, 300);
});



// login

document.addEventListener("DOMContentLoaded", function () {
    function toggleModal(formId) {
        document.getElementById('hide-right-login').style.display = 'none';
        document.getElementById('hide-right-signup').style.display = 'none';
        document.getElementById('hide-right-forgot-password').style.display = 'none';

        let selectedForm = document.getElementById(formId);
        if (selectedForm) {
            selectedForm.style.display = 'block';
        }
        document.getElementById('hidden').style.display = 'block';
        document.getElementById('hidden').style.top = '0';
        hidden.style.zIndex = 1000;
        body.style.overflowY = 'hidden';

    }

    //đăng ký đăng nhập
    //hiển thị đăng nhập
    document.querySelector('#checkout-form')?.addEventListener('click', e => {
       e.preventDefault();
        if (!window.isAuthenticated) {
            toggleModal('hide-right-login');
        } else {
            this.location.href = '/checkout'
        }
        
    });
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('showLogin')) {
        console.log("showLogin found, mở modal...");
        let token = localStorage.getItem('token');
        if (!token) {
            toggleModal('hide-right-login');
            console.log('ok');

        }
    }
    // function showLoginPage(event, action) {
    //     event.preventDefault();
    //     if (action === 'login') {
    //         toggleModal('hide-right-login');
    //     } else if (action === 'register') {
    //         toggleModal('hide-right-signup');
    //     }
    // }

    document.querySelector('.loginEven')?.addEventListener("click", (e) => {
        e.preventDefault();
        toggleModal('hide-right-login');
    })
    document.querySelector('.registerEven')?.addEventListener("click", (e) => {
        e.preventDefault();
        toggleModal('hide-right-signup');
    })

    document.querySelector('.user')?.addEventListener("click", (e) => {
        e.preventDefault();
        toggleModal('hide-right-login');
    });
    //hiển thị đăng ký
    document.querySelector('.register')?.addEventListener("click", (e) => {
        e.preventDefault();
        toggleModal('hide-right-signup');
    });
    //hiển thị quên mật khẩu
    document.querySelector('.forgot_password')?.addEventListener('click', (e) => {
        e.preventDefault();
        toggleModal('hide-right-forgot-password');
    })
    //đóng login
    document.querySelectorAll('#hidden, #close-login').forEach(el => {
        el?.addEventListener("click", closeModals);
    });

    function closeModals() {
        ['hide-right-login', 'hide-right-forgot-password', 'hide-right-signup', 'hidden'].forEach(id => {
            document.getElementById(id).style.display = 'none';
        });
    }
    //đăng ký
    document.getElementById('hide-right-signup')?.addEventListener("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this);

        fetch("/register", {
            method: "POST",
            body: formData,
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json",
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.errors) {
                    console.error("Lỗi đăng ký:", data.errors);
                    alert("Đăng ký thất bại. Vui lòng kiểm tra lại thông tin.");
                } else {
                    alert("Đăng ký thành công!");
                    closeModals();
                }
            })
            .catch(error => console.error("Lỗi gửi yêu cầu đăng ký:", error));
    });
    //đăng nhập
    document.getElementById('hide-right-login')?.addEventListener('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch("/login", {
            method: "POST",
            body: formData,
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Accept": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
        })
            .then(response => response.json().catch(() => response.text()))
            .then(data => {
                if (data.error) {
                    alert("Lỗi: " + data.error);
                } else {
                    alert("Đăng nhập thành công!");
                    window.location.reload();
                }
            })
            .catch(error => console.error("lỗi khi gửi yêu cầu đăng nhập:", error));
    })
});

//kiểm tra đăng nhập
document.addEventListener("DOMContentLoaded", function () {
    fetch('/check-login', {
        method: 'GET',
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.user) {
                let loginButton = document.querySelector('.user');
                let registerButton = document.querySelector('.register');

                document.querySelector('.log-out-user').style.display = 'block';
                document.querySelector('.hide-user-login').innerText = `Chào, ${data.user.name}`;


                if (registerButton) registerButton.replaceWith(registerButton.cloneNode(true));
                if (loginButton) {
                    loginButton.replaceWith(loginButton.cloneNode(true));
                    loginButton = document.querySelector('.user');
                    loginButton.addEventListener("click", function (e) {
                        e.preventDefault();
                        window.location.href = "/customer";
                    });
                }
            }
        })
        .catch(() => localStorage.removeItem('token'));
});

//đăng xuất
document.getElementById('logout-form').addEventListener("click", function (e) {
    fetch('/logout', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
        .then(() => {
            localStorage.clear();
            // window.location.href = '/login';
            window.location.href = '/';

        });
});





//hover user
var user = document.querySelector('.user-list');
var hideUser = document.querySelector('.hide-user');
let hideTimeout, showTimeout;

user.addEventListener('mouseenter', () => {
    clearTimeout(hideTimeout); // Ngăn việc ẩn nếu đang ẩn
    showTimeout = setTimeout(() => {
        hideUser.classList.add('active');
    }, 200); // Thời gian trước khi hiện
});

user.addEventListener('mouseleave', (e) => {
    clearTimeout(showTimeout); // Ngăn việc hiện nếu đang hiện
    if (!user.contains(e.relatedTarget)) {
        hideTimeout = setTimeout(() => {
            hideUser.classList.remove('active');
        }, 200); // Thời gian trước khi ẩn
    }
});

//slider
document.addEventListener("DOMContentLoaded", function () {
    let list = document.querySelector('aside .list');
    let item = document.querySelectorAll('aside .list .item');
    let dots = document.querySelectorAll('aside .dots li');

    let active = 0;
    let lengthItem = item.length - 1;

    function reloadSlider() {
        let checkLeft = item[active].offsetLeft;
        list.style.transform = `translateX(${-checkLeft}px)`;

        let lastActiveDot = document.querySelector('aside .dots li.active');
        if (lastActiveDot) {
            lastActiveDot.classList.remove('active');
        }

        dots[active].classList.add('active');
    }

    dots.forEach((li, key) => {
        li.addEventListener('click', function () {
            active = key;
            reloadSlider();
        });
    });

    reloadSlider(); // Gọi ngay khi DOMContentLoaded
});




//gợi í tìm kiếm
document.addEventListener("DOMContentLoaded", function () {
    let searchInput = document.getElementById("search-input");
    let suggestionsBox = document.getElementById("suggestions-box");
    searchInput.addEventListener("keyup", function () {
        let keyword = this.value.trim();
        if (keyword.length > 0) {
            fetch(`/search-suggestions?keyword=${keyword}`)
                .then(response => response.json())
                .then(data => {
                    let suggestionsHTML = "";
                    if (data.length > 0) {
                        data.forEach(product => {
                            suggestionsHTML += `
                                <div class="suggestion-item">
                                    <a href="/detail/${product.slug}">
                                        <img src="/img/${product.image}" alt="${product.name}" width="40">
                                        <span>${product.name}</span>
                                    </a>
                                </div>
                            `;
                        })
                    } else {
                        suggestionsHTML = "<p>Không tìm thấy sản phẩm</p>";
                    }
                    suggestionsBox.innerHTML = suggestionsHTML;
                    suggestionsBox.style.display = "block";
                });

        } else {
            suggestionsBox.style.display = "none";
        }
    });
    document.addEventListener("click", function (event) {
        if (!searchInput.contains(event.target) && !suggestionsBox.contains(event.target)) {
            suggestionsBox.style.display = "none";
        }
    });
});


