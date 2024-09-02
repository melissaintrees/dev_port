
const intialMessage = document.getElementById('intial_message');
const form = document.getElementById('contact_form');
const successMessage = document.getElementById('success_message');
const errorMessage = document.getElementById('error_message');

form.addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(form);
    const object = Object.fromEntries(formData);
    const json = JSON.stringify(object);

    fetch('https://api.web3forms.com/submit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: json
    })
        .then(async (response) => {
            let json = await response.json();
            if (response.status == 200) {
                successMessage.style.display = "block";
            } else {
                console.log(response);
            }
        })
        .catch(error => {
            console.log(error);
            errorMessage.style.display = "block";
        })
        .then(function () {
            form.reset();
            form.style.display = "none"
            intialMessage.style.display = "none"
            setTimeout(() => {
                successMessage.style.display = "none";
                errorMessage.style.display = "none";
                intialMessage.style.display = "block";
                form.style.display = "block";
            }, 5000);
        });
});
