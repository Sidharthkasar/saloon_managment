// =====================
// OPEN PRODUCT PAGE
// =====================
function openProduct(card){

    let name = card.querySelector("h3").innerText;
    let price = card.querySelector("p:last-of-type").innerText;
    let img = card.querySelector("img").src;
    let desc = card.querySelector(".full-desc").innerText;

    let product = {
        name,
        price,
        img,
        desc
    };

    localStorage.setItem("selectedProduct", JSON.stringify(product));

    window.location.href = "product.html";
}


// =====================
// DESCRIPTION TOGGLE
// =====================
function toggleDesc(e, element){

    e.stopPropagation();

    let card = element.closest(".product-card");

    let shortDesc = card.querySelector(".short-desc");
    let fullDesc = card.querySelector(".full-desc");

    if(fullDesc.style.display === "block"){
        fullDesc.style.display = "none";
        shortDesc.style.display = "block";
    }else{
        fullDesc.style.display = "block";
        shortDesc.style.display = "none";
    }
}


// =====================
// ADD TO CART SYSTEM 🔥
// =====================
document.addEventListener("DOMContentLoaded", function(){

    let buttons = document.querySelectorAll(".product-card button");

    buttons.forEach(btn => {

        btn.addEventListener("click", function(e){

            e.stopPropagation(); // card open honar nahi

            let card = this.closest(".product-card");

            let name = card.querySelector("h3").innerText;
            let price = card.querySelector("p:last-of-type").innerText;
            let img = card.querySelector("img").src;

            let product = {
                name,
                price,
                img,
                quantity: 1
            };

            let cart = JSON.parse(localStorage.getItem("cart")) || [];

            // check if already exists
            let existing = cart.find(item => item.name === product.name);

            if(existing){
                existing.quantity += 1;
            }else{
                cart.push(product);
            }

            localStorage.setItem("cart", JSON.stringify(cart));

            alert(name + " added to cart 🛒");

        });

    });

});

function addToWishlist(card){

    let name = card.querySelector("h3").innerText;

    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

    if(!wishlist.includes(name)){
        wishlist.push(name);
    }

    localStorage.setItem("wishlist", JSON.stringify(wishlist));

    alert("Added to Wishlist ❤️");
}