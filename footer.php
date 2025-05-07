<footer id="footer" class="max-w-2xl mx-auto mt-12 border-t p-4 text-center text-sm text-gray-400 font-sans">
    © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Built clean and simple.
  </footer>

  <script>
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

  body.classList.toggle('bg-white', !isDark);
  body.classList.toggle('bg-gray-800', isDark);
  body.classList.toggle('text-gray-900', !isDark);
  body.classList.toggle('text-gray-200', isDark);

  header.classList.toggle('bg-white', !isDark);
  header.classList.toggle('bg-gray-800', isDark);

  document.querySelectorAll('p.text-sm').forEach(p => {
    p.classList.toggle('text-gray-500', !isDark);
    p.classList.toggle('text-gray-400', isDark);
  });

  document.querySelectorAll('.logoText').forEach(logoText => {
    logoText.classList.toggle('text-white', isDark);
    logoText.classList.toggle('text-gray-900', !isDark);
  });

  if (footer) {
    footer.classList.toggle('text-gray-500', !isDark);
    footer.classList.toggle('text-gray-400', isDark);
  }
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
  
  </script>

  <?php wp_footer(); ?>
<div id="floating-search" class="hidden fixed top-16 left-1/2 transform -translate-x-1/2 z-50">
  <form action="/" method="get" class="flex bg-gray-900 border border-green-400 rounded px-2 py-1">
    <input type="text" name="s" placeholder="Search..." class="bg-transparent text-white outline-none px-2">
    <button type="submit" class="text-green-400 hover:text-green-300 px-2">Go</button>
  </form>
</div>

</body>
</html>
