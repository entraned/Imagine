<?php

/*
 * This file is part of the Imagine package.
 *
 * (c) Bulat Shakirzyanov <mallluhuct@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Imagine\Test\Gd;

use Imagine\Gd\Imagine;
use Imagine\Image\ImageInterface;
use Imagine\Test\Image\AbstractImageTest;

/**
 * @group ext-gd
 */
class ImageTest extends AbstractImageTest
{
    protected function setUp()
    {
        parent::setUp();

        if (!function_exists('gd_info')) {
            $this->markTestSkipped('Gd not installed');
        }
    }

    public function testImageResolutionChange()
    {
        $this->markTestSkipped('GD driver does not support resolution options');
    }

    public function provideFilters()
    {
        return array(
            array(ImageInterface::FILTER_UNDEFINED),
        );
    }

    public function providePalettes()
    {
        return array(
            array('Imagine\Image\Palette\RGB', array(255, 0, 0)),
        );
    }

    public function provideFromAndToPalettes()
    {
        return array(
            array(
                'Imagine\Image\Palette\RGB',
                'Imagine\Image\Palette\RGB',
                array(10, 10, 10),
            ),
        );
    }

    /**
     * @expectedException \Imagine\Exception\RuntimeException
     */
    public function testProfile()
    {
        parent::testProfile();
    }

    public function testPaletteIsGrayIfGrayImage()
    {
        $this->markTestSkipped('GD driver does not support Gray colorspace');
    }

    public function testPaletteIsCMYKIfCMYKImage()
    {
        $this->markTestSkipped('GD driver does not recognize CMYK images properly');
    }

    public function testGetColorAtCMYK()
    {
        $this->markTestSkipped('GD driver does not recognize CMYK images properly');
    }

    public function testChangeColorSpaceAndStripImage()
    {
        $this->markTestSkipped('GD driver does not support ICC profiles');
    }

    public function testStripImageWithInvalidProfile()
    {
        $this->markTestSkipped('GD driver does not support ICC profiles');
    }

    public function testStripGBRImageHasGoodColors()
    {
        $this->markTestSkipped('GD driver does not support ICC profiles');
    }

    protected function getImagine()
    {
        return new Imagine();
    }

    protected function supportMultipleLayers()
    {
        return false;
    }

    public function testRotateWithNoBackgroundColor()
    {
        if (version_compare(PHP_VERSION, '5.5', '>=')) {
            // see https://bugs.php.net/bug.php?id=65148
            $this->markTestSkipped('Disabling test while bug #65148 is open');
        }

        parent::testRotateWithNoBackgroundColor();
    }

    /**
     * @dataProvider provideVariousSources
     *
     * @param mixed $source
     */
    public function testResolutionOnSave($source)
    {
        $this->markTestSkipped('GD driver only supports 72 dpi resolution');
    }

    public function testJpegSamplingFactors()
    {
        $this->markTestSkipped('GD driver does not support JPEG sampling factors');
    }

    protected function getImageResolution(ImageInterface $image)
    {
    }

    protected function getSamplingFactors(ImageInterface $image)
    {
    }
}
