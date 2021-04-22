window.addEventListener("load", function() {
    $('section ol li').each(function() {
        $(this).prepend('<button class="hide-direction" aria-label="Hide step"><span aria-hidden="true">&#10004;</span></button>');
    });	    
});

window.addEventListener("load", function() {
    $('.hide-direction').on("click", function() {
        $(this).parent().addClass("hidden");
    });
});