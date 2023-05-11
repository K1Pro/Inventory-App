const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const page = urlParams.get('page') ? urlParams.get('page') : 'View-Home';

document.querySelectorAll('.nav-link').forEach((navLink) => {
  navLink.classList.remove('active');
  // if (`View-${navLink.textContent.replace(/\s/g, '')}` == page) {
  if (navLink.textContent.replace(/\s/g, '').slice(-4) == page.slice(-4)) {
    navLink.classList.add('active');
  }
});

// document.getElementById(`export`).addEventListener('click', function (e) {
//   e.preventDefault();
//   window.open('exportInventory.php');
//   window.open('exportInvoices.php');
// });
