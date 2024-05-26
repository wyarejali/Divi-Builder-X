(function($) {
    $('.dibx_marquee_text-container').each(function() {
        const copy = $(this).data('copies');

        const spanText = $(this)
            .find('.dibx_marquee-text')
            .first()
            .text();

        for (let i = 0; i < copy; i++) {
            $(this)
                .find('.dibx_marquee')
                .append(`<span class="dibx_marquee-text">${spanText}</span>`);
        }
    });
})(jQuery);
