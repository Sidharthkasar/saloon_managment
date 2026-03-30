let cart = JSON.parse(localStorage.getItem("cart")) || [];

let cartItemsDiv = document.getElementById("cartItems");
let totalPriceDiv = document.getElementById("totalPrice");

function displayCart(){

    cartItemsDiv.innerHTML = "";

    let total = 0;

    cart.forEach((item, index) => {

        let priceNumber = parseInt(item.price.replace(/[^\d]/g, ""));

        total += priceNumber * item.quantity;

        let div = document.createElement("div");
        div.classList.add("cart-item");

        div.innerHTML = `
            <img src="${item.img}">
            <div class="cart-info">
                <h3>${item.name}</h3>
                <p>${item.price}</p>
                <p>Qty: ${item.quantity}</p>
            </div>
            <div class="cart-actions">
                <button onclick="increase(${index})">+</button>
                <button onclick="decrease(${index})">-</button>
                <button onclick="removeItem(${index})">Remove</button>
            </div>
        `;

        cartItemsDiv.appendChild(div);

    });

    totalPriceDiv.innerText = "Total: ₹" + total;

}


// INCREASE
function increase(index){
    cart[index].quantity++;
    updateCart();
}

// DECREASE
function decrease(index){
    if(cart[index].quantity > 1){
        cart[index].quantity--;
    }else{
        cart.splice(index,1);
    }
    updateCart();
}

// REMOVE
function removeItem(index){
    cart.splice(index,1);
    updateCart();
}

// UPDATE STORAGE
function updateCart(){
    localStorage.setItem("cart", JSON.stringify(cart));
    displayCart();
}

// CHECKOUT
function checkout(){
    alert("Order Placed Successfully 🎉");
    localStorage.removeItem("cart");
    location.reload();
}

// LOAD
displayCart();
function goToPayment(){
    window.location.href = "payment.php";
}