<?php
namespace unapi\fms\passport\statuses;

use unapi\common\interfaces\StatusInterface;

class PassportUnknownStatus implements StatusInterface
{
    /**
     * @return string
     */
    public function getCode()
    {
        return 0;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return 'Unknown';
    }
}