function toggleDarkMode(colorScheme = null) {
    const html = document.documentElement;
  
    let newMode;
    if (colorScheme === 'dark' || colorScheme === 'light') {
      html.classList.remove('dark', 'light');
      html.classList.add(colorScheme);
      newMode = colorScheme;
    } else {
      html.classList.toggle('dark');
      html.classList.toggle('light');
      newMode = html.classList.contains('dark') ? 'dark' : 'light';
    }
  
    // Save mode in cookie for PHP
    document.cookie = `colorScheme=${newMode}; path=/; max-age=31536000`;
  }
  
function toggleSearchBar() {
  const el = document.getElementById('floating-search');
  el.classList.toggle('hidden');
  
  // Make the text field active
  const inputField = el.querySelector('input');
  if (inputField) {
    inputField.focus();
  }
}


document.addEventListener('DOMContentLoaded', function() {
  // Add event listeners to all dropdown wrappers
  const dropdownWrappers = document.querySelectorAll('.dropdown-wrapper');
  
  dropdownWrappers.forEach(wrapper => {
    let timeout;
    
    // Show dropdown on hover
    wrapper.addEventListener('mouseenter', () => {
      clearTimeout(timeout);
      const submenu = wrapper.querySelector('.submenu');
      if (submenu) {
        submenu.classList.add('flex');
        submenu.classList.remove('hidden');
      }
    });
    
    // Hide dropdown with delay when mouse leaves
    wrapper.addEventListener('mouseleave', () => {
      const submenu = wrapper.querySelector('.submenu');
      if (submenu) {
        timeout = setTimeout(() => {
          submenu.classList.add('hidden');
          submenu.classList.remove('flex');
        }, 300); // 300ms delay before hiding
      }
    });
  });
});
