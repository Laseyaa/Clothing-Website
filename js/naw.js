


document.addEventListener("DOMContentLoaded", function () {
    const menu = document.querySelector(".menu");
    const menuMain = menu.querySelector(".menu-main");
    const goBack = menu.querySelector(".go-back");
    const menuTrigger = document.querySelector(".mobile-menu-trigger");
    const closeMenu = menu.querySelector(".mobile-menu-close");
    const overlay = document.querySelector(".menu-overlay");
    let subMenu;
 
    menuMain.addEventListener("click", (e) => {
        if (e.target.closest(".menu-item-has-children")) {
            const hasChildren = e.target.closest(".menu-item-has-children");
            showSubMenu(hasChildren);
        }






    });

    goBack.addEventListener("click", () => {
        hideSubMenu();
    });

    menuTrigger.addEventListener("click", () => {
        toggleMenu();
    });

    closeMenu.addEventListener("click", () => {
        toggleMenu();
    });

    overlay.addEventListener("click", () => {
        toggleMenu();
    });

    function toggleMenu() {
        menu.classList.toggle("active");
        overlay.classList.toggle("active");
    }

    function showSubMenu(hasChildren) {
        subMenu = hasChildren.querySelector(".submenu");
        subMenu.classList.add("active");
        subMenu.style.animation = "slideLeft 0.5s ease forwards";
        const menuTitle = hasChildren.querySelector("i").parentNode.childNodes[0].textContent;
        menu.querySelector(".current-menu-title").innerHTML = menuTitle;
        menu.querySelector(".mobile-menu-head").classList.add("active");
    }



    function hideSubMenu() {
        subMenu.style.animation = "slideRight 0.5s ease forwards";

        setTimeout(() => {
            subMenu.classList.remove("active");
        }, 300);

        menu.querySelector(".current-menu-title").innerHTML = "";
        menu.querySelector(".mobile-menu-head").classList.remove("active");
    }

    window.onresize = function () {
        if (this.innerWidth > 991) {
            if (menu.classList.contains("active")) {
                toggleMenu();
            }
        }
    };



});

if (document.readyState === 'loading') {
    document.addEventListener("DOMContentLoaded", ready);
} else {
    ready();
}

function ready() {
    var removeCartButtons = document.getElementsByClassName('remove');
    console.log(removeCartButtons);
    for (var i = 0; i < removeCartButtons.length; i++) {
        var button = removeCartButtons[i];
        button.addEventListener('click', removeCartItem);
    }
    updateTotal();
}

function removeCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    updateTotal();
}


function updateTotal() {
    var cartContent = document.getElementsByClassName("cart-content")[0];
    var cartBoxes = cartContent.getElementsByClassName("cart-box");
    var total = 0;

    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var priceElement = cartBox.getElementsByClassName("price")[0];
        var quantityElement = cartBox.getElementsByClassName("quantity")[0];
        var price = parseFloat(priceElement.innerText.replace("$", ""));
        var quantity = quantityElement.value;
        total += price * quantity;
    }

    document.getElementsByClassName("total-price")[0].innerText = "$" + total.toFixed(2);
}


function buyNow() {
    window.location.href = "productdetails.php?id=169";
}

function product1() {
    window.location.href = "productdetails.php?id=170";
}

function product2() {
    window.location.href = "productdetails.php?id=171";
}

function product3() {
    window.location.href = "productdetails.php?id=172";
}

function product4() {
    window.location.href = "productdetails.php?id=173";
}


document.querySelectorAll('.box').forEach(box => {
    box.addEventListener('mouseenter', () => {
        box.style.transform = 'translateY(5px)';
        box.style.boxShadow = '0px 8px 15px rgba(0, 0, 0, 0.5)';
    });

    box.addEventListener('mouseleave', () => {
        box.style.transform = 'translateY(0)';
        box.style.boxShadow = 'none';
    });
});


document.addEventListener('DOMContentLoaded', () => {
   
    const dynamicImage = document.getElementById('dynamic-image');

   
    const images = {
         'allclothing': 'images/aa3.jpg',
        't-Shirt&Polos': 'images/t18 (3).jpg',
         'Hoodies':'images/ss8.jpg',
        'CasualPants':'images/c14 (1).jpg',
         'jeans&Joggers':'images/j7 (1).jpg',
         'CasualShirt':'images/cu9 (1).jpg',
         'Fomalshirt':'images/f2 (1).jpg',
         'FomalTrousers':'images/ft4 (1).jpg',
         'Shorts':'images/sh2 (1).jpg',
         'Activewears':'images/sh3 (1).jpg',
         'Pyjmapants':'images/pp1.1.jpg',
         'Plusmenwear':'images/pm3.1.jpg',
         'AllInnerwares':'images/ac5 (1).jpg',
         'Boxers&Briefs':'images/blt1 (9).jpg',
         'shocks':'images/sok1 (6).jpeg',
         'Underwares':'images/bb2 (6).jpg',
         'AllAccessories':'images/fw1 (3).jpg',
         'Footwear':'images/fw1 (1).jpg',
         'Belts':'images/blt1 (11).jpg',
         'watch':'images/bg.2.jpeg'



    };

    // Function to change image
    const changeImage = (src) => {
        dynamicImage.style.opacity = 0; // Fade out
        setTimeout(() => {
            dynamicImage.src = src; // Change image
            dynamicImage.style.opacity = 1; // Fade in
        }, 300); // Delay to match transition time
    };

    // Add event listeners
    Object.keys(images).forEach(id => {
        const link = document.getElementById(id);
        link.addEventListener('mouseenter', () => {
            changeImage(images[id]);
        });
    });
});



   

      function toggleSearchForm() {
            var searchForm = document.getElementById('searchForm');
            if (searchForm.style.display === "none") {
                searchForm.style.display = "block";
            } else {
                searchForm.style.display = "none";
            }
        }

      
    