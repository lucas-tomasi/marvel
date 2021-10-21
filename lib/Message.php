<?php
namespace Base;

class Message
{
    /**
     * Show success message
     * 
     * @param string $message message
     */
    public static function showSuccess($message) 
    {
        echo "<script>showSuccess('{$message}')</script>";
    }

    /**
     * Show error message
     * 
     * @param string $message message
     */
    public static function showError($message)
    {
        echo "<script>showError('{$message}')</script>";
    }
}
?>