<?php

return [
    'alipay' => [
        'app_id'         => '2016092300576433',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAxr6qxBr9wDdKJuvbubLor2ePObs0JIl3Gi6gVXSkp4ypJP4uMKRHCHDsf5gwdYEIrsk/+N7T3V/qFinQ/khWY9/aPV0VG9UhBPO/kJdplAwTwoQiU+Qs0FuuqGL7mff4aggtGcTbwoS2Hhk+iG0MW1C9mOiAeEDQd4YQiZcwY/blRvx5Kz/u1r74Ayyc/tSnUkmQFHVFtvxTWT0XU6hutJAuraypxsuWicVfNq57T+dge2yULtSvsOlotKb2XdfrJb5Lewr5A75z+13Nhsv7DKJKOANSMiCkyIgBf4pdurCxc3+RuzfL17BzKzwKT6pZFEwGReNc+t55LCfW/ZeOUwIDAQAB',
        'private_key'    => 'MIIEpQIBAAKCAQEAsjgiAMXEg3n1BMrPEFrv+L705RV3oJYawyb17cetqBNaBoglx2MPcxqdWEtbocUEoFlfqqQ9WjnoI5Ofxad0rtiOs65qS2TTq5D4bA0hb7c7OOZ6GkLREXXVhGEV/WkRfi+EFnkoJbENwDPfx5filcdfL/fy4eAE01Dci05hHtInHdOWRf+UtAWXLrbJ05LnFjHeYFaSGVvwOVEx8iLm0hIpYdtN0kmOS71tvl4yzPfrdHmvc1yH7nTIS5Q0Vzj4EWRupVqL+57uvNhWhHh5/NZlHcKcz1YCIJ8XXBEn3z8wNspArDlfCe/s+NvdNubkq4l9BwRzouZ3Nxf3PcwMawIDAQABAoIBAQCT3OqpRWxDwR2+eh3N7gUHljdNEcCM5b0SiPKl83Nq7ZNVtAPUJ6Yb08sUBIHj97hc6Ynr5BRbFYw6aDK5JLQ0lMvg3CaoouDTiZXy3/oL3DQwg1hvDVy0ZdVe3cYG1/OBhB7NHnxmuT01aFSUHroJlr6s58UGDn0ybfZtRfxiOotbyG20QiQfBGmAhC4rGmk1sH4GvoKdlcquX43sdkmYULyU8jvNMXfoyiunHgn+VF/03yqbCg0gIPOOpaqtJDbu8OoXQyne6iHO96QuPZw6VvAAm/jP4PKH9YajF3VtIGNIBvFzrmyPgm0y0LNn7utK5u9HW356eWoRFqRgBvTRAoGBANrKOqFQn3gLhcsw+TIPl4lSJcXYZ0PqIDs84C195IYQ/IVmlxP4t4yMnPA6MgnV13oEbJRoAQ+cixBSK5cHS9nvarRnsKrtNwaa9iXUAuUTzlwkb8WOLD5JfMgjuF+okqmrO4kY+i6ujOtN05Nbx5CM9j4P6wjCsTPpF2kgdLqlAoGBANCHhRAOJn313sHm6Fu4rf3JDHbitH6TAY0Fzz6b3ca18Ys1dIckK1+umdq9nPiXnaZcVAgKl2wueqySsx6CTI+El78UevisAYLKEe9GahA51hbuU1VNJrPpxyg+R1JnZ2rs35/ElrFvefXE/lWfkB7JW152FVm1yc1MNbGSt83PAoGAW+Swd2yrbfo4+bzaDYKq/Qw5vT1FMis12muZJMJJp12fElCih8rhHPE6QVPQDH16gU82Y6bDO1Fevz4j/M0duK1sPdWHSGNVxzpyxDSl+p01AVJ0d59dSdQHyu/l0pe08fpviQeqnMzHd1U61huoWDg8fJim+Qj88HaoVIlDPdkCgYEAg51FasDDorTQh+nJtjp19rwyVcb4zPrT+8Iy7/1ImOa1MXvntHQrvBRjnyAWNwDay+lyUDD/KZSccNeWnib3U44IiN3QT6uguH/5meADiYI3kfmSN0CesOdYgBnuwh/psh8XdauKwSru+yP+suQm/odwV8qH5ztJx33WVeGYiRkCgYEAuZG1nIE15umY7m2tqIQAApj0/XSQYGUZHrek8nRFkPdgPZS2SYMMYLalSJRQvchBpMxAnUyPNYfEP4wzxrYoWAfzAJ46q1oGQKxiujqIhiqLeB/IA8PR0CUsJDk0FrulTIBQIeP6Jn/6BeZ+wCZnb+/9s+nPnF6urXTW2JP9IjU=',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
