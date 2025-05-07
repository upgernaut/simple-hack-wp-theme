<footer id="footer" class="max-w-2xl mx-auto mt-12 border-t p-4 text-center text-sm text-gray-400 font-sans">
    © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Built clean and simple.
  </footer>

  <script>
    function toggleDarkMode() {
      const html = document.documentElement;
      html.classList.toggle('dark');
      html.classList.toggle('light');

      document.body.classList.toggle('bg-white');
      document.body.classList.toggle('bg-gray-900');
      document.body.classList.toggle('text-gray-900');
      document.body.classList.toggle('text-white');

      document.getElementById('site-header').classList.toggle('bg-white');
      document.getElementById('site-header').classList.toggle('bg-gray-800');

      document.querySelectorAll('p.text-sm').forEach(p => {
        p.classList.toggle('text-gray-500');
        p.classList.toggle('text-gray-400');
      });

      const footer = document.getElementById('footer');
      if (footer) {
        footer.classList.toggle('text-gray-500');
        footer.classList.toggle('text-gray-400');
      }
    }
  </script>

  <?php wp_footer(); ?>
</body>
</html>
