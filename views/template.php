<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=utf-8">
        <title><?php echo html::chars($title) ?></title>
        
        <meta name="author" content="*placeholder*">
        <meta name="description" content="*placeholder*">
        <meta name="keywords" content="*placeholder*">
        
        <link rel="icon" type="image/png" href="/favicon.png">
        
        <!-- YUI (reset, base) -->
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/yui/2.8.0r4/build/reset-fonts/reset-fonts.css"> 
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/yui/2.8.0r4/build/base/base-min.css">
        
        <!-- CSS Styles -->
        <link rel="stylesheet" href="/css/original/style.css" type="text/css" media="screen" title="Original">
    </head>
    <?php flush(); ?> 
    <body>
        <div class="section main">
            <div class="header">
                <h1>*placeholder*</h1>
                <?php echo View::factory('navigation')->set('links', array('index')) ?>
            </div>
            <hr>
            <div class="section body">
                <?php 
                    if ( ! empty($messages))
                    {
                        echo View::factory('messages')->bind('messages', $messages);
                    }
                  
                    echo $content;
                    if ( ! empty($sidebar)): ?>
                <div class="aside">
                    <?php echo $sidebar; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/js/main.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>