<?php
/**
 * This file is part of the ImboClient package
 *
 * (c) Christer Edvartsen <cogo@starzinger.net>
 *
 * For the full copyright and license information, please view the LICENSE file that was
 * distributed with this source code.
 */

return array(
    'name' => 'Imbo',
    'apiVersion' => '',
    'description' => 'Imbo has an API that allows you to add/remove images and metadata. The API also supports dynamically transforming images without storing all variants',

    // API operations
    'operations' => array(
        // Stats
        'GetServerStats' => array(
            'httpMethod' => 'GET',
            'uri' => '/stats.json',
            'summary' => 'Get statistics',
            'responseClass' => 'ImboClient\Model\Stats',
        ),

        // Status
        'GetServerStatus' => array(
            'httpMethod' => 'GET',
            'uri' => '/status.json',
            'summary' => 'Get status about the Imbo host',
            'responseClass' => 'ImboClient\Model\Status',
        ),

        // User
        'GetUserInfo' => array(
            'httpMethod' => 'GET',
            'uri' => '/users/{publicKey}.json',
            'summary' => 'Get information about a specific user',
            'parameters' => array(
                'publicKey' => array(
                    'type' => 'string',
                    'required' => true,
                    'location' => 'uri',
                    'description' => 'The public key of the user we want information about',
                ),
            ),
            'responseClass' => 'ImboClient\Model\User',
        ),

        // Image
        'AddImage' => array(
            'httpMethod' => 'PUT',
            'uri' => '/users/{publicKey}/images/{imageIdentifier}',
            'summary' => 'Add an image',
            'parameters' => array(
                'image' => array(
                    'type' => 'string',
                    'required' => true,
                    'location' => 'body',
                    'description' => 'The binary data of the image to add',
                ),
            ),
            'responseClass' => 'ImboClient\Model\AddImage',
        ),

        'DeleteImage' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/users/{publicKey}/images/{imageIdentifier}',
            'summary' => 'Delete an image',
            'responseClass' => 'ImboClient\Model\DeleteImage',
        ),

        'GetShortUrl' => array(
            'httpMethod' => 'HEAD',
            'uri' => '/users/{publicKey}/images/{imageIdentifier}',
            'summary' => 'Get the short URL of an image',
            'responseClass' => 'ImboClient\Model\ShortUrl',
        ),

        'GetImageProperties' => array(
            'httpMethod' => 'HEAD',
            'uri' => '/users/{publicKey}/images/{imageIdentifier}',
            'summary' => 'Get properties of an image',
            'responseClass' => 'ImboClient\Model\ImageProperties',
        ),

        // Images
        'GetImages' => array(
            'httpMethod' => 'GET',
            'uri' => '/users/{publicKey}/images',
            'summary' => 'Query images',
            'responseClass' => 'ImboClient\Model\ImageCollection',
        ),

        // Metadata
        'GetMetadata' => array(
            'httpMethod' => 'GET',
            'uri' => '/users/{publicKey}/images/{imageIdentifier}/metadata',
            'summary' => 'Get metadata attached to an image',
            'responseClass' => 'ImboClient\Model\ImageMetadata',
        ),

        'ReplaceMetadata' => array(
            'httpMethod' => 'PUT',
            'uri' => '/users/{publicKey}/images/{imageIdentifier}/metadata',
            'summary' => 'Completely replace the metadata attached to an image with new metadata',
            'responseClass' => 'ImboClient\Model\ReplaceMetadata',
        ),

        'EditMetadata' => array(
            'httpMethod' => 'POST',
            'uri' => '/users/{publicKey}/images/{imageIdentifier}/metadata',
            'summary' => 'Update metadata attached to an image. Supports partial updates',
            'responseClass' => 'ImboClient\Model\EditMetadata',
        ),

        'DeleteMetadata' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/users/{publicKey}/images/{imageIdentifier}/metadata',
            'summary' => 'Delete metadata attached to an image',
            'responseClass' => 'ImboClient\Model\DeleteMetadata',
        ),
    ),
);
