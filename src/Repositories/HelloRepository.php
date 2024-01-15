<?php
namespace marketplace\src\Repositories;

use marketplace\src\Eloquent\Repository;
use marketplace\src\Repositories\Interfaces\HelloRepositoryInterface;

class HelloRepository extends Repository implements HelloRepositoryInterface
{

    /**
     * @return string
     */
    public function model(): string
    {
       return 'Savvy\Hello\Contracts\Hello';
    }

    /**
     * @return array
     */
    public function showHello(): array
    {
        return [
            'text' => __('helloworld::app.hello-world.name')
        ];
    }
}