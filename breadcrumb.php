<?php
// Breadcrumb extension, https://github.com/datenstrom/yellow-extensions/tree/master/source/breadcrumb

class YellowBreadcrumb {
    const VERSION = "0.8.8";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("breadcrumbSeparator", ">");
        $this->yellow->system->setDefault("breadcrumbPagesMin", "2");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="breadcrumb" && ($type=="block" || $type=="inline")) {
            $separator = $this->yellow->system->get("breadcrumbSeparator");
            $pages = $this->yellow->content->path($page->getLocation(true), true);
            if (count($pages)>=$this->yellow->system->get("breadcrumbPagesMin")) {
                $page->setLastModified($pages->getModified());
                $output = "<div class=\"breadcrumb\">";
                foreach ($pages as $pageBreadcrumb) {
                    if ($pageBreadcrumb->getLocation()!=$page->getLocation()) {
                        $output .= "<a href=\"".$pageBreadcrumb->getLocation(true)."\">".$pageBreadcrumb->getHtml("titleNavigation")."</a>";
                        $output .= " ".htmlspecialchars($separator)." ";
                    } else {
                        $output .= "<span class=\"active\">".$pageBreadcrumb->getHtml("titleContent")."</span>";
                    }
                }
                $output .= "</div>\n";
            }
        }
        return $output;
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        return $this->onParseContentShortcut($page, $name, "", "block");
    }
}