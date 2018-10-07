<?php

namespace Video;

use Assert\Assertion;

/**
 * @author jcmoro <jcmorodiaz@gmail.com>
 */
class Video
{
    /** @var bool */
    private $autoplay;

    /** @var bool */
    private $playInSitu;

    const DEFAULT_AUTOPLAY = false;
    const DEFAULT_PLAY_IN_SITU = false;

    /**
     * Video constructor.
     *
     * @param bool $autoplay
     * @param bool $playInSitu
     */
    public function __construct($autoplay = self::DEFAULT_AUTOPLAY, $playInSitu = self::DEFAULT_PLAY_IN_SITU)
    {
        $this->setPlayInSitu($playInSitu);
    }

    /**
     * @param bool $autoplay
     */
    private function setAutoplay($autoplay)
    {
        Assertion::boolean($autoplay);

        $this->autoplay = $autoplay;
    }

    /**
     * @return bool
     */
    public function autoplay()
    {
        return $this->autoplay;
    }

    /**
     * @param bool $playInSitu
     */
    private function setPlayInSitu($playInSitu)
    {
        Assertion::boolean($playInSitu);

        $this->playInSitu = $playInSitu;
    }

    /**
     * @return bool
     */
    public function playInSitu()
    {
        return $this->playInSitu;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'autoplay' => $this->autoplay(),
            'playInSitu' => $this->playInSitu(),
        ];
    }
}
