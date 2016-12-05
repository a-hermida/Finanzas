<?php
return [
    'service_manager' => [
        'factories' => [
            \Finanzas\V1\Rest\Add\AddResource::class => \Finanzas\V1\Rest\Add\AddResourceFactory::class,
            \Finanzas\V1\Rest\Delete\DeleteResource::class => \Finanzas\V1\Rest\Delete\DeleteResourceFactory::class,
            \Finanzas\V1\Rest\Getlist\GetlistResource::class => \Finanzas\V1\Rest\Getlist\GetlistResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'finanzas.rest.add' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/add[/:add_id]',
                    'defaults' => [
                        'controller' => 'Finanzas\\V1\\Rest\\Add\\Controller',
                    ],
                ],
            ],
            'finanzas.rest.delete' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/delete[/:delete_id]',
                    'defaults' => [
                        'controller' => 'Finanzas\\V1\\Rest\\Delete\\Controller',
                    ],
                ],
            ],
            'finanzas.rest.getlist' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/getlist[/:getlist_id]',
                    'defaults' => [
                        'controller' => 'Finanzas\\V1\\Rest\\Getlist\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'finanzas.rest.add',
            2 => 'finanzas.rest.delete',
            3 => 'finanzas.rest.getlist',
        ],
    ],
    'zf-rest' => [
        'Finanzas\\V1\\Rest\\Add\\Controller' => [
            'listener' => \Finanzas\V1\Rest\Add\AddResource::class,
            'route_name' => 'finanzas.rest.add',
            'route_identifier_name' => 'add_id',
            'collection_name' => 'add',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Finanzas\V1\Rest\Add\AddEntity::class,
            'collection_class' => \Finanzas\V1\Rest\Add\AddCollection::class,
            'service_name' => 'add',
        ],
        'Finanzas\\V1\\Rest\\Delete\\Controller' => [
            'listener' => \Finanzas\V1\Rest\Delete\DeleteResource::class,
            'route_name' => 'finanzas.rest.delete',
            'route_identifier_name' => 'delete_id',
            'collection_name' => 'delete',
            'entity_http_methods' => [
                0 => 'DELETE',
            ],
            'collection_http_methods' => [],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Finanzas\V1\Rest\Delete\DeleteEntity::class,
            'collection_class' => \Finanzas\V1\Rest\Delete\DeleteCollection::class,
            'service_name' => 'delete',
        ],
        'Finanzas\\V1\\Rest\\Getlist\\Controller' => [
            'listener' => \Finanzas\V1\Rest\Getlist\GetlistResource::class,
            'route_name' => 'finanzas.rest.getlist',
            'route_identifier_name' => 'getlist_id',
            'collection_name' => 'getlist',
            'entity_http_methods' => [
                0 => 'GET',
            ],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Finanzas\V1\Rest\Getlist\GetlistEntity::class,
            'collection_class' => \Finanzas\V1\Rest\Getlist\GetlistCollection::class,
            'service_name' => 'getlist',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Finanzas\\V1\\Rest\\Add\\Controller' => 'HalJson',
            'Finanzas\\V1\\Rest\\Delete\\Controller' => 'HalJson',
            'Finanzas\\V1\\Rest\\Getlist\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Finanzas\\V1\\Rest\\Add\\Controller' => [
                0 => 'application/vnd.finanzas.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Finanzas\\V1\\Rest\\Delete\\Controller' => [
                0 => 'application/vnd.finanzas.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Finanzas\\V1\\Rest\\Getlist\\Controller' => [
                0 => 'application/vnd.finanzas.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Finanzas\\V1\\Rest\\Add\\Controller' => [
                0 => 'application/vnd.finanzas.v1+json',
                1 => 'application/json',
            ],
            'Finanzas\\V1\\Rest\\Delete\\Controller' => [
                0 => 'application/vnd.finanzas.v1+json',
                1 => 'application/json',
            ],
            'Finanzas\\V1\\Rest\\Getlist\\Controller' => [
                0 => 'application/vnd.finanzas.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Finanzas\V1\Rest\Add\AddEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'finanzas.rest.add',
                'route_identifier_name' => 'add_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Finanzas\V1\Rest\Add\AddCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'finanzas.rest.add',
                'route_identifier_name' => 'add_id',
                'is_collection' => true,
            ],
            \Finanzas\V1\Rest\Delete\DeleteEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'finanzas.rest.delete',
                'route_identifier_name' => 'delete_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Finanzas\V1\Rest\Delete\DeleteCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'finanzas.rest.delete',
                'route_identifier_name' => 'delete_id',
                'is_collection' => true,
            ],
            \Finanzas\V1\Rest\Getlist\GetlistEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'finanzas.rest.getlist',
                'route_identifier_name' => 'getlist_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Finanzas\V1\Rest\Getlist\GetlistCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'finanzas.rest.getlist',
                'route_identifier_name' => 'getlist_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'Finanzas\\V1\\Rest\\Add\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
    'zf-content-validation' => [
        'Finanzas\\V1\\Rest\\Add\\Controller' => [
            'input_filter' => 'Finanzas\\V1\\Rest\\Add\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Finanzas\\V1\\Rest\\Add\\Validator' => [],
    ],
];
