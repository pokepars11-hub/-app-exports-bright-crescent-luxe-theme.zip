document.addEventListener('DOMContentLoaded', function () {
  var links = document.querySelectorAll('.bct-nav-list a');
  links.forEach(function (link) {
    link.setAttribute('data-testid', 'nav-link-' + link.textContent.trim().toLowerCase().replace(/\s+/g, '-'));
  });
});
