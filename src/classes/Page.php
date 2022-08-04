<?php

class Page
{
    private const titles = array
    (
        'main' => 'Hlavní stránka',
        'o-nas' => 'O nás',
        'videa' => 'Naše videa',
        'historie' => 'Historie webu'
    );

    public const web_name = "Tvůrčí skupina T&F";

    public function __construct(array $environment)
    {
        $this->type = isset($environment['page']) ? $environment['page'] : 'main';
    }

    public function get_title() : ?string
    {
        $title = self::web_name;
        if ($this->type != 'main')
        {
            $title = self::titles[$this->type]." | $title";
        }
        return $title;
    }

    public function print_nav_links() : void
    {
        foreach (self::titles as $type => $title)
        {
            echo '<div class="navigation';
            if ($type == $this->type)
            {
                echo ' navigation-item-active"><a href="'.self::page_link($type).'"><img src="img/icons/active/';
            }
            else
            {
                echo '"><a href="'.self::page_link($type).'"><img src="img/icons/';
            }
            echo "$type.png\">$title</a></div>";   
        }
    }

    private static function page_link(string $page_type) : string
    {
        $base = $_SERVER['LINK_BASE'];
        if ($page_type == 'main')
        {
            return $base;
        }
        return "$base$page_type/";
    }
}

?>