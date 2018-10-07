<?php

namespace Video;

use PHPUnit\Framework\TestCase;

/**
 * @author jcmoro <jcmorodiaz@gmail.com>
 */
class VideoTest extends TestCase
{
    /**
     * @test
     */
    public function shouldCreateVideoWithTrueAutoplay()
    {
        $video = new Video(true);
        static::assertTrue($video->autoplay());
        static::assertArrayHasKey('autoplay', $video->toArray());
    }

    /**
     * @test
     */
    public function shouldCreateVideoWithFalseAutoplay()
    {
        $video = new Video();
        static::assertFalse($video->autoplay());
        static::assertArrayHasKey('autoplay', $video->toArray());
    }

    /**
     * @test
     * @dataProvider invalidBooleanData
     * @expectedException \InvalidArgumentException
     *
     * @param mixed $data
     */
    public function invalidCreateVideoDataThrowsException($data)
    {
        $video = new Video();
        $video->changeAutoplay($data);
    }

    /**
     * @test
     */
    public function shouldCreateVideoWithFalsePlayInSitu()
    {
        $video = new Video();
        static::assertFalse($video->playInSitu());
        static::assertArrayHasKey('playInSitu', $video->toArray());
    }

    /**
     * @test
     */
    public function shouldCreateVideoWithTruePlayInSitu()
    {
        $video = new Video(\Video::DEFAULT_AUTOPLAY, true);
        static::assertTrue($video->playInSitu());
        static::assertArrayHasKey('playInSitu', $video->toArray());
    }

    /**
     * @test
     * @dataProvider invalidBooleanData
     * @expectedException \InvalidArgumentException
     *
     * @param mixed $playInSitu
     */
    public function invalidCreateVideoPlayInSituThrowsException($playInSitu)
    {
        new Video(\Video::DEFAULT_AUTOPLAY, $playInSitu);
    }

    /**
     * @return \Traversable
     */
    public function invalidBooleanData()
    {
        yield ['true'];
        yield ['false'];
        yield [0];
        yield [126];
        yield [0.0];
        yield [126.1231];
        yield [[]];
        yield [null];
        yield [\stdClass::class];
    }
}
