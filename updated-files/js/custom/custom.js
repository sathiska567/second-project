/*========================================== MASTER JAVASCRIPT ===================================================================

	Project     :	STARTUP TEMPLATES
	Version     :	1.0
	Last Change : 	20/07/2017
	Primary Use :   STARTUP TEMPLATES

=================================================================================================================================*/
$(document).on("ready", function () {
    "use strict"; //Start of Use Strict
    var menu_bar = $(".navbar-default");
    var menu_li = $(".navbar-nav li a");
    var collapse = $(".navbar-collapse");
    var top_nav = $("#top-nav");
    var top_menu = $(".header-menu-1");

    //MENU-2 SCROLL
    if (top_nav.length) {
        var x = top_nav.offset().top;
        if (x > 50) {
            top_nav.fadeIn();
        } else {
            top_nav.fadeOut();
        }
        $(document).on("scroll", function () {
            var y = $(this).scrollTop();
            if (y > 50) {
                top_nav.fadeIn();
            } else {
                top_nav.fadeOut();
            }
        });
    }

    //RESPONSIVE MENU SHOW AND HIDE FUNCTION
    if (menu_li.length) {
        menu_li.on("click", function (event) {
            collapse.slideToggle();
        });
        $(".navbar-default .navbar-toggle").on("click", function (e) {
            collapse.slideToggle();
        });
    }

    //MENU BAR SMOOTH SCROLLING FUNCTION
    var menu_list = $(".navbar-nav");
    if (menu_list.length) {
        menu_list.on("click", ".pagescroll", function (event) {
            event.stopPropagation();
            event.preventDefault();
            var hash_tag = $(this).attr("href");
            if ($(hash_tag).length) {
                $("html, body").animate(
                    {
                        scrollTop: $(hash_tag).offset().top - 50,
                    },
                    2000
                );
            }
            return false;
        });
    }

    //COUNTER
    var counter = $(".count");
    if (counter.length) {
        counter.counterUp({
            delay: 10,
            time: 1000,
        });
    }

    //GALLERY POPUP
    var gallery = $(".popup-gallery");
    if (gallery.length) {
        $(".popup-gallery").magnificPopup({
            delegate: "a",
            type: "image",
            tLoading: "Loading image #%curr%...",
            mainClass: "mfp-img-mobile",
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function (item) {
                    return (
                        item.el.attr("title") +
                        "<small>by Marsel Van Oosten</small>"
                    );
                },
            },
        });
    }

    function submitHeroForm(event) {
        event.preventDefault();
        // Get the form data
        var formData = new FormData(document.querySelector("#mail-form"));

        axios
            .post("./php/services.php", formData)
            .then(function (response) {
                $(".hero-form-message .sucessMessage").html(
                    "Mail Sent Successfully !"
                );
                $(".hero-form-message .sucessMessage").show();
                $(".hero-form-message .sucessMessage").delay(3000).fadeOut();
                $("#mail-form")[0].reset();
            })
            .catch(function (error) {
                $(".hero-form-message .failMessage").html(
                    "Something Went Wrong!"
                );
                $(".hero-form-message .failMessage").show();
                $(".hero-form-message .failMessage").delay(3000).fadeOut();
            });
    }

    function submitApplicationForm(event) {
        event.preventDefault();
        // Get the form data
        var formData = new FormData(
            document.querySelector("#application-form")
        );

        axios
            .post("./php/application.php", formData)
            .then(function (response) {
                $(".application-form-message .sucessMessage").html(
                    "Mail Sent Successfully !"
                );
                $(".application-form-message .sucessMessage").show();
                $(".application-form-message .sucessMessage")
                    .delay(3000)
                    .fadeOut();
                $("#application-form")[0].reset();
            })
            .catch(function (error) {
                $(".application-form-message .failMessage").html(
                    "Something went wrong!"
                );
                $(".application-form-message .failMessage").show();
                $(".application-form-message .failMessage")
                    .delay(3000)
                    .fadeOut();
            });
    }
    
        function submitAffiliateForm(event) {
        event.preventDefault();
        // Get the form data
        var formData = new FormData(
            document.querySelector("#affiliate-form")
        );

        axios
            .post("./php/affiliate.php", formData)
            .then(function (response) {
                $(".affiliate-form-message .sucessMessage").html(
                    "Mail Sent Successfully !"
                );
                $(".affiliate-form-message .sucessMessage").show();
                $(".affiliate-form-message .sucessMessage")
                    .delay(3000)
                    .fadeOut();
                $("#affiliate-form")[0].reset();
            })
            .catch(function (error) {
                $(".affiliate-form-message .failMessage").html(
                    "Something went wrong!"
                );
                $(".affiliate-form-message .failMessage").show();
                $(".affiliate-form-message .failMessage")
                    .delay(3000)
                    .fadeOut();
            });
    }

    document.querySelector("#mail-form").addEventListener("submit", (event) => {
        submitHeroForm(event);
    });

    document
        .querySelector("#application-form")
        .addEventListener("submit", (event) => {
            submitApplicationForm(event);
        });
        
    document
        .querySelector("#affiliate-form")
        .addEventListener("submit", (event) => {
            submitAffiliateForm(event);
        });
    // End of use strict
});
