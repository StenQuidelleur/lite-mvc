<?php

namespace App;

/**
 * Renderer class : render the view with params
 */
class Renderer
{
    /**
     * @var string
     */
    private string $viewPath;

    /**
     * @var array|null
     */
    private ?array $params;

    /**
     * @param string $viewPath
     * @param array|null $params
     */
    public function __construct(string $viewPath, ?array $params = [])
    {
        $this->viewPath = $viewPath;
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function view(): string
    {
        ob_start();
        
        extract($this->params);
        
        require BASE_VIEW_PATH . $this->viewPath . '.php';

        return ob_get_clean();
    }

    /**
     * @param string $viewPath
     * @param array|null $params
     * 
     * @return static
     */
    public static function render(string $viewPath, ?array $params = []): static
    {
        return new static($viewPath, $params);
    }

    public function __toString()
    {
        return $this->view();
    }
}