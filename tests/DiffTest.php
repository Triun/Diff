<?php
declare(strict_types=1);

namespace Triun\Diff;

/**
 * Class DiffTest
 */
final class DiffTest extends TestCase
{
    /**
     * Test compare()
     *
     * @see \Triun\Diff\Diff::compare()
     *
     * @test
     */
    public function testCanCompareAnEmptyString()
    {
        $this->assertEquals([
            [
                '',
                Diff::UNMODIFIED,
            ],
        ], Diff::compare('', ''));
    }

    /**
     * Test compare()
     *
     * @see \Triun\Diff\Diff::compare()
     *
     * @test
     */
    public function testCanCompareOneLineString()
    {
        $this->assertEquals([
            [
                'Hello',
                Diff::DELETED,
            ],
            [
                'Bye',
                Diff::INSERTED,
            ],
        ], Diff::compare('Hello', 'Bye'));
    }

    /**
     * Test compare()
     *
     * @see \Triun\Diff\Diff::compare()
     *
     * @test
     */
    public function testCanCompareMultiLineString()
    {
        $this->assertEquals([
            [
                'Hello',
                Diff::DELETED,
            ],
            [
                'Bye',
                Diff::INSERTED,
            ],
            [
                'There',
                Diff::UNMODIFIED,
            ],
        ], Diff::compare('Hello' . PHP_EOL . 'There', 'Bye' . PHP_EOL . 'There'));
    }

    /**
     * Test compare()
     *
     * @see \Triun\Diff\Diff::compare()
     *
     * @test
     */
    public function testCanCompareOneLineStringWithoutCharactersComparison()
    {
        $this->assertEquals([
            [
                'Hello There',
                Diff::DELETED,
            ],
            [
                'Bye There',
                Diff::INSERTED,
            ],
        ], Diff::compare('Hello There', 'Bye There'));
    }

    /**
     * Test compare()
     *
     * @see \Triun\Diff\Diff::compare()
     *
     * @test
     */
    public function testCanCompareOneLineStringWithCharactersComparison()
    {
        $this->assertEquals([
            [
                'H',
                Diff::DELETED,
            ],
            [
                'B',
                Diff::INSERTED,
            ],
            [
                'y',
                Diff::INSERTED,
            ],
            [
                'e',
                Diff::UNMODIFIED,
            ],
            [
                'l',
                Diff::DELETED,
            ],
            [
                'l',
                Diff::DELETED,
            ],
            [
                'o',
                Diff::DELETED,
            ],
            [
                ' ',
                Diff::UNMODIFIED,
            ],
            [
                'T',
                Diff::UNMODIFIED,
            ],
            [
                'h',
                Diff::UNMODIFIED,
            ],
            [
                'e',
                Diff::UNMODIFIED,
            ],
            [
                'r',
                Diff::UNMODIFIED,
            ],
            [
                'e',
                Diff::UNMODIFIED,
            ],
        ], Diff::compare('Hello There', 'Bye There', true));
    }

    /**
     * Test compare()
     *
     * @see \Triun\Diff\Diff::compare()
     *
     * @test
     */
    public function testCanCompareMultiLineStringWithCharactersComparison()
    {
        $this->assertEquals([
            [
                'H',
                Diff::DELETED,
            ],
            [
                'B',
                Diff::INSERTED,
            ],
            [
                'y',
                Diff::INSERTED,
            ],
            [
                'e',
                Diff::UNMODIFIED,
            ],
            [
                'l',
                Diff::DELETED,
            ],
            [
                'l',
                Diff::DELETED,
            ],
            [
                'o',
                Diff::DELETED,
            ],
            [
                ' ',
                Diff::UNMODIFIED,
            ],
            [
                'T',
                Diff::UNMODIFIED,
            ],
            [
                'h',
                Diff::UNMODIFIED,
            ],
            [
                'e',
                Diff::UNMODIFIED,
            ],
            [
                'r',
                Diff::UNMODIFIED,
            ],
            [
                'e',
                Diff::UNMODIFIED,
            ],
            [
                PHP_EOL,
                Diff::UNMODIFIED,
            ],
            [
                'H',
                Diff::UNMODIFIED,
            ],
            [
                'o',
                Diff::UNMODIFIED,
            ],
            [
                'w',
                Diff::UNMODIFIED,
            ],
            [
                ' ',
                Diff::UNMODIFIED,
            ],
            [
                'a',
                Diff::UNMODIFIED,
            ],
            [
                'r',
                Diff::UNMODIFIED,
            ],
            [
                'e',
                Diff::UNMODIFIED,
            ],
            [
                PHP_EOL,
                Diff::UNMODIFIED,
            ],
            [
                'Y',
                Diff::DELETED,
            ],
            [
                'o',
                Diff::DELETED,
            ],
            [
                'u',
                Diff::DELETED,
            ],
            [
                'T',
                Diff::INSERTED,
            ],
            [
                'h',
                Diff::INSERTED,
            ],
            [
                'e',
                Diff::INSERTED,
            ],
            [
                'y',
                Diff::INSERTED,
            ],
        ], Diff::compare(
            'Hello There' . PHP_EOL . 'How are' . PHP_EOL . 'You',
            'Bye There' . PHP_EOL . 'How are' . PHP_EOL . 'They',
            true
        ));
    }
}
