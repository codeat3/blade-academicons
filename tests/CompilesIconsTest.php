<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeAcamedicons\BladeAcamediconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('acamedicon-zotero')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="0 0 320 512" version="1.1" inkscape:version="1.0 (1.0+r73+1)" sodipodi:docname="zotero.svg" fill="currentColor"><title id="title833">Zotero</title><defs id="defs2"/><g inkscape:groupmode="layer" id="layer6" inkscape:label="icon"><path style="stroke-width:0.0675235" d="M 31.264183,64.000002 H 308.01598 V 118.62401 L 79.071969,401.39185 H 308.01598 V 448 H 11.984022 V 394.57604 L 241.74398,110.60815 H 31.264183 Z" id="path2"/></g></svg>
            SVG;


        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('acamedicon-zotero', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="0 0 320 512" version="1.1" inkscape:version="1.0 (1.0+r73+1)" sodipodi:docname="zotero.svg" fill="currentColor"><title id="title833">Zotero</title><defs id="defs2"/><g inkscape:groupmode="layer" id="layer6" inkscape:label="icon"><path style="stroke-width:0.0675235" d="M 31.264183,64.000002 H 308.01598 V 118.62401 L 79.071969,401.39185 H 308.01598 V 448 H 11.984022 V 394.57604 L 241.74398,110.60815 H 31.264183 Z" id="path2"/></g></svg>
            SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('acamedicon-zotero', ['style' => 'color: #555'])->toHtml();


        $expected = <<<'SVG'
            <svg style="color: #555" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="0 0 320 512" version="1.1" inkscape:version="1.0 (1.0+r73+1)" sodipodi:docname="zotero.svg" fill="currentColor"><title id="title833">Zotero</title><defs id="defs2"/><g inkscape:groupmode="layer" id="layer6" inkscape:label="icon"><path style="stroke-width:0.0675235" d="M 31.264183,64.000002 H 308.01598 V 118.62401 L 79.071969,401.39185 H 308.01598 V 448 H 11.984022 V 394.57604 L 241.74398,110.60815 H 31.264183 Z" id="path2"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-acamedicons.class', 'awesome');

        $result = svg('acamedicon-zotero')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="0 0 320 512" version="1.1" inkscape:version="1.0 (1.0+r73+1)" sodipodi:docname="zotero.svg" fill="currentColor"><title id="title833">Zotero</title><defs id="defs2"/><g inkscape:groupmode="layer" id="layer6" inkscape:label="icon"><path style="stroke-width:0.0675235" d="M 31.264183,64.000002 H 308.01598 V 118.62401 L 79.071969,401.39185 H 308.01598 V 448 H 11.984022 V 394.57604 L 241.74398,110.60815 H 31.264183 Z" id="path2"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-acamedicons.class', 'awesome');

        $result = svg('acamedicon-zotero', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="0 0 320 512" version="1.1" inkscape:version="1.0 (1.0+r73+1)" sodipodi:docname="zotero.svg" fill="currentColor"><title id="title833">Zotero</title><defs id="defs2"/><g inkscape:groupmode="layer" id="layer6" inkscape:label="icon"><path style="stroke-width:0.0675235" d="M 31.264183,64.000002 H 308.01598 V 118.62401 L 79.071969,401.39185 H 308.01598 V 448 H 11.984022 V 394.57604 L 241.74398,110.60815 H 31.264183 Z" id="path2"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeAcamediconsServiceProvider::class,
        ];
    }
}
