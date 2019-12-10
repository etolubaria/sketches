<?php

namespace app\forms;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface FormInterface
{
    /**
     * Checks that form data is valid
     *
     * @return bool
     */
    public function validate(): bool;
}
