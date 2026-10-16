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

  // =========================
  // MEDIA (deferred loading)
  // =========================
  initYoutubeFacades();
  initLazyVideos();

});


// =========================
// YOUTUBE HERO FACADE
// Shows the video thumbnail first, then loads the player in the background
// (after window load) and fades it in once playback actually starts.
// Clicking the thumbnail loads it immediately.
// =========================
function initYoutubeFacades() {
  var facades = Array.prototype.slice.call(document.querySelectorAll(".yt-facade"));
  if (!facades.length) return;

  var ytApi = null;
  var ytApiFailed = false;

  function loadYtApi() {
    if (ytApi) return ytApi;
    ytApi = new Promise(function (resolve, reject) {
      if (window.YT && window.YT.Player) {
        resolve(window.YT);
        return;
      }
      var previous = window.onYouTubeIframeAPIReady;
      window.onYouTubeIframeAPIReady = function () {
        if (typeof previous === "function") previous();
        resolve(window.YT);
      };
      var script = document.createElement("script");
      script.src = "https://www.youtube.com/iframe_api";
      script.async = true;
      script.onerror = function () {
        ytApiFailed = true;
        reject(new Error("YouTube IFrame API failed to load"));
      };
      document.head.appendChild(script);
    });
    return ytApi;
  }

  function reveal(facade) {
    facade.classList.add("yt-ready");
  }

  function load(facade) {
    if (facade.dataset.videoLoaded) return;
    var id = facade.getAttribute("data-video-id");
    if (!id) return;
    facade.dataset.videoLoaded = "1";

    var iframe = document.createElement("iframe");
    iframe.className = "yt-frame";
    iframe.src =
      "https://www.youtube.com/embed/" +
      id +
      "?autoplay=1&mute=1&controls=0&loop=1&playlist=" +
      id +
      "&playsinline=1&rel=0&enablejsapi=1";
    iframe.allow = "autoplay; fullscreen";
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("title", "Background video");
    facade.appendChild(iframe);

    var safety = setTimeout(function () {
      reveal(facade);
    }, 8000);

    loadYtApi()
      .then(function (YT) {
        new YT.Player(iframe, {
          events: {
            onReady: function (event) {
              event.target.mute();
              event.target.playVideo();
            },
            onStateChange: function (event) {
              if (event.data === YT.PlayerState.PLAYING) {
                clearTimeout(safety);
                reveal(facade);
              }
            }
          }
        });
      })
      .catch(function () {
        clearTimeout(safety);
        reveal(facade);
      });
  }

  facades.forEach(function (facade) {
    facade.addEventListener("click", function () {
      load(facade);
    });
    facade.addEventListener("keydown", function (e) {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        load(facade);
      }
    });
  });

  var startAutoLoad = function () {
    setTimeout(function () {
      facades.forEach(load);
    }, 1200);
  };

  if (document.readyState === "complete") {
    startAutoLoad();
  } else {
    window.addEventListener("load", startAutoLoad);
  }
}


// =========================
// LAZY VIDEOS
// <source data-src="..."> is only fetched when the video scrolls into view.
// =========================
function initLazyVideos() {
  var videos = Array.prototype.slice
    .call(document.querySelectorAll("video"))
    .filter(function (video) {
      return video.querySelector("source[data-src]");
    });
  if (!videos.length) return;

  var activate = function (video) {
    var source = video.querySelector("source[data-src]");
    if (!source || source.dataset.activated) return;
    source.dataset.activated = "1";
    source.src = source.dataset.src;
    video.load();
    var play = video.play();
    if (play && typeof play.catch === "function") play.catch(function () {});
  };

  if (!("IntersectionObserver" in window)) {
    videos.forEach(activate);
    return;
  }

  var observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          activate(entry.target);
          observer.unobserve(entry.target);
        }
      });
    },
    { rootMargin: "200px 0px" }
  );

  videos.forEach(function (video) {
    observer.observe(video);
  });
}


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