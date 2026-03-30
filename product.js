// LOAD PRODUCT DATA
let product = JSON.parse(localStorage.getItem("selectedProduct"));

document.getElementById("productName").innerText = product.name;
document.getElementById("productPrice").innerText = product.price;
document.getElementById("productImg").src = product.img;
document.getElementById("productDesc").innerText = product.desc;


// ADD TO CART
function addToCart(){

    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    let existing = cart.find(item => item.name === product.name);

    if(existing){
        existing.quantity += 1;
    }else{
        product.quantity = 1;
        cart.push(product);
    }

    localStorage.setItem("cart", JSON.stringify(cart));

    alert("Added to cart 🛒");
}


// BUY NOW
function buyNow(){

    addToCart();
    window.location.href = "cart.php";

}