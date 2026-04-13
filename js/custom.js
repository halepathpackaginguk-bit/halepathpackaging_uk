document.addEventListener("DOMContentLoaded", function () {

   initTabs();

  // =========================
  // CONTACT FORM
  // =========================
  initContactForm();

  // =========================
  // QUOTE FORM
  // =========================
  initQuoteForm();

  // =========================
  // SIZES FORM (redirect flow)
  // =========================
  initSizesForm();

  // =========================
  // CHECKOUT FORM
  // =========================
  initCheckoutForm();

  // =========================
  // FILE UPLOAD UI
  // =========================
  initFileUpload();

});


// =========================
// CONTACT FORM
// =========================
function initContactForm() {
  const form = document.getElementById("contact-form");
  if (!form) return;

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(form);
    formData.append("action", "contact_form_submit");

    fetch(ajax_object.ajax_url, {
      method: "POST",
      body: formData,
    })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          alert("Message sent successfully!");
          form.reset();
        } else {
          alert("Error: " + data.data);
        }
      })
      .catch(err => {
        console.error(err);
        alert("Something went wrong!");
      });
  });
}


// =========================
// QUOTE FORM
// =========================
function initQuoteForm() {
  const form = document.getElementById("quote-form");
  const uploadBtn = document.getElementById("uploadBtn");
  const fileInput = document.getElementById("fileInput");

  if (!form) return;

  // file upload trigger
  if (uploadBtn && fileInput) {
    uploadBtn.addEventListener("click", function () {
      fileInput.click();
    });
  }

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(form);
    formData.append("action", "send_quote_form");

    fetch(ajax_object.ajax_url, {
      method: "POST",
      body: formData,
    })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          alert("Form submitted successfully!");
          form.reset();
        } else {
          alert("Error: " + data.data);
        }
      })
      .catch(err => {
        console.error(err);
        alert("Something went wrong!");
      });
  });
}


// =========================
// SIZES FORM (SAVE + REDIRECT)
// =========================
function initSizesForm() {
  const sizesForm = document.getElementById("sizes-form");
  if (!sizesForm) return;

  sizesForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const priceDisplay = document.getElementById("price-display");
    const quantity = document.getElementById("quantity");

    const basePrice = parseFloat(priceDisplay?.dataset.price) || 0;
    const qty = parseInt(quantity?.value) || 1;

    const totalPrice = basePrice * qty;

    const data = Object.fromEntries(formData.entries());
    data.total_price = totalPrice;

    sessionStorage.setItem("sizes_form_data", JSON.stringify(data));

    window.location.href = "/checkout/";
  });
}


// =========================
// CHECKOUT FORM
// =========================
function initCheckoutForm() {
  const form = document.getElementById("checkout-form");
  if (!form) return;

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(form);

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
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          alert("Order submitted!");
          sessionStorage.removeItem("sizes_form_data");
          form.reset();
        } else {
          alert("Error: " + data.data);
        }
      })
      .catch(err => {
        console.error(err);
        alert("Something went wrong!");
      });
  });
}


// =========================
// FILE UPLOAD UI
// =========================
function initFileUpload() {
  const uploadBtn = document.getElementById('uploadBtn');
  const fileInput = document.getElementById('fileInput');
  const fileName = document.getElementById('fileName');

  if (uploadBtn && fileInput) {
    uploadBtn.addEventListener('click', function () {
      fileInput.click();
    });
  }

  if (fileInput && fileName) {
    fileInput.addEventListener('change', function () {
      if (fileInput.files.length > 0) {
        fileName.textContent = fileInput.files[0].name;
      }
    });
  }
}

function initTabs() {
    const buttons = document.querySelectorAll(".tab-btn");
    const panels = document.querySelectorAll(".tab-panels");
    
  
    
    if (!buttons.length || !panels.length) return;
    
    function showTab(tabId, clickedBtn = null) {
        // Hide all panels
        panels.forEach(panel => {
            panel.classList.add("hidden");
        });
        
        // Remove active class from all buttons
        buttons.forEach(btn => {
            btn.classList.remove("tab_active");
        });
        
        // Show selected panel - IMPORTANT: Remove hidden class
        const activePanel = document.getElementById(tabId);
        if (activePanel) {
            activePanel.classList.remove("hidden");           
        } else {
            console.error("Panel not found with ID:", tabId);
          
        }
        
        // Activate button
        if (clickedBtn) {
            clickedBtn.classList.add("tab_active");
        }
    }
    
    // Attach click events
    buttons.forEach(btn => {
        btn.addEventListener("click", function(e) {
            e.preventDefault();
            const tabId = this.getAttribute("data-tab");
            console.log("Tab clicked:", tabId);
            showTab(tabId, this);
        });
    });
    
    // Auto-open first tab (REMOVE the hidden class from first panel)
    const firstBtn = buttons[0];
    if (firstBtn) {
        firstBtn.classList.add("tab_active");
        const firstTabId = firstBtn.getAttribute("data-tab");
        const firstPanel = document.getElementById(firstTabId);
        
        // Remove hidden class from first panel
        if (firstPanel) {
            firstPanel.classList.remove("hidden");
            console.log("First tab activated:", firstTabId);
        }
        
        // Make sure other panels are hidden
        panels.forEach(panel => {
            if (panel.id !== firstTabId) {
                panel.classList.add("hidden");
            }
        });
    }
}