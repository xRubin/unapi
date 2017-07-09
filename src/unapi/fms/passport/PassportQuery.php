<?php
namespace unapi\fms\passport;

use unapi\common\interfaces\QueryInterface;

/**
 * Class PassportQuery
 */
class PassportQuery implements QueryInterface
{
    /** @var string */
    private $series;

    /** @var string */
    private $number;

    /**
     * PassportQuery constructor.
     * @param $series
     * @param $number
     */
    public function __construct($series, $number)
    {
        $this->series = sprintf('%04s', $series);
        $this->number = sprintf('%06s', $number);
    }

    /**
     * @return string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

}
