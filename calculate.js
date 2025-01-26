document.addEventListener("DOMContentLoaded", () => {
    const cartItems = document.getElementById("cart-items");
    const totalPriceElement = document.getElementById("total-price");
    const bookPrices = {
        book1: 20,
        book2: 15,
        book3: 10,
        book4: 8,
    };
    const cart = {};
    document.querySelectorAll(".add-to-cart").forEach(button => {
        button.addEventListener("click", () => {
            const bookId = button.getAttribute("data-book");
            const bookName = button.parentElement.querySelector("h2").textContent;
            if (!cart[bookId]) {
                cart[bookId] = { name: bookName, price: bookPrices[bookId], quantity: 0 };
                const li = document.createElement("li");
                li.id = `cart-${bookId}`;
                li.innerHTML = `
                    ${bookName} - $${bookPrices[bookId]} x 
                    <span class="quantity">0</span> = 
                    $<span class="subtotal">0</span>
                `;
                cartItems.appendChild(li);
            }
            cart[bookId].quantity++;
            const listItem = document.getElementById(`cart-${bookId}`);
            listItem.querySelector(".quantity").textContent = cart[bookId].quantity;
            listItem.querySelector(".subtotal").textContent = (cart[bookId].price * cart[bookId].quantity).toFixed(2);
            updateTotal();
        });
    });
    function updateTotal() {
        let total = 0;
        for (let book in cart) {
            total += cart[book].price * cart[book].quantity;
        }
        const gst = total * 0.18;
        totalPriceElement.textContent = (total + gst).toFixed(2);
    }
});