<footer id="footer" class="max-w-2xl mx-auto mt-12 border-t p-4 text-center text-sm text-gray-400 font-sans">
    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> <?php echo get_theme_mod('footer_text'); ?>
</footer>

  <?php wp_footer(); ?>
<div id="floating-search" class="hidden fixed top-16 left-1/2 transform -translate-x-1/2 z-50">
  <form action="/" method="get" class="flex bg-gray-900 border border-green-400 rounded px-2 py-1">
    <input type="text" name="s" placeholder="Search..." class="bg-transparent  outline-none px-2">
    <button type="submit" class="text-green-400 hover:text-green-300 px-2">Go</button>
  </form>
</div>

</body>
</html>
