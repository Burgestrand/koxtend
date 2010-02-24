<?php if ($start == $end) return; ?>
<ol class="nav paging">
    <?php
        $template = '<li>' . html::anchor(Request::instance()->uri . '?page=%d#posts', '%s') . '</li>';
        
        if ($decrement < $low)
        {
            ($start < $decrement) AND printf($template, $start, '««');
            printf($template, $decrement, '«');
        }
        
        for ($i = $low; $i <= $high; ++$i)
        {
            $text = $i == $current ? "[{$i}]" : $i;
            printf($template, $i, $text);
        }
        
        if ($high < $increment)
        {
            printf($template, $increment, '»');
            ($increment < $end) AND printf($template, $end, '»»');
        }
    ?>
</ol>