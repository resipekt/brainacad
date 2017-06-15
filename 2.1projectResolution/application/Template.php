<?php

namespace application;

/**
 * Class Template
 * @package application
 */
class Template
{
    /**
     * @param string $template
     * @param array $variables
     * @throws \Exception
     */
    public function render($template, $variables = [])
    {
        if (file_exists($template)) {
            extract($variables);
            require_once($template);
        }

        throw new \Exception("Template '{$template}' is not exists");
    }
}