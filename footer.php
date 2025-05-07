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


  </script>

  <?php wp_footer(); ?>
</body>
</html>
