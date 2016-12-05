<?php
namespace Finanzas\V1\Rest\Getlist;

class GetlistResourceFactory
{
    public function __invoke($services)
    {
        return new GetlistResource();
    }
}
