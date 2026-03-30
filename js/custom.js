
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contact-form");
    form.addEventListener("submit", function (e) {      
        e.preventDefault();

        const formData = new FormData(form);
        formData.append("action", "contact_form_submit");

        fetch(ajax_object.ajax_url, {
            method: "POST",
            body: formData
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
            console.log(err);
            alert("Something went wrong!");
        });

    });

});
