<ul class="message <?php echo html::chars($type) ?>">
    <?php
        foreach ($msgs as $msg)
        {
            printf('<li>%s</li>', $msg);
        }
    ?>
</ul>