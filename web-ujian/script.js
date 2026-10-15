// =========================
// BUTTON HOVER EFFECT
// =========================
const allButtons = document.querySelectorAll("button");

allButtons.forEach(button => {

  button.addEventListener("mouseenter", () => {
    button.style.transform = "translateY(-3px)";
  });

  button.addEventListener("mouseleave", () => {
    button.style.transform = "translateY(0px)";
  });

});


// =========================
// SUBSCRIBE FORM
// =========================
const subscribeForm = document.getElementById("subscribeForm");
const subscriberEmail = document.getElementById("subscriberEmail");
const subscribeMessage = document.getElementById("subscribeMessage");

subscribeForm.addEventListener("submit", function(e){

  e.preventDefault();

  if(subscriberEmail.value.trim() === ""){

    alert("Email harus diisi!");
    return;

  }

  let subscribers =
    JSON.parse(localStorage.getItem("subscribers")) || [];

  subscribers.push(subscriberEmail.value);

  localStorage.setItem(
    "subscribers",
    JSON.stringify(subscribers)
  );

  subscribeMessage.classList.remove("hidden");

  subscribeForm.reset();

  setTimeout(() => {

    subscribeMessage.classList.add("hidden");

  }, 3000);

});


// =========================
// CART SYSTEM
// =========================
const cartButtons =
  document.querySelectorAll(".add-cart-btn");

const cartCount =
  document.getElementById("cart-count");

const cartPopup =
  document.getElementById("cart-popup");


// AMBIL CART STORAGE
let cart =
  JSON.parse(localStorage.getItem("cart")) || [];


// UPDATE UI
updateCartUI();


// =========================
// ADD TO CART
// =========================
cartButtons.forEach(button => {

  button.addEventListener("click", () => {

    const product = {

      name: button.dataset.name,
      price: Number(button.dataset.price)

    };

    // TAMBAH CART
    cart.push(product);

    // SAVE
    localStorage.setItem(
      "cart",
      JSON.stringify(cart)
    );

    // UPDATE UI
    updateCartUI();

    // SHOW POPUP
    cartPopup.classList.remove("hidden");

    setTimeout(() => {

      cartPopup.classList.add("hidden");

    }, 2000);

  });

});


// =========================
// UPDATE CART UI
// =========================
function updateCartUI(){

  cartCount.innerText = cart.length;

}


// =========================
// CHECKOUT SYSTEM
// =========================
const checkoutBtn =
  document.getElementById("cart-button");

const checkoutModal =
  document.getElementById("checkout-modal");

const checkoutOverlay =
  document.getElementById("checkout-overlay");

const closeCheckout =
  document.getElementById("close-checkout");

const checkoutItems =
  document.getElementById("checkout-items");

const checkoutTotalItems =
  document.getElementById("checkout-total-items");

const checkoutTotalPrice =
  document.getElementById("checkout-total-price");

const placeOrder =
  document.getElementById("place-order");


// =========================
// OPEN CHECKOUT
// =========================
checkoutBtn.addEventListener("click", () => {

  if(cart.length === 0){

    alert("Keranjang masih kosong 😢");
    return;

  }

  // RESET
  checkoutItems.innerHTML = "";

  let total = 0;

  // LOOP ITEM
  cart.forEach(item => {

    total += item.price;

    checkoutItems.innerHTML += `

      <div class="flex items-center justify-between bg-orange-50 p-5 rounded-3xl">

        <div>

          <h3 class="text-lg font-bold text-orange-950">
            ${item.name}
          </h3>

          <p class="text-orange-500 mt-1">
            Rp${item.price.toLocaleString("id-ID")}
          </p>

        </div>

        <div class="text-3xl">
          🍜
        </div>

      </div>

    `;

  });

  // TOTAL
  checkoutTotalItems.innerText =
    cart.length + " Produk";

  checkoutTotalPrice.innerText =
    "Rp" + total.toLocaleString("id-ID");

  // SHOW MODAL
  checkoutOverlay.classList.remove("hidden");

  checkoutModal.classList.remove("scale-0");
  checkoutModal.classList.add("scale-100");

});


// =========================
// CLOSE MODAL
// =========================
closeCheckout.addEventListener(
  "click",
  closeCheckoutModal
);

checkoutOverlay.addEventListener(
  "click",
  closeCheckoutModal
);

function closeCheckoutModal(){

  checkoutOverlay.classList.add("hidden");

  checkoutModal.classList.remove("scale-100");
  checkoutModal.classList.add("scale-0");

}


// =========================
// PLACE ORDER
// =========================
placeOrder.addEventListener("click", () => {

  alert("Pesanan berhasil dibuat 🔥");

  // RESET CART
  cart = [];

  // SAVE STORAGE
  localStorage.setItem(
    "cart",
    JSON.stringify(cart)
  );

  // UPDATE UI
  updateCartUI();

  // TUTUP MODAL
  closeCheckoutModal();

});

document.addEventListener("DOMContentLoaded", () => {

  const loginBtn = document.getElementById("loginBtn");
  const loginModal = document.getElementById("loginModal");
  const closeLogin = document.getElementById("closeLogin");

  // OPEN
  loginBtn.addEventListener("click", () => {

    loginModal.classList.remove("hidden");

  });

  // CLOSE
  closeLogin.addEventListener("click", () => {

    loginModal.classList.add("hidden");

  });

});
