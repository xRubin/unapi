<?php
namespace unapi\fms\passport\statuses;

use unapi\common\interfaces\StatusInterface;

class PassportCorrectStatus implements StatusInterface
{
    /**
     * @return string
     */
    public function getCode()
    {
        return 2;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return 'Среди недействительных не значится';
    }
}