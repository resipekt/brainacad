<?php

namespace application;

/**
 * Class Console
 * @package application
 */
class Console
{
    const SUCCESS = 'SUCCESS';
    const FAILURE = 'FAILURE';
    const WARNING = 'WARNING';
    const NOTE = 'NOTE';

    /**
     * @param string $message
     * @param string $status
     * @return string
     */
    public static function setColor($message, $status = '')
    {
        switch ($status) {
            case self::SUCCESS:
                $color = "<span style=color:green></span>";
                break;
            case self::FAILURE:
                $color = "<span style=color:red></span>";
                break;
            case self::WARNING:
                $color = "<span style=color:yellow></span>";
                break;
            case self::NOTE:
                $color = "<span style=color:grey></span>";
                break;
            default:
                $color = "<span style=color:white></span>";
        }

        return chr(27) . "{$color}{$message}" . chr(27) . "<span style=color:purple></span>" . PHP_EOL;
    }

    /**
     * @param $message
     * @return string
     */
    public static function setWeight($message)
    {
        return chr(27) . "<span style=color:orange>{$message}</span>: " . chr(27) . "<span style=color:white></span>";
    }

    /**
     * @param string $message
     * @return string
     */
    public static function setHeader($message)
    {
        return self::setColor(strtoupper($message), self::SUCCESS);
    }
}
