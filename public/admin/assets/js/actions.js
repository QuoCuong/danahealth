$('.action').on('click', function(e) {
    e.preventDefault();
    const formId = e.target.getAttribute('href');
    $(formId).submit();
})

$('.clickable').on('click', function(e) {
    var href = this.getAttribute('href');
    if (href) {
        window.location.replace(href);
    }
})
