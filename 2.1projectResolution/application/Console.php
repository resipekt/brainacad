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
                $color = "[0;32m";
                break;
            case self::FAILURE:
                $color = "[0;31m";
                break;
            case self::WARNING:
                $color = "[1;33m";
                break;
            case self::NOTE:
                $color = "[0;34m";
                break;
            default:
                $color = '[1;37m';
        }

        return chr(27) . "{$color}{$message}" . chr(27) . "[0m" . PHP_EOL;
    }

    /**
     * @param $message
     * @return string
     */
    public static function setWeight($message)
    {
        return chr(27) . "[1m{$message}: " . chr(27) . "[0m";
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