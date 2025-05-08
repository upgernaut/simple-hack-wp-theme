  function toggleDarkMode(colorScheme = null) {
  const html = document.documentElement;
  const body = document.body;
  const footer = document.getElementById('footer');
  const header = document.getElementById('site-header');

  // Determine the mode to apply
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

  // Store preference
  localStorage.setItem('colorScheme', newMode);

  // Apply styles based on mode
  const isDark = newMode === 'dark';


}

document.addEventListener('DOMContentLoaded', () => {
  const stored = localStorage.getItem('colorScheme');
  const initial = stored || themeSettings.defaultColorScheme;
  toggleDarkMode(initial);
});

function toggleSearchBar() {
  const el = document.getElementById('floating-search');
  el.classList.toggle('hidden');
}
  
