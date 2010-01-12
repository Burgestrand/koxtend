<?php defined('SYSPATH') OR die('No direct access allowed.');
    /**
     * A log writer that also creates a file on the filesystem
     * with the full Kohana backtrace.
     */
    class Template_Log_File_Exception extends Kohana_Log_Writer
    {
        public function __construct($directory)
        {
            if ( ! is_dir($directory) OR ! is_writable($directory))
            {
                throw new Kohana_Exception('Directory :dir must be writable',
                    array(':dir' => Kohana::debug_path($directory)));
            }

            // Determine the directory path
            $this->_directory = realpath($directory).DIRECTORY_SEPARATOR;
        }
        
        /**
         * Write an array of exceptions to a log file with
         * an attachment file (filename in log entry).
         */
        public function write(array $messages)
        {
            // Abort if no messages
            if (empty($messages)) return;
            
            // Set the monthly directory name
            $directory = $this->_directory.date('Y/m/d').DIRECTORY_SEPARATOR;

            if ( ! is_dir($directory))
            {
                // Create the monthly directory
                mkdir($directory, 0777, TRUE);
            }
                        
            foreach ($messages as $message)
            {
                if (is_object($message['body']) && $message['body'] instanceof Exception)
                {
                    // Make a filename
                    $filename = $directory
                              . $message['time']
                              . '.htm';
                    
                    // Get the trace
                    ob_start();
                    Kohana::exception_handler($message['body']);
                    $trace = ob_get_clean();
                    
                    // Write the trace
                    file_put_contents($filename, $trace);
                }
            }
        }
    }
    
/* End of file exception.php */
/* Location: ./classes/log/file/exception.php */ 