<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace GravityMedia\GhostscriptTest;

use GravityMedia\Ghostscript\Ghostscript;

/**
 * The Ghostscript test object
 *
 * @package GravityMedia\GhostscriptTest
 */
class GhostscriptTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \GravityMedia\Ghostscript\Ghostscript::__construct
     */
    public function testShouldBeConstructable()
    {
        new Ghostscript();
    }

    /**
     * @covers       \GravityMedia\Ghostscript\Ghostscript::__construct
     * @dataProvider \GravityMedia\GhostscriptTest\GhostscriptTest::getInvalidConstructorArguments
     *
     * @expectedException \RuntimeException
     * @param array $options
     */
    public function testShouldThrowExceptionOnInvalidConstructorArguments(array $options)
    {
        new Ghostscript($options);
    }

    /**
     * Data provider for \GravityMedia\GhostscriptTest\GhostscriptTest::testShouldThrowExceptionOnInvalidConstructorArguments
     *
     * @return array
     */
    public function getInvalidConstructorArguments()
    {
        return array(
            array(array(
                'command' => 'wrong-gs-command'
            ))
        );
    }

    /**
     * @covers       \GravityMedia\Ghostscript\Ghostscript::getOption
     * @dataProvider \GravityMedia\GhostscriptTest\GhostscriptTest::getValidConstructorArguments
     *
     * @param array $options
     */
    public function testShouldReturnAnOptionFromValidConstructorArguments(array $options)
    {
        $key = 'command';
        $expected = $options[$key];
        $ghostscript = new Ghostscript($options);
        $actual = $ghostscript->getOption('command');

        $this->assertEquals($expected, $actual);
    }

    /**
     * Data provider for \GravityMedia\GhostscriptTest\GhostscriptTest::testShouldThrowExceptionOnInvalidConstructorArguments
     *
     * @return array
     */
    public function getValidConstructorArguments()
    {
        return array(
            array(array(
                'command' => 'gs'
            ))
        );
    }
}