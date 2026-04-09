document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contact-form");
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(form);
    formData.append("action", "contact_form_submit");

    fetch(ajax_object.ajax_url, {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.success) {
          alert("Message sent successfully!");
          form.reset();
        } else {
          alert("Error: " + data.data);
        }
      })
      .catch((err) => {
        console.log(err);
        alert("Something went wrong!");
      });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("quote-form");
  const fileInput = document.getElementById("fileInput");
  const uploadBtn = document.getElementById("uploadBtn");

  if (!form) return;

  // Open file dialog
  if (uploadBtn && fileInput) {
    uploadBtn.addEventListener("click", function () {
      fileInput.click();
    });
  }

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    // Required for WP AJAX
    formData.append("action", "send_quote_form");

    fetch(ajax_object.ajax_url, {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((data) => {
        console.log(data);

        if (data.success) {
          alert("✅ Form submitted successfully!");
          form.reset();
        } else {
          alert("❌ Error: " + data.data);
        }
      })
      .catch((err) => {
        console.error(err);
        alert("Something went wrong!");
      });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const sizesForm = document.getElementById("sizes-form");
  const quoteForm = document.getElementById("quote-form");

  // =========================
  // SIZES FORM AJAX
  // =========================
  if (sizesForm) {
    sizesForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const formData = new FormData(this);

      const priceDisplay = document.getElementById("price-display");
      const quantitySelect = document.getElementById("quantity");

      const basePrice = parseFloat(priceDisplay.dataset.price) || 0;
      const qty = parseInt(quantitySelect.value) || 1;

      const totalPrice = basePrice * qty;

      formData.append("action", "submit_box_form");
      formData.append("form_type", "sizes");
      formData.set("total_price", totalPrice);

      fetch(ajax_object.ajax_url, {
        method: "POST",
        body: formData,
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.success) {
            alert("Sizes form submitted!");
            sizesForm.reset();
          } else {
            alert(data.data);
          }
        });
    });
  }

  // =========================
  // QUOTE FORM AJAX
  // =========================
  if (quoteForm) {
    quoteForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const formData = new FormData(this);

      const quotePrice = document.getElementById("quote-price-display");

      formData.append("action", "submit_box_form");
      formData.append("form_type", "quote");
      formData.append("quote_price", quotePrice.dataset.basePrice);

      fetch(ajax_object.ajax_url, {
        method: "POST",
        body: formData,
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.success) {
            alert("Quote submitted!");
            quoteForm.reset();
          } else {
            alert(data.data);
          }
        });
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const sizesForm = document.getElementById("sizes-form");

  if (!sizesForm) return;

  sizesForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    console.log(formData);
    const priceDisplay = document.getElementById("price-display");
    const basePrice = parseFloat(priceDisplay.dataset.price) || 0;

    const qty = parseInt(document.getElementById("quantity").value) || 1;

    const totalPrice = basePrice * qty;

    // convert to object
    const data = Object.fromEntries(formData.entries());

    data.total_price = totalPrice;

    // save in sessionStorage
    sessionStorage.setItem("sizes_form_data", JSON.stringify(data));

    // redirect to next page
    window.location.href = "/checkout/";
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("checkout-form");

  if (!form) return;

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    // get saved product data
    const saved = sessionStorage.getItem("sizes_form_data");

    if (saved) {
      const data = JSON.parse(saved);

      for (let key in data) {
        formData.append(key, data[key]);
      }
    }

    formData.append("action", "submit_final_order");

    fetch(ajax_object.ajax_url, {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.success) {
          alert("Order submitted!");
          sessionStorage.removeItem("sizes_form_data");
          form.reset();
        } else {
          alert(data.data);
        }
      });
  });
});


const uploadBtn = document.getElementById('uploadBtn');
const fileInput = document.getElementById('fileInput');
const fileName = document.getElementById('fileName');

// Open file dialog on button click
uploadBtn.addEventListener('click', function () {
    fileInput.click();
});

// Show selected file name (optional)
fileInput.addEventListener('change', function () {
    if (fileInput.files.length > 0) {
        fileName.textContent = fileInput.files[0].name;
    }
});
