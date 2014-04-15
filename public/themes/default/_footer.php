<?php if (!isset($show) || $show==true) : ?>

<hr />

<footer class="footer">
    <div class="container">
        <p>SiTuMO v1.0 - Desarrollado por <a href="http://tecnomati.co" target="_blank">tecnomati.co</a></p>
    </div>
</footer>
<?php endif; ?>

<div id="debug"></div>
<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo js_path(); ?>jquery-1.7.2.min.js"><\/script>')</script>

<!-- This would be a good place to use a CDN version of jQueryUI if needed -->
<?php echo Assets::js(); ?>

</body>
</html>