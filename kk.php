<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 02.05.2019
 * Time: 22:07
 */


$data = array(
    'name' => $_REQUEST['title'],
    'description' => $_REQUEST['description_idi_'.$cid],
    'sku' => $_REQUEST['external_id'],
    'regular_price' => floatval(ereg_replace("[^-0-9\.]","",$_REQUEST['bas_reg_price'] )),
    'sale_price' =>  floatval(ereg_replace("[^-0-9\.]","",$_REQUEST['bas_price'])),
    'type' =>$_REQUEST['bas_product_type'],
    'status' => $_REQUEST['publish_select'],
    'external_url' => $_REQUEST['external_url'], // affiliate url
    'categories' => $cats,
    'images' => $main_images,

    'attributes' => $attributes,
    'variations' => [
        [
            'regular_price' => '29.98',
            'sku'  => '24523523',
            'attributes' => [
                [
                    'slug'=>'color',
                    'name'=>'Color',
                    'option'=>'Black'
                ],
                [
                    'slug'=>'size',
                    'name'=>'Size',
                    'option'=>'S'
                ]
            ]
        ],
        [
            'regular_price' => '31',
            'sku'  => '3245345',
            'attributes' => [
                [
                    'slug'=>'color',
                    'name'=>'Color',
                    'option'=>'Black'
                ],
                [
                    'slug'=>'size',
                    'name'=>'Size',
                    'option'=>'M'
                ]
            ]
        ],
        [
            'regular_price' => '69.98',
            'sku'  => '245233223',
            'attributes' => [
                [
                    'slug'=>'color',
                    'name'=>'Color',
                    'option'=>'Green'
                ]
            ]
        ]
    ]

);

