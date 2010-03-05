<ul class="nav site">
<?php
    foreach($links as $link)
    {
        printf('<li%s>%s</li>',
                html::attributes(array('class' => $link == Request::instance()->controller ? 'active' : NULL)),
                html::anchor($link, UTF8::ucfirst($link)));
    }
?> 
</ul>