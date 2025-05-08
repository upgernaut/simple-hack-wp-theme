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
}
  
