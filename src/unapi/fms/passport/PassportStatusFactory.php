<?php
namespace unapi\fms\passport;

use unapi\common\interfaces\FactoryInterface;
use unapi\common\interfaces\StatusInterface;
use unapi\fms\passport\statuses;
use unapi\common\exceptions\StatusNotRecognizedException;

class PassportStatusFactory implements FactoryInterface
{
    protected $mapper = [
        'Среди недействительных не значится' => statuses\PassportCorrectStatus::class,
    ];

    /**
     * @param string $html
     * @return StatusInterface
     * @throws StatusNotRecognizedException
     */
    public function factory($html)
    {
        foreach ($this->mapper as $text => $class) {
            if (mb_strpos($html, $text))
                return new $class;
        }

        throw new StatusNotRecognizedException('Unknown status');
    }
}