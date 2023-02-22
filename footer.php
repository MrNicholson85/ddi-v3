<?php

/**
 * The template for displaying the footer.
 *
 * @package DPS
 */
?>

<footer class="footer" role="contentinfo">
    <div class="uk-container uk-container-large">
        <div class="footer__copyright">
            <?php
            printf(
                '&copy %1$s %2$s. ' . __('All Rights Reserved.', 'dps-starter'),
                date('Y'),
                get_bloginfo('name')
            );
            ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>