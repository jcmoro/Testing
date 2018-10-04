use Assert\Assertion;

class Video
{
    /** @var bool */
    private $autoplay = false;

    /** @var bool */
    private $playInSitu;

    const DEFAULT_PLAY_IN_SITU = false;

    /**
     * Video constructor.
     *
     * @param bool $playInSitu
     */
    public function __construct($playInSitu = self::DEFAULT_PLAY_IN_SITU)
    {
        $this->setPlayInSitu($playInSitu);
    }

    /**
     * @param bool $autoplay
     */
    public function changeAutoplay($autoplay)
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
