<?php

namespace application;

/**
 * Class CV
 * @package application
 */
class CV
{
    const MODE_ITEM = 'item';
    const MODE_LIST = 'list';

    /**
     * @var array
     */
    private $data = [];

    /**
     * CV constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function parse()
    {
        $result = [];
        foreach ($this->data as $data) {
            $result[$data['destination']] = Console::setHeader($data['title']) . $this->parseItems($data['data']);
        }

        return $result;
    }

    /**
     * @param array $content
     * @return string
     */
    private function parseItems(array $content)
    {
        $data = '';
        foreach ($content as $line) {
            $label = isset($line['label']) ? Console::setWeight($line['label']) : '';

            switch ($line['type']) {
                case self::MODE_ITEM:
                    $data .= $label . implode(', ', $line['data']) . PHP_EOL;
                    break;
                case self::MODE_LIST:
                    foreach ($line['data'] as $key => $value) {
                        $list = is_array($value) ? implode(', ', $value) : $value;
                        $data .= Console::setWeight($key) . $list . PHP_EOL;
                    }
                    $data .= PHP_EOL;
                    break;
                default:
                    $data .= $label . $line['data'] . PHP_EOL;
            }

        }

        return trim($data) . PHP_EOL . PHP_EOL;
    }
}