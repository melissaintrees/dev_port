
$(document).ready(function () {
    // Add smooth scrolling to all links
    $("a").on('click', function (event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
});

// const scrollFun = () => { document.getElementById("skills").scrollIntoView() }
const year = new Date().getFullYear();
document.getElementById('currentYear').innerHTML = year;


$(document).ready(function () {

    // Add smooth scrolling to all links
    $("a").on('click', function (event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // alert("hi")
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });

});

// const scrollFun = () => { document.getElementById("skills").scrollIntoView() }
const year = new Date().getFullYear();
document.getElementById('currentYear').innerHTML = year;
// document.getElementsByClassName('custom-btn-1').onclick = function () {
//     alert("button was clicked");
//     $("a").removeClass("custom-btn-1")
// };

// $(function () {
//     // if ($('#test-projects-page') == true) {
//     //     alert("This works?")
//     // } else {
//     //     alert("This also works?")
//     // }
//     // if ($('#test-projects-page').hasScrollBar()) {
//     //     alert("this is the main prj page")
//     // } else if ($('#test-project-page').hasScrollBar()) {
//     //     alert("this is the ind prj page")
//     // }
//     alert('main project page: ' + $('#test-projects-page').hasScrollBar());
//     alert('indiv project page: ' + $('#test-project-page').hasScrollBar());
// });

// (function ($) {
//     $.fn.hasScrollBar = function () {
//         return this.get(0).scrollHeight > this.height();
//     }
// })(jQuery);