<?php
namespace Finanzas\V1\Rest\Delete;

class DeleteResourceFactory
{
    public function __invoke($services)
    {
        return new DeleteResource();
    }
}
