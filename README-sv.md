<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Breadcrumb 0.8.8

Brödcrumbnavigering.

<p align="center"><img src="breadcrumb-screenshot.png?raw=true" alt="Skärmdump"></p>

## Hur man lägger till en navigering 

Skapa en `[breadcrumb]` förkortning. Brödcrumbnavigeringen genereras automatiskt från adressen.

## Exempel

Innehållsfil med brödcrumb: 

    ---
    Title: Exempelsida
    ---
    [breadcrumb]
        
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

Layoutfil med brödcrumb:

    <?php $this->yellow->layout("header") ?>
    <div class="content">
    <div class="main" role="main">
    <h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
    <?php echo $this->yellow->page->getExtra("breadcrumb") ?>
    <?php echo $this->yellow->page->getContent() ?>
    </div>
    </div>
    <?php $this->yellow->layout("footer") ?>

## Inställningar

Följande inställningar kan konfigureras i filen `system/extensions/yellow-system.ini`:

`BreadcrumbSeparator` = text som visas mellan elementen  
`BreadcrumbPagesMin` = antal sidor för att visa brödcrumbnavigering  

## Installation

[Ladda ner tillägg](https://github.com/annaesvensson/yellow-breadcrumb/archive/main.zip) och kopiera zip-fil till din `system/extensions` mapp. Högerklicka om du använder Safari.

## Utvecklare

Datenstrom. [Få hjälp](https://datenstrom.se/sv/yellow/help/).
