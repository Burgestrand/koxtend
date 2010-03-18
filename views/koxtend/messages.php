<?php
    foreach (Session::instance()->take('messages', array()) as $type => $msgs)
    {
        printf('<ul class="message %s">', html::chars($type));
        foreach ($msgs as $msg)
        {
            printf('<li>%s</li>', $msg);
        }
        print('</ul>');
    }

/* End of file messages.php */
/* Location: ./views/koxtend/messages.php */ 